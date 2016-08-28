<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class RestContext implements Context, SnippetAcceptingContext
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var array The query string to add (in URI Template format) */
    protected $queryString = [];

    /**
     * @var \GuzzleHttp\Message\Request
     */
    protected $lastRequest;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        require_once(__DIR__ . '/../../vendor/autoload.php');

        ini_set('memory_limit', '-1');

        $this->zf2MvcApplication = \Zend\Mvc\Application::init(require __DIR__ . '/../../config/application.config.php');

        $this->client = new \GuzzleHttp\Client(
            [
                'base_url' => 'http://localhost',
                'verify'   => false
            ]
        );
    }

    /**
     * @When /^I send ([A-Z]+) request to "([^"]*)"$/
     * @When /^I send ([A-Z]+) request to "([^"]*)" with values:$/
     */
    public function iSendRequest($method, $url, TableNode $table = null)
    {
        $values = $table ? $table->getRowsHash() : [];

        $matches = [];
        preg_match_all('({[A-Z_0-9\ \.]+})', $url, $matches);

        foreach ($matches[0] as $match) {
            $url = str_replace($match, $this->getReplacements()[$match], $url);
        }

        $headers =
            [
                'Accept'     => 'application/hal+json',
                'Connection' => 'Close'
            ];
        
        $method = strtolower($method);

        $this->lastResponse = $this->client->$method(
            $url,
            [
                'headers'     => $headers,
                //'form_params' => $values,
                'verify'      => false,
                'exceptions'  => false,
                'query'       => $this->getQueryString(),
                'config' => [
                    'curl' => [
                        CURLOPT_FRESH_CONNECT => true
                    ]
                ]
            ]
        );
    }

    /**
     * @Then /^echo last response$/
     */
    public function echoLastResponse()
    {
        $this->printDebug(
            $this->getLastResponse()->getBody()
        );
    }

    public function getLastResponseBody()
    {
        return $this->getLastResponse()->getBody(true);
    }

    /**
     * Prints beautified debug string.
     *
     * @param string $string debug string
     */
    public function printDebug($string)
    {
        echo "\n\033[36m|  " . strtr($string, array("\n" => "\n|  ")) . "\033[0m\n\n";
    }

    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * Returns the response of the last request
     *
     * @return \GuzzleHttp\Message\Response
     */
    public function getLastResponse()
    {
        if (null === $this->lastResponse) {
            throw new \LogicException('No request sent yet.');
        }

        return $this->lastResponse;
    }
}

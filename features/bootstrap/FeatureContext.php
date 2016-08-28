<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @BeforeScenario
     */
    public function purgeDatabase()
    {
    }

    /**
     * @Given an article with name :articleName and price :articlePrice
     */
    public function anArticleWithNameAndPrice($articleName, $articlePrice)
    {
    }

    /**
     * @Then response should contain the article :arg1 with price :arg2
     */
    public function responseShouldContainTheArticleWithPrice($arg1, $arg2)
    {
    }
}

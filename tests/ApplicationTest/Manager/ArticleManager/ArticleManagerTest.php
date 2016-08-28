<?php
namespace ApplicationTest\Manager\ArticleManager;

use Application\Manager\ArticleManager\ArticleManager;
use Zend\Stdlib\Hydrator\ArraySerializable;

class ArticleManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArticleManager
     */
    protected $instance;

    public function setUp()
    {
        $mapperMock = $this
            ->getMockBuilder('Application\Model\Mapper\ArticleMapper')
            ->disableOriginalConstructor()
            ->setMethods(['find', 'save'])
            ->getMock();
        $this->instance = new ArticleManager($mapperMock);
    }

    public function tearDown()
    {
        $this->instance = null;
    }

    public function testFetch()
    {
        $id = 5;
        $this->instance->getArticleMapper()
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->will($this->returnValue('result'));

        $this->assertEquals('result', $this->instance->fetch($id));
    }
}
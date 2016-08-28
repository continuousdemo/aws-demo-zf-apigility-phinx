<?php
namespace Example\V1\Rest\Article;

use Zend\Stdlib\Hydrator\ObjectProperty;

class ArticleResourceFactory
{
    public function __invoke($services)
    {
        $articleManager = $services->get('application.manager.article-manager.article-manager');
        $mapper = new ArticleResourceMapper();

        return new ArticleResource($articleManager, $mapper);
    }
}

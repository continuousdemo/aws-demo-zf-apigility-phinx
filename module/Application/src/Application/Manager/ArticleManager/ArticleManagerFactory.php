<?php
namespace Application\Manager\ArticleManager;

/**
 * Class ArticleManagerFactory
 */
class ArticleManagerFactory
{
    /**
     * @param $services
     * @return ArticleManager
     */
    function __invoke($services)
    {
        return new ArticleManager($services->get('application.model.mapper.article'));
    }

}
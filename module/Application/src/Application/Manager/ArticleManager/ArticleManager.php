<?php
namespace Application\Manager\ArticleManager;

use Application\Model\Mapper\ArticleMapper;

/**
 * Class ArticleManager
 */
class ArticleManager
{
    /**
     * @var
     */
    protected $articleMapper;

    /**
     * @param ArticleMapper $articleMapper
     */
    public function __construct(ArticleMapper $articleMapper = null)
    {
        if ($articleMapper instanceof ArticleMapper) {
            $this->articleMapper = $articleMapper;
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        if (!is_array($data)) {
            return false;
        }

        return $this->articleMapper->save($data);
    }

    /**
     * @param $id
     * @return null
     */
    public function fetch($id)
    {
        return $this->articleMapper->find($id);
    }

    /**
     * @return mixed
     */
    public function getArticleMapper()
    {
        return $this->articleMapper;
    }

    /**
     * @param mixed $articleMapper
     * @return ArticleManager
     */
    public function setArticleMapper($articleMapper)
    {
        $this->articleMapper = $articleMapper;
        return $this;
    }
}
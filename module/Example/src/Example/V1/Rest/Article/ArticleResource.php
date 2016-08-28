<?php
namespace Example\V1\Rest\Article;

use Application\Manager\ArticleManager\ArticleManager;
use PsApiBase\Resource\Mapper\ResourceMapperInterface;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ArticleResource extends AbstractResourceListener
{
    /**
     * @var ArticleManager
     */
    protected $articleManager;

    /**
     * @var ResourceMapperInterface
     */
    protected $resourceMapper;

    /**
     * @param ArticleManager $articleManager
     * @param ResourceMapperInterface $resourceMapper
     */
    public function __construct(ArticleManager $articleManager, ResourceMapperInterface $resourceMapper = null)
    {
        $this->articleManager = $articleManager;

        if ($resourceMapper instanceof ResourceMapperInterface) {
            $this->resourceMapper = $resourceMapper;
        }
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->articleManager->create($data);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        // Récupération d'un article
        $article = $this->articleManager->fetch($id);
        if (!$article) {
            return new ApiProblem(400, 'Article not found');
        }

        // Construction du tableau de données à retourner
        $data = $article->getArrayCopy();
        unset($data['dt_update']);

        // Création de l'entité
        $entityClass = $this->getEntityClass();
        $entity = new $entityClass;
        $entity = $this->resourceMapper->createEntity($data, $entity);
        if (!$entity) {
            return new ApiProblem(400, 'Entity not valid');
        }

        // On retourne l'entité de la ressource
        return $entity;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}

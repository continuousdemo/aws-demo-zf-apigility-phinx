<?php
namespace PsApiBase\Resource\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\ObjectProperty;

abstract class AbstractResourceMapper implements ResourceMapperInterface
{
    /**
     * @var
     */
    protected $hydrator;

    /**
     * @var
     */
    protected $entityPrototype;

    /**
     * @param HydratorInterface|null $hydrator
     * @param null $entity
     */
    public function __construct($entity = null, HydratorInterface $hydrator = null)
    {
        if (is_object($entity)) {
            $this->entityPrototype = $entity;
        }

        if ($hydrator instanceof HydratorInterface) {
            $this->hydrator = $hydrator;
        } else {
            $this->hydrator = new ObjectProperty();
        }
    }

    /**
     * @param array $data
     * @param null $entity
     * @return object
     */
    public function createEntity(array $data, $entity = null)
    {
        if (null === $entity && null === $this->entityPrototype) {
            return false;
        }
        $entityPrototype = $entity ?: $this->entityPrototype;
        if (!is_object($entityPrototype)) {
            return false;
        }
        return $this->hydrator->hydrate($data, $entityPrototype);
    }

    /**
     * @param $hydrator
     * @return $this
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }
}
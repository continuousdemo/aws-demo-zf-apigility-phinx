<?php
namespace PsApiBase\Model\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;

interface MapperInterface
{
    /**
     * @param $where
     * @param null $columns
     * @return mixed
     */
    public function find($where, $columns = null);

    /**
     * @param null $where
     * @param null $columns
     * @return mixed
     */
    public function findAll($where = null, $columns = null);

    /**
     * @param $data
     * @param HydratorInterface|null $hydrator
     * @return mixed
     */
    public function save($data, HydratorInterface $hydrator = null);

    /**
     * @param $data
     * @param null $where
     * @param HydratorInterface $hydrator
     * @return mixed
     */
    public function update($data, $where = null, HydratorInterface $hydrator = null);
}
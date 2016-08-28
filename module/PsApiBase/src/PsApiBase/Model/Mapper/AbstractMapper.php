<?php
namespace PsApiBase\Model\Mapper;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Class AbstractMapper
 */
abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var
     */
    protected $tableGateway;

    /**
     * @var
     */
    protected $hydrator;

    /**
     * @param TableGatewayInterface $tableGateway
     * @param HydratorInterface $hydrator
     */
    public function __construct(TableGatewayInterface $tableGateway, HydratorInterface $hydrator)
    {
        $this->tableGateway = $tableGateway;
        $this->hydrator = $hydrator;
    }

    /**
     * @param int|array $where
     * @param null $columns
     * @return null
     */
    public function find($where, $columns = null)
    {
        $select = $this->tableGateway->getSql()->select();

        if ($columns) {
            $select->columns($columns);
        }

        if (!is_array($where)) {
            $where = ['id' => $where];
        }

        $select->where($where)
            ->limit(1);

        $result = $this->tableGateway->selectWith($select);

        if (!$result->count()) {
            return null;
        }

        return $result->current();
    }

    /**
     * @param array $where
     * @param null $columns
     * @return null
     */
    public function findAll($where = null, $columns = null)
    {
        $select = $this->tableGateway->getSql()->select();

        if ($columns) {
            $select->columns($columns);
        }

        if (is_array($where)) {
            $select->where($where);
        }

        $result = $this->tableGateway->selectWith($select);

        if (!$result->count()) {
            return null;
        }

        return $result;
    }

    /**
     * @param object|array $data
     * @param HydratorInterface|null $hydrator
     * @return bool
     */
    public function save($data, HydratorInterface $hydrator = null)
    {
        $insert = $this->tableGateway->getSql()->insert();

        $rowData = $this->entityToArray($data, $hydrator);
        $insert->values($rowData, $insert::VALUES_MERGE);

        return $this->tableGateway->insertWith($insert);
    }

    /**
     * @param $data
     * @param null $where
     * @param HydratorInterface $hydrator
     * @return mixed
     */
    public function update($data, $where = null, HydratorInterface $hydrator = null)
    {
        $update = $this->tableGateway->getSql()->update();

        $rowData = $this->entityToArray($data, $hydrator);
        $update->set($rowData);

        if ($where) {
            $update->where($where);
        }

        return $this->tableGateway->updateWith($update);
    }

    /**
     * @return mixed
     */
    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    /**
     * @param $tableGateway
     * @return $this
     */
    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param mixed $hydrator
     * @return AbstractMapper
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * Uses the hydrator to convert the entity to an array.
     *
     * Use this method to ensure that you're working with an array.
     *
     * @param object $entity
     * @param HydratorInterface|null $hydrator
     * @return array
     */
    protected function entityToArray($entity, HydratorInterface $hydrator = null)
    {
        if (is_array($entity)) {
            return $entity; // cut down on duplicate code
        } elseif (is_object($entity)) {
            $hydrator = $hydrator ?: $this->getHydrator();
            return $hydrator->extract($entity);
        }
        throw new \RuntimeException('Entity passed to db mapper should be an array or object.');
    }
}
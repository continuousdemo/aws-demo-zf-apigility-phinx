<?php
namespace PsApiBase\Model\Mapper;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\Filter\StaticFilter;
use Zend\Stdlib\Hydrator\ArraySerializable;

/**
 * Class MapperAbstractFactory
 */
class MapperAbstractFactory implements AbstractFactoryInterface
{

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return (strpos($requestedName, '.model.mapper.') !== false);
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $module = substr($requestedName, 0, strpos($requestedName, '.'));
        $model = substr($requestedName, strlen($module . '.model.mapper.'));
        $mapperClassName = '\\' . StaticFilter::execute($module, 'Word\DashToCamelCase') . '\Model\Mapper\\' . StaticFilter::execute($model, 'Word\DashToCamelCase') . 'Mapper';

        $tableGateway = $serviceLocator->get($module . '.model.table.' . $model);
        $hydrator = new ArraySerializable();
        return new $mapperClassName($tableGateway, $hydrator);
    }

}
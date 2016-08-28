<?php
namespace PsApiBase\Model\Table;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\Filter\StaticFilter;

/**
 * AbstractFactory pour l'instanciation d'un TableGateway
 */
class TableGatewayAbstractFactory implements AbstractFactoryInterface
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
//        return (substr($requestedName, 0, strlen('application.table.')) == 'application.table.') || (substr($requestedName, 0, strlen('quiz.table.')) == 'quiz.table.');
        return (strpos($requestedName, '.model.table.') !== false);
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
        $model = substr($requestedName, strlen($module . '.model.table.'));
        $modelClassName = '\\' . StaticFilter::execute($module, 'Word\DashToCamelCase') . '\Model\Entity\\' . StaticFilter::execute($model, 'Word\DashToCamelCase');

        $tableName = strtolower(StaticFilter::execute($model, 'Word\DashToSeparator', array('separator' => '_')));

        $dbAdapterName = 'db_application';

        $dbAdapter = $serviceLocator->get($dbAdapterName);

        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new $modelClassName());

        return new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
    }

}
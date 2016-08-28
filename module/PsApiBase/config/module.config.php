<?php
return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'PsApiBase\Model\Table\TableGatewayAbstractFactory',
            'PsApiBase\Model\Mapper\MapperAbstractFactory',
        ),
    ),
);

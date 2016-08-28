<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Example\\V1\\Rest\\Article\\ArticleResource' => 'Example\\V1\\Rest\\Article\\ArticleResourceFactory',
            'Example\\V1\\Rest\\Video\\VideoResource' => 'Example\\V1\\Rest\\Video\\VideoResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'example.rest.article' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/article[/:article_id]',
                    'defaults' => array(
                        'controller' => 'Example\\V1\\Rest\\Article\\Controller',
                    ),
                ),
            ),
            'example.rest.video' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/video[/:video_id]',
                    'defaults' => array(
                        'controller' => 'Example\\V1\\Rest\\Video\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'example.rest.article',
            1 => 'example.rest.video',
        ),
    ),
    'zf-rest' => array(
        'Example\\V1\\Rest\\Article\\Controller' => array(
            'listener' => 'Example\\V1\\Rest\\Article\\ArticleResource',
            'route_name' => 'example.rest.article',
            'route_identifier_name' => 'article_id',
            'collection_name' => 'article',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Example\\V1\\Rest\\Article\\ArticleEntity',
            'collection_class' => 'Example\\V1\\Rest\\Article\\ArticleCollection',
            'service_name' => 'Article',
        ),
        'Example\\V1\\Rest\\Video\\Controller' => array(
            'listener' => 'Example\\V1\\Rest\\Video\\VideoResource',
            'route_name' => 'example.rest.video',
            'route_identifier_name' => 'video_id',
            'collection_name' => 'video',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Application\\Model\\Entity\\Video',
            'collection_class' => 'Example\\V1\\Rest\\Video\\VideoCollection',
            'service_name' => 'Video',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Example\\V1\\Rest\\Article\\Controller' => 'HalJson',
            'Example\\V1\\Rest\\Video\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Example\\V1\\Rest\\Article\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Example\\V1\\Rest\\Video\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Example\\V1\\Rest\\Article\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/json',
            ),
            'Example\\V1\\Rest\\Video\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Example\\V1\\Rest\\Article\\ArticleEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.article',
                'route_identifier_name' => 'article_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'Example\\V1\\Rest\\Article\\ArticleCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.article',
                'route_identifier_name' => 'article_id',
                'is_collection' => true,
            ),
            'Application\\Model\\Entity\\Video' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.video',
                'route_identifier_name' => 'video_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Example\\V1\\Rest\\Video\\VideoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.video',
                'route_identifier_name' => 'video_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Example\\V1\\Rest\\Article\\Controller' => array(
            'input_filter' => 'Example\\V1\\Rest\\Article\\Validator',
        ),
        'Example\\V1\\Rest\\Video\\Controller' => array(
            'input_filter' => 'Example\\V1\\Rest\\Video\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Example\\V1\\Rest\\Article\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'title',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'content',
            ),
        ),
        'Example\\V1\\Rest\\Video\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'title',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'content',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'src',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'dt_update',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Example\\V1\\Rest\\Article\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ),
            ),
        ),
    ),
);

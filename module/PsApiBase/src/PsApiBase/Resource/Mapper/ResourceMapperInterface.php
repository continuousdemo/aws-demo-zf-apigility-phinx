<?php
namespace PsApiBase\Resource\Mapper;

interface ResourceMapperInterface
{
    public function createEntity(array $data, $entity = null);
}
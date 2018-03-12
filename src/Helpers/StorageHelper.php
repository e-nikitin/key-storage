<?php

namespace nikitin\KeyStorage\Helpers;


trait StorageHelper
{
    protected $typeAliases = [
        'integer' => 1,
        'string' => 2,
        'boolean' => 3,
        'array' => 4,
        'object' => 5
    ];

    protected function getTypeId($type)
    {
        return array_get($this->typeAliases, $type, 2);
    }

    protected function getTypeById($typeId)
    {
        $aliases = array_flip($this->typeAliases);
        return array_get($aliases, $typeId);
    }
}
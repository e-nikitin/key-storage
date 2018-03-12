<?php

namespace nikitin\KeyStorage\Facades;

use Illuminate\Support\Facades\Facade;

class KeyStorage extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \nikitin\KeyStorage\KeyStorage::class;
    }

}
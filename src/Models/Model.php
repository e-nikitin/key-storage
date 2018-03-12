<?php

namespace nikitin\KeyStorage\Models;


use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $conn = config('key-storage.connection');
        $this->connection = $conn;
    }

}
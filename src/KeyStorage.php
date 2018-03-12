<?php

namespace nikitin\KeyStorage;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use nikitin\KeyStorage\Helpers\StorageHelper;
use nikitin\KeyStorage\Models\Storage;

class KeyStorage
{
    use StorageHelper;

    /**
     * @var Collection
     */
    protected $data;

    public function __construct(){
        $this->update();
    }

    /**
     * @param $key
     * @param null $value
     * @return bool
     */
    public function set($key, $value = null){
        $item = Storage::where('key', $key)->first();
        if ($item){
            $item->value = $value;
            return $item->save();
        }
        $this->data->push(Storage::create(['key'=>$key,'value'=>$value]));
        return true;
    }

    /**
     * @param $key
     */
    public function get($key){
        return $this->getByOption($key, 'value');
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getType($key){
        $typeId = $this->getByOption($key, 'type');
        if (empty($typeId))
            return;
        return $this->getTypeById($typeId);
    }

    /**
     * @param bool $connection
     * @return $this
     */
    public function setConnection($connection = false){
        Config::set('key-storage.connection', $connection);
        return $this;
    }

    /**
     * @return $this
     */
    public function update(){
        $this->data = Storage::all();
        return $this;
    }

    /**
     * @return $this
     */
    public function getSelf(){
        return $this;
    }

    /**
     * @param $key
     * @return mixed|void
     */
    protected function getModelExemplar($key){
        $item = $this->data->where('key', $key)->first();
        if ($item)
            return $item;
        if (config('key-storage.doubleCheck'))
            return Storage::where('key', $key)->first();
        return;
    }

    /**
     * @param $key
     * @param $option
     */
    protected function getByOption($key, $option){
        $item = $this->getModelExemplar($key);
        if ($item)
            return $item->{$option};
        return;
    }
    

}
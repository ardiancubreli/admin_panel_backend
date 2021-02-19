<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function paginate($limit = 10)
    {
        return $this->model->orderBy('id', 'DESC')->paginate($limit);
    }

    public function find($id, $relations = [])
    {
        return $this->model->with($relations)->find($id);
    }

    public function get()
    {
        return $this->model->all();
    }
}

<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use App\Repositories\Todo\TodoInterface;

class TodoRepository implements TodoInterface
{
    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->latest()->get();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attr)
    {
        return $this->model->create($attr);
    }

    public function update($id, array $attr)
    {
        $todo = $this->model->findOrFail($id);
        $todo->update($attr);

        return $todo;
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}

<?php

namespace App\Repositories\Todo;

interface TodoInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $attr);

    public function update($id, array $attr);

    public function delete($id);
}

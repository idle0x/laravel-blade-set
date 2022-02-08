<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getList(array $filter = [], array $select = [])
    {
        $query = $this->model::query();

        if (!empty($select)) {
            $query->select($select);
        }

        return !empty($filter['paginate'])
            ? $query->paginate($filter['paginate'])
            : $query->get();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }
}

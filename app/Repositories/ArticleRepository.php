<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Collection;

class ArticleRepository
{
    private $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function getList(array $filter = [], array $select = [])
    {
        if (!empty($filter['search'])) {
            $query = $this->model::search($filter['search']);
        } else {
            $query = $this->model::query();
        }

        if (!empty($filter['created_at_from'])) {
            $query->where('created_at', '>=', $filter['created_at_from']);
        }

        if (in_array('user', $select)) {
            $query->with('user');
            unset($select[array_search('user', $select)]);
        }

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

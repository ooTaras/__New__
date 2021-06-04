<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];
        $result = $this
            ->startCondition()
            ->select($columns)
            ->paginate($perPage);
        return $result;
    }

    public function getForComboBox()
    {
        $columns=implode(',',[
            'id',
            'CONCAT(id,".",title) AS id_title',]);

        $result=$this
        ->startCondition()
        ->selectRaw($columns)
        ->toBase()
        ->get();

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startCondition()->find($id);
    }
}

<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate()
   {
       $columns=[
        'id',
        'title',
        'is_published',
        'published_at',
        'user_id',
        'category_id'];

        $result=$this->startCondition()
        ->select($columns)
        ->orderBy('id','DESC')
        ->with([
            'category'=>function($query){
                $query->select(['id','title']);
            },
            'user:id,name',
        ])
        ->paginate(25);

        return $result ;
   }

   public function getEdit($id)
   {
        return $this->startCondition()->find($id);
   }
}

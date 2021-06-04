<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
 

abstract class  CoreRepository
{
    protected  $model;

    abstract protected function getModelClass();
    
    public function __construct()
    {
        $this->model=app($this->getModelClass());
    }
    

    protected function startCondition()
    {
        return clone $this->model;
    }
}

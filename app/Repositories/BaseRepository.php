<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;   //eloqent er maddhome isert update kora hoy


class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function get()
    {
        return $this->model->get();
    }
    public function find($id)
    {
       $data=  $this->model->find($id);
       if(!$data){
        flash('No item Found')->error();
        return null;
       }else{
           return $data;
       }
    }
    public function delete($id)
    {
      //  dd('hello');
        $data = $this->model->find($id);
        if (!$data) {
            flash('No item Found')->error();
        } else {
            flash('Successfully Deleted')->success();
            $data->delete();
        }
    }
}

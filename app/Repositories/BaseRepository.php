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
        return $this->model->find($id);
    }
    public function delete($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            flash('No item Found')->error();
            return redirect('/admin/categories');
        } else {
            $data->delete();
        }
    }
}

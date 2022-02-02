<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function get();
    public function find($id);
    public function delete($id);
}

<?php

namespace App\Interfaces;


interface IProductRepository extends IBaseRepository
{
    public function CreateProduct($request);

    public function GetLatestProductList();
    public function GetSpecialProductList();
  

}

<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Product;
use PhpParser\Node\Stmt\TryCatch;

class ProductRepository extends BaseRepository implements IProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function CreateProduct($request)
    {
      try {
        if($request->hasfile('featured_image')){
          $path = $request->file('featured_image')->store('products_images', 'public');
        }else{
          $path = null;
        }
        $product =  $this->model;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_amount = $request->discount_amount;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->featured_image = $path;
        $product->save();
        flash('Successfully Added')->success();
      } catch (\Throwable $th) {
        flash("Something Went wrong")->error();
      }
    }
}

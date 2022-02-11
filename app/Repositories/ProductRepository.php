<?php

namespace App\Repositories;

use App\Interfaces\IImageRepository;
use App\Interfaces\IProductRepository;
use App\Models\Image;
use App\Models\Product;
use PhpParser\Node\Stmt\TryCatch;
use App\Interfaces\ImageRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    protected $model;
    // protected $imageRepo;

    public function __construct(Product $model)
    {
      // $this->imageRepo=$imageRepo;
        parent::__construct($model);
    }
    public function CreateProduct($request)
    {
      try {
        if($request->hasFile('featured_image')){
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
        if($request->hasFile('images')){
          foreach ($request->file('images') as $image) {
            $path = $image->store('products_images', 'public');
            $image = new Image();
            $image->path = $path;
            $image->product_id = $product->id;
            $image->save();
          }
        }else{
          $path = null;
        }
        flash('Successfully Added')->success();
      } catch (\Throwable $th) {
        flash("Something Went wrong")->error();
      }
    }
}

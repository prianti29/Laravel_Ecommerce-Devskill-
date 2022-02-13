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
  protected $productModel;
  // protected $imageRepo;

  public function __construct(Product $model)
  {
    // $this->imageRepo=$imageRepo;
    $this->productModel = $model;
    parent::__construct($model);
  }
  public function CreateProduct($request)
  {
    try {
      if ($request->hasFile('featured_image')) {
        $path = $request->file('featured_image')->store('products_images', 'public');
      } else {
        $path = null;
      }
      $product = $this->model;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->discount_amount = $request->discount_amount;
      $product->stock = $request->stock;
      $product->category_id = $request->category_id;
      $product->description = $request->description;
      $product->featured_image = $path;
      $product->save();
      if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
          $path = $image->store('products_images', 'public');
          $image = new Image();
          $image->path = $path;
          $image->product_id = $product->id;
          $image->save();
        }
      } else {
        $path = null;
      }
      flash('Successfully Added')->success();
    } catch (\Throwable $th) {
      flash('Something went wrong ' . $th->getMessage())->error();
    }
  }
  public function GetLatestProductList()
  {
    $data = $this->productModel->take(8)->orderBy('created_at','desc')->get();
    return $data;
  }
  public function GetSpecialProductList()
  {
    $data = $this->model->where('discount_amount', '!=', 0)
      ->take(8)
      ->orderBy('discount_amount', 'desc')
      ->get();
    return $data;
  }
}

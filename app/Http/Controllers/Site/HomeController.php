<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function index (){
        $data["latest_products"]= $this->productRepo->GetLatestProductList();
        $data["special_products"]= $this->productRepo->GetSpecialProductList();
       // $data["random_products"]= $this->productRepo->GetRandomProductList();
        return view('site.home');
    }
}

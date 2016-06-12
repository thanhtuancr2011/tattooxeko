<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->images = $product->images()->select('folder', 'name', 'stored_file_name')->orderBy('created_at')->get();

        // Get products sale
        $productModel = new ProductModel;
        $saleProducts = $productModel->getSaleProducts();

        // Get list product with categoryid
        $listProductMapCategoryId = $productModel->getListProductMapCategoryId();

        return view('front-end.product.index' ,compact('product', 'saleProducts', 'listProductMapCategoryId'));
    }

    /**
     * Show modal quick view product
     *
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @param  Int $productId ProductId
     * 
     * @return Void            
     */
    public function showModalProduct($productId) 
    {
        $productModel = new ProductModel;
        $product = $productModel->getProductWithId($productId);

        return view('front-end.product.product-detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Get product with type
     * 
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @param String $type Type of product
     * 
     * return Response
     */
    public function getProductWithType($type)
    {
        $productModel = new ProductModel;

        // Get all tattoo images
        $products = $productModel->getProductWithType($type);

        // Type of product
        $typeProduct = $type;

        $totalProducts = count($products);

        return view('front-end.category.index', compact('products', 'typeProduct', 'totalProducts'));
    }

    /**
     * Get product image with id
     * 
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @param Int $id Product id
     * 
     * return Response
     */
    public function getImageProduct($id)
    {
        $product = ProductModel::findOrFail($id);

        // Get all tattoo images
        $productImage = $product->images->first();

        return view('front-end.product.view-image', compact('productImage'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManagedUserRequest;
use App\User;
use App\Size;
use App\Products;
use App\Images;
use App\Categories;
use Validator;
use Input;
use File;
use DB;
use App\productSize;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|min:3',
            'modelNo' => 'required|max:255|alpha_num|unique:products',
            'price' => 'required|numeric',
            'sale' => 'required|numeric',
            'timeSale' => 'required|date',
            'description' => 'required|min:6',
            'category_id' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'quantityInStock' => 'required|numeric|min:1',
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = DB::table('products')
                        ->join('productSize', 'products.id', '=', 'productSize.product_id')
                        ->join('images', 'products.id', '=', 'images.product_id')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'productSize.name as productSize', 'images.name as imageName', 'categories.name as categoryName')
                        ->groupby('products.id')
                        ->get();
        return view('admin.products.product_list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $size = DB::table('sizes')->get();
        return view('admin.products.product_add',['sizes' => $size]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */

    public function store(Request $request)
    {
        $input = $request->only('name','modelNo','price', 'description','category_id','brand','quantityInStock','size', 'sale', 'timeSale');
        $validator = $this->validator($input);

        if ($validator->fails()) {
            return redirect('admin/product_add')
                        ->withErrors($validator);
        } else {
            $product=new Products;
            $product->name= $request->input('name');
            $product->modelNo= $request->input('modelNo');
            $product->price= $request->input('price');
            $product->sale= $request->input('sale');
            $product->timeSale= $request->input('timeSale');
            $product->description= $request->input('description');
            $product->category_id= $request->input('category_id');
            $product->brand= $request->input('brand');
            $product->quantityInStock= $request->input('quantityInStock');
            $product->save();

            $sizes= $request->input('size');
            foreach ($sizes as $size){
                $productSize = new productSize;
                $productSize->name = $size;
                $productSize->product_id = $product->id;
                $productSize->save();
            }

            $imageName = '';
            $images = $request->file('image');
            foreach ($images as $image){
                $rules = ['image' => 'required|image|mimes:jpg,jpeg,png,gif|image_size:<=30000'];
                $validator = Validator::make(array('image'=> $image), $rules);
                if($validator->passes()){
                    global $imageName;
                    $rand=rand(1,10000);
                    $imageName = $rand . '.'. $request->input('modelNo') . '.' .  $image->getClientOriginalExtension();
                    $image->move(base_path() . '/public/images_product', $imageName);
                    
                    $image = new Images;
                    $image->name = 'images_product/'. $imageName;
                    $image->product_id = $product->id;
                    $image->save();
                }
                else {
                    return redirect('admin/product_add')
                        ->withErrors($validator);
                }
            }
            return redirect('admin/product_list');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id)
    {
        $products = DB::table('products')
                        ->join('productSize', 'products.id', '=', 'productSize.product_id')
                        ->join('images', 'products.id', '=', 'images.product_id')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'productSize.name as productSize', 'images.name as imageName', 'categories.name as categoryName')
                        ->where('products.id', '=', $id)
                        ->get();
        $sizes = array();
        foreach ($products as $product) {
            $sizes[] = $product->productSize;
        }
        $sizes = array_unique($sizes);

        $images = array();
        foreach ($products as $product) {
            $images[] = $product->imageName;
        }
        $images = array_unique($images);
        return view('admin.products.product_view', ['product' => $products, 'sizes' => $sizes, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $products = DB::table('products')
                        ->join('productSize', 'products.id', '=', 'productSize.product_id')
                        ->join('images', 'products.id', '=', 'images.product_id')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'productSize.name as productSize', 'images.name as imageName', 'categories.name as categoryName')
                        ->where('products.id', '=', $id)
                        ->get();
        $sizes = array();
        foreach ($products as $product) {
            $sizes[] = $product->productSize;
        }
        $sizes = array_unique($sizes);

        $sizeAlls = DB::table('sizes')->get();
        return view('admin.products.product_edit', ['sizeAlls'=>$sizeAlls, 'products' => $products, 'sizes' => $sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $productSizes = DB::table('productSize')->where('product_id','=', $id)->select('id')->get();
        foreach ($productSizes as $productSize) {
            DB::table('productSize')->whereIn('id', [$productSize->id])->delete();

        }
        $images = DB::table('images')->where('product_id','=', $id)->select('id')->get();
        foreach ($images as $image) {
            DB::table('images')->whereIn('id', [$image->id])->delete(); 
        }

        //deleteProduct
        $product = Products::findOrFail($id);
        $product->delete();
        return Redirect::to('admin/product_list');
    }
}
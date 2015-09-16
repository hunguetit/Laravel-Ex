<?php

namespace App\Http\Controllers\FrontEnd;

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

class FrontEndController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                        ->join('images', 'products.id', '=', 'images.product_id')
                        ->select('products.*', 'images.name as imageName')
                        ->orderby('created_at', 'desc')
                        ->groupby('products.id')
                        ->limit(10)
                        ->get();

        $categories = DB::table('categories')
                        ->select('categories.*')
                        ->where('categories.parent_id', '=', '1')
                        ->limit(3)
                        ->get();
        return view('users.pages.index', ['products' => $products, 'categories'=>$categories]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function bike()
    {
        $mountainbikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Moutain Bikes')
                            ->select('products.*')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();
        $roadbikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Road Bikes')
                            ->select('products.*')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();

        $kidbikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Kid Bikes')
                            ->select('products.*')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();

        $balancebikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Balance Bikes')
                            ->select('products.*')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();
        $fixiebikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Fixie Bikes')
                            ->select('products.*')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();
        $timeCurrent = date('Y-m-d');
        


        $timeSales =  DB::table('products')
                            ->select('products.timeSale')
                            ->where('timeSale', '<>', '0-0-0')
                            ->orderBy('timeSale', 'asc')
                            ->groupby('timeSale')
                            ->get();
        $days = array();
        foreach ($timeSales as $timeSale) {
            $days[] = (strtotime($timeSale->timeSale) - strtotime($timeCurrent)) / (60 * 60 * 24);
        }
        $days = max($days);
        $week = $timeCurrent;
        if ($days > 0){
            $week = strtotime(date("Y-m-d", strtotime($timeCurrent)) . "+ ". $days . "days");
            $week = strftime("%Y-%m-%d", $week);
        }

        $bikes_sales = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*')
                            ->where('timeSale', '=', $week)
                            ->orderBy('timeSale', 'asc')
                            ->limit(4)
                            ->get();
        return view('users.pages.bicycles', ['week'=>$week, 'bikes_sales' => $bikes_sales,'mountainbikes' => $mountainbikes,'roadbikes' => $roadbikes,'kidbikes' => $kidbikes,'balancebikes' => $balancebikes, 'fixiebikes' => $fixiebikes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function mountainbikes()
    {
        $mountainbikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Moutain Bikes')
                            ->select('products.*')
                            ->get();
        return view('users.pages.bikes.mountainbikes', ['mountainbikes' => $mountainbikes]);
    }

    public function roadbikes()
    {
        $roadbikes = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', 'Road Bikes')
                            ->select('products.*')
                            ->get();
        return view('users.pages.bikes.roadbikes', ['roadbikes' => $roadbikes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

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

        $related_products = DB::table('products')
                            ->join('images', 'products.id', '=', 'images.product_id')
                            ->orderBy('created_at', 'desc')
                            ->select('products.*', 'images.name as imageName')
                            ->where('products.category_id', '=', $products[0]->category_id)
                            ->groupby('products.id')
                            ->limit(4)
                            ->get();
        for ($i = 0; $i <count($related_products); $i++) {
            if ($related_products[$i]->id == $products[0]->id){
                unset($related_products[$i]);
            }
        }

        $newest_products = DB::table('products')
                            ->join('images', 'products.id', '=', 'images.product_id')
                            ->orderBy('created_at', 'desc')
                            ->groupby('products.category_id')
                            ->select('products.*', 'images.name as imageName')
                            ->get();
        for ($i = 0; $i <count($newest_products); $i++) {
            if ($newest_products[$i]->id == $products[0]->id){
                unset($newest_products[$i]);
            }
        }
        $posts = DB::table('comments')
                        ->join('users', 'users.id', '=', 'comments.user_id')
                        ->join('products', 'products.id', '=', 'comments.product_id')
                        ->select('comments.comment', 'users.name as username', 'users.avatar as avatar')
                        ->where('comments.product_id', '=', $id)
                        ->get();
        return view('users.pages.single', ['posts' => $posts,'newest_products'=>$newest_products, 'related_products' => $related_products, 'product' => $products, 'sizes' => $sizes, 'images' => $images]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

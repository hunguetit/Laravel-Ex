<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManagedUserRequest;
use App\User;
use App\Products;
use App\Images;
use App\Categories;
use Validator;
use Input;
use File;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.categories.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.categories_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category=new Categories;
        $category->name= $request->input('name');
        $category->parent_id= $request->input('parent_id');

        $cat = Categories::FindOrFail($category->parent_id);
        $category->level = $cat->level +1;
        $category->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        return view('admin.categories.categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        if (($category->parent_id) == 0){
            $cat = Categories::FindOrFail($id);
            return view('admin.categories.categories_edit',['cat'=>$cat,'category'=>$category]);
        } else {
            $cat = Categories::FindOrFail($category->parent_id);
            return view('admin.categories.categories_edit',['cat'=>$cat,'category'=>$category]);
        }
        
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
        $category=new Categories;
        $category->name= $request->input('name');
        $category->parent_id= $request->input('parent_id');

        if (($category->parent_id) != 0){
            $cat = Categories::FindOrFail($category->parent_id);
            $category->level = $cat->level +1;
            
            DB::table('categories')
                ->where('id','=', $id)
                ->update(['name' => $category->name, 'parent_id'=>$category->parent_id, 'level'=> $category->level]);
        } else {
            dd();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $category = Categories::findOrFail($id);

        $product_category = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name as categoryName')
                        ->where('categories.id' ,'=', $id)
                        ->count();
        if ($product_category = 0){
            $category->delete();
            return Redirect::to('admin/categories');
        } else {
            return Redirect::to('admin/categories')
                            ->withErrors('The category have products so can not delete this category');
        }
    }
}

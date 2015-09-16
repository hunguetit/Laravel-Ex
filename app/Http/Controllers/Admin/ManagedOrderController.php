<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ManagedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->select('orders.*', 'customers.customerName as customerName', 'customers.phone as phone', 'customers.address as address')
                        ->get();
        return view('admin.orders.orders_list', compact('orders'));
    }

    public function view($id)
    {
        $orders = DB::table('orderdetails')
                        ->join('products', 'orderdetails.product_id', '=', 'products.id')
                        ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->select('orderdetails.*', 'products.name as productName', 'products.modelNo as productModelNo', 'orders.requiredDate as requiredDate', 'orders.totalPrice as totalPrice', 'orders.status as status', 'customers.customerName as customerName', 'customers.phone as phone', 'customers.address as address')
                        ->where('orderdetails.order_id', '=', $id)
                        ->get();
        return view('admin.orders.order_view', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function updateOrder($id, Request $request)
    {
        $shipped = $request->input('shipped');
        if ($shipped == 'on'){
            DB::table('orders')
                ->where('id','=', $id)
                ->update(['orders.status' => 1]);
            return redirect('admin/orders_list');
        } else {
            return redirect('admin/orders_list');
        }
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

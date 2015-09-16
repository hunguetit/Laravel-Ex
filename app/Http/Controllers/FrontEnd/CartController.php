<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Products;
use App\OrderDetails;
use DB;
use Cart;
use Validator;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Mail;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'customerName' => 'required|min:3',
            'phone' => 'required|numeric',
            'address' => 'required|min:6',
            'requiredDate' => 'required|date',
            'email' => 'required|email|max:255',
        ]);
    }
    /**
     * Add a row to the cart
     *
     * @param string|Array $id      Unique ID of the item|Item formated as array|Array of items
     * @param string       $name    Name of the item
     * @param int          $qty     Item qty to add to the cart
     * @param float        $price   Price of one item
     * @param Array        $options Array of additional options, such as 'size' or 'color'
     */


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function addToCart($id, Request $request)
    {
        $product = DB::table('products')
                        ->join('images', 'products.id', '=', 'images.product_id')
                        ->select('products.*', 'images.name as imageName')
                        ->where('products.id', '=', $id)
                        ->groupby('products.id')
                        ->get();
        $name = $product[0]->name;
        $price = $product[0]->price * ((100-$product[0]->sale)/100);
        $image = $product[0]->imageName;
        Cart::add(array('id' => $id, 'name' => $name, 'qty' => 1, 'price' => $price, 'options' => array('size' => 'L', 'image' => $image)));
        return redirect('user/cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showCart()
    {
        $carts=Cart::content();
        foreach ($carts as $cart) {
            $products = Products::findOrFail($cart->id);
            $quantityInStock = $products->quantityInStock - $cart->qty;
            DB::table('products')
                ->where('id','=', $cart->id)
                ->update(['quantityInStock' => $quantityInStock]);
        }
        $total=Cart::total();
        return view('users.pages.cart', compact('carts', 'total'));
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
    
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $qty = $request->input('quantity');
        $size = $request->input('size');
        Cart::update($id, array('qty' => $qty,'options' => array('size'=>$size)));
        return redirect('user/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function remove($rowid)
    {
        Cart::remove($rowid);
        return redirect('user/cart');
    }

    public function destroy(){
        Cart::destroy();
        return redirect('user/cart');
    }

    public function order()
    {
        $carts=Cart::content();
        $total=Cart::total();
        return view('users.pages.order', compact('carts', 'total'));
    }

    public function saveOrder(Request $request){
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->fails()) {
            return redirect('user/cart/order')
                        ->withErrors($validator);
        } else {
            $customer = new Customer;
            $customer->user_id = Auth::user()->id;
            $customer->customerName = $request->input('customerName');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->email = $request->input('email');
            $customer->save();

            $total=Cart::total();
            $order = new Order;
            $order->totalPrice = $total;
            $order->requiredDate = $request->input('requiredDate');
            $order->status = "0";
            $order->customer_id = $customer->id;
            $order->comment = "";
            $order->save();

            $carts=Cart::content();
            
            foreach($carts as $cart){
                $orderdetail =new OrderDetails;
                $orderdetail->order_id = $order->id;
                $orderdetail->quantity = $cart->qty;
                $orderdetail->size = $cart->options->size;
                $orderdetail->product_id = $cart->id;
                $orderdetail->save();
            }
            Mail::send('users.mails.order', array('name'=>$customer->customerName), function($message) use ($customer){
                $message->from('hunguetit@gmail.com', 'Bicycle Sport Shop');
                $message->to($customer->email, $customer->customerName)->subject('Thanks you for ordering at Bicycle Sport Shop!');
            });
            return redirect('');
        }
    }
}

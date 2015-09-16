<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce | Cart </title>
@include('users.includes.head')
@include('users.includes.script')
<!--js-->

</head>
<body>
<!--banner-->
<div class="banner-bg banner-sec">  
      <div class="container">
 @include('users.includes.header')
      </div>                 
</div>
<!--/banner-->
<div class="cart">
     <div class="container">
            
         <div class="col-md-9 cart-items">
             <h3>My Shopping Bag ({{Cart::count(false)}})</h3>
            <div class="clearfix">
                </br>
            </div>
            
            
            @foreach($carts as $cart)
            <form method="POST" action="{{ asset('user/cart/update/'.$cart->rowid) }}">
                {!! csrf_field() !!}
            <div class="cart-header">
                 <div class="close"><a href="{{asset('/user/cart/'.$cart->rowid.'/delete')}}" class="btn btn-sm red"><i class="fa fa-times"></i></a></div>
                 <div class="cart-sec">
                    <div class="cart-item cyc">
                         <img src="{{ asset($cart->options->image) }}"/>
                    </div>
                   <div class="cart-item-info">
                    <?php $product = DB::table('products')
                                    ->join('productSize', 'products.id', '=', 'productSize.product_id')
                                    ->where('products.id', '=', $cart->id)
                                    ->select('products.*', 'productSize.name as productSize')
                                    ->get();  ?>
                         <h3>{{ $cart->name }}<span>Model No:: {{ $product[0]->modelNo}}</span></h3>
                         <h4><span>Rs. $ </span>{{ round($cart->price, 2) }}</h4>
                         <p class="qty">Quantity ::</p>
                         <input style="width: 70px; display: inline" min="1" type="number" id="quantity" name="quantity" value="{{ $cart->qty }}" class="form-control input-small quantity">
                         <h4><span>Size </span></h4>
                         <select style="width: 70px; display: inline" class="form-control input-sm" name="size", id="size">
                            <option value="{{$cart->options->size}}" select="selected">{{$cart->options->size}}</option>
                            @foreach($product as $pro)
                            <option value="{{$pro->productSize}}" select="selected">{{$pro->productSize}}</option>
                            @endforeach
                         </select>
                         <button type="submit" class="btn">REFRESH</button>
                   </div>
                   <div class="clearfix"></div>
                    <div class="delivery">
                         <p>Service Charges:: Rs.{{ $cart->price }}</p>
                         <span>Delivered in 2-3 bussiness days</span>
                         <div class="clearfix"></div>
                    </div>                      
                </div>
             </div>
              </form>
             @endforeach
        
            <a style="width: 100px; float: right" class="order" href="{{asset('/user/cart/destroy')}}">RESET</a>
         </div>
         
         <div class="col-md-3 cart-total">
             <a class="continue" href="{{ asset('bike') }}">Continue to buy</a>
             <div class="price-details">
                 <h3>Price Details</h3>
                 <span>Total</span>
                 <span class="total">$ {{round($total, 2)}}</span>
                 <span>Discount</span>
                 <span class="total">---</span>
                 <span>Delivery Charges</span>
                 <span class="total">$ {{round($total * 0.01, 2)}}</span>
                 <div class="clearfix"></div>                
             </div>
             <h4 class="last-price">TOTAL</h4>
             <span class="total final">$ {{ round($total*1.01 , 2)}}</span>
             <div class="clearfix"></div>
             <a class="order" href="{{ asset('user/cart/order') }}">Place Order</a>
             <div class="total-item">
                 <h3>OPTIONS</h3>
                 <h4>COUPONS</h4>
                 <a class="cpns" href="#">Apply Coupons</a>
             </div>
            </div>
     </div>
</div>
<div class="footer">
@include('users.includes.footer')
</div>

</body>
</html>
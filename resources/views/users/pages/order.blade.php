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
<script type="text/javascript" src="{{ asset("/assets/bootstrap/js/bootbox.min.js" )}}"></script>
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
            <h3>Order Information</h3>
            <div class="clearfix">
                <br></br>
            </div>
         </div>
    <div class="row">
            <div class="col-md-12">
            <form action="{{ asset('user/cart/order') }}" roll='form' method="POST">
                {!! csrf_field() !!}
                <div class="portlet">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="portlet-body">
                        <div class="tabbable">
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">

                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Name: 
                                                <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="customerName" value="{{Auth::user()->name}}" >
                                            </div>
                                        </div>
                                        <br></br>
                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Email: 
                                                <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Phone Number: 
                                                <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" name="phone" placeholder="0123456789">
                                            </div>
                                        </div>
                                        <br></br>
                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Address: 
                                                <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="address" placeholder="266 Đội Cấn, Ba Đình, Hà Nội">
                                            </div>
                                        </div>
                                        <br></br>
                                        <div class="form-group style-group-edit">
                                            <label class="col-md-2 control-label">Required Shipped Date: 
                                                <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="date" class="form-control" name="requiredDate" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                <br></br>
            </div>
            <div class="col-md-9 cart-items">
            <h3>Order Ship Bill</h3>
            <div class="clearfix">
                </br>
            </div>
            <div class="table-container">

                <div id="datatable_products_wrapper" class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_users" aria-describedby="datatable_products_info" role="grid">
                    <thead>
                    <tr role="row" class="heading">
                        <th width="3%" class="sorting_asc" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
                             ID
                        </th>
                        <th width="30%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
                            Product Name
                        </th>
                        <th width="15%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
                             Price
                        </th>
                        <th width="10%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
                             Quantity
                        </th>
                        <th width="10%" class="sorting" tabindex="0" aria-controls="datatable_products" rowspan="1" colspan="1" >
                             Size
                        </th>
                        </tr>
                    
                    </thead>
                    <tbody>
                    @foreach ($carts as $cart)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $cart->id }}</td>
                            <td>{{ $cart->name }}</td>
                            <td>$ {{ $cart->price }}</td>
                            <td>{{$cart->qty}}</td>
                            <td>{{$cart->options->size}}</td>
                        </tr>   
                    @endforeach
                    </tbody>
                </table></div></div>
        </div>
        </div>
         </div>
                                <br></br>
                            <button type="submit" class="btn" style="float: right; margin-right: 10px;">SUBMIT</button>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
            
        </div>
     </div>
</div>
<div class="footer">
@include('users.includes.footer')
</div>

</body>
</html>
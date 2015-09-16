@extends('admin.layouts.default')
@section('title','Add Products')
<?php
	function haveChild($id_cha){
      $check= DB::select("SELECT count(*) as cot FROM categories WHERE parent_id='$id_cha'");
      if($check[0]->cot > 0){
        return $check[0]->cot;
      } else {
        return 0;
      }
    }

    function recursiveMenu($id_cha){
    	$categories = DB::table('categories')->where('parent_id','=', $id_cha)->get();
    	foreach ($categories as $category){
			echo "<option value='$category->id'>";
			$name = '';
			for($i=0; $i<$category->level;$i++){
		        $name .='&nbsp&nbsp';
		    }
		    $name .= ''. $category->name;
			echo($name);
			echo "</option>";

			$haveChild= haveChild($category->id);
			if($haveChild>0){ 
	        	recursiveMenu($category->id);          
	        }
		}
	}
	?>
<!-- release v4.2.6, copyright 2014 - 2015 Kartik Visweswaran -->
@section('content')
        <div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<h3 class="page-title">
			Add products
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12 ">
				<div class="portlet box blue">
					<script>
                    @if (count($errors) > 0)
                        bootbox.alert({
                              message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
                              title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
                            });
                    @endif
                    </script>
					<div class="portlet-body form">
					<form action="{{asset('admin/product_add')}}" roll='form' method="POST" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">Product Name:
								</label>
								<input type="text" class="form-control" name="name" value="{{$products[0]->name}}">
							</div>
							<div class="form-group">
								<label class="control-label">Model No:
								</label>
								<input type="text" class="form-control" name="modelNo" value="{{$products[0]->modelNo}}">
							</div>
							<div class="form-group">
								<label class="control-label">Price:
								</label>
								<input type="text" class="form-control" name='price' value="{{$products[0]->price}}">
							</div>
							<br>
							<div class="form-group">
								<label class="control-label">Description:
								</label>
								<textarea class="form-control" name="description" value="{{$products[0]->description}}"></textarea>
							</div>

							<br>
							<div class="form-group">
								<label class="control-label">Category:
								</label>
								<select class="form-control input-sm" name="category_id", id="category">
									<option value="{{$products[0]->categoryName}}">{{$products[0]->categoryName}}
									</option>
								<?php
								$categories = DB::table('categories')->where('parent_id','=', 0)->get();

								foreach ($categories as $category){
									?>

										<optgroup label="{{$category->name}}">
									    </optgroup>
									<?php

									$haveChild= haveChild($category->id);
									if($haveChild>0){ 
							        	recursiveMenu($category->id);          
							        }
								}
							    ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Brand:
								</label>
								<input type="text" class="form-control" name="brand" value="{{$products[0]->brand}}">
								
							</div>
							<div class="form-group">
								<label class="control-label">Quantity In Stock:
								</label>
								<input type="text" class="form-control" name="quantityInStock" value="{{$products[0]->quantityInStock}}"> 
							</div>
							<div class="form-actions right">
							<input type="submit" class="btn green" value="Create"/>
						</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
		<!-- END PAGE CONTENT-->
		<!-- -->
	</div>
</div>
@stop
@section('script')
@stop
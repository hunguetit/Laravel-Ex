@extends('admin.layouts.default')

@section('title','Add Categories')
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
@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<h3 class="page-title">
			Add categories
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12 ">
				<div class="portlet box blue">
					<div class="portlet-body form">
					<form action="{{asset('admin/categories_add')}}" roll='form' method="POST">
						{!! csrf_field() !!}
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">Name:
								</label>
								<input type="text" class="form-control" name="name">
							</div>

							<div class="form-group">
								<label class="control-label">Category:
								</label>
								<select class="form-control input-sm" name="parent_id", id="category">
								<?php
								$categories = DB::table('categories')->where('parent_id','=', 0)->get();
								foreach ($categories as $category){
									?>
										<option>{{$category->name}}
									    </option>
									<?php

									$haveChild= haveChild($category->id);
									if($haveChild>0){ 
							        	recursiveMenu($category->id);          
							        }
								}
							    ?>
								</select>
							</div>
						<div class="form-actions right">
							<button type="submit" class="btn green" value="Create">Create</button>
						</div>
						</form>
					</div>
				</div>	
			</div>

		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
@stop


@section('script')

@stop
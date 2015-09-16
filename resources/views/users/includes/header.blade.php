<!--banner-->
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
    	?>
    	<ul class="dropdown2">
    	<?php
    	$word = array();
    	foreach ($categories as $category){
    		$numOfWord = str_word_count($category->name);
    		$word = explode(' ', $category->name);
    		$link = '';
    		if ($numOfWord > 1){
    			for ($i=0; $i<$numOfWord; $i++){
    				$link .= $word[$i];
    			}
    		} else {
    			$link = $category->name;
    		}
			echo "<li value='$category->id'><a href='http://localhost/HungNH/public/$link'>";
			$name = '';
		    $name .= ''. $category->name;
			echo($name);
			echo "</a></li>";

			$haveChild= haveChild($category->id);
			if($haveChild>0){ 
	        	recursiveMenu($category->id);          
	        }
		}?>
		</ul>
		<?php
	}
	?>
<div class="banner-bg banner-sec">	
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="{{ asset('home') }}"><img src="{{ asset('/frontend/images/logo.png') }}" alt=""/></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
					   	<ul class="nav navbar-nav pull-right">
					   	<?php
							$categories = DB::table('categories')->where('parent_id','=', 0)->get();
							foreach ($categories as $category){
								?>
									<li class="dropdown1"><a href="{{ asset('bike') }}">{{$category->name}}</a>
								<?php

								$haveChild= haveChild($category->id);
								if($haveChild>0){ 
						        	recursiveMenu($category->id);          
						        }
							}
						?>
						@if (!Auth::check())
                         <li class="dropdown1"><a href="{{ url('/auth/login') }}">LOG IN</a></li>
                         <li class="dropdown1"><a href="{{ url('/auth/register') }}">SIG IN</a></li>
                         @else
						 <li class="dropdown dropdown-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img width="50px" height="50px" alt="" class="img-circle" src="{{ asset(Auth::user()->avatar) }}"/>{{ Auth::user()->name }}
								<i class="fa fa-angle-down"></i>
							</a>
							<ul>
								@if (Auth::user()->role == "admin")
									<li>
										<a href="{{asset('admin/users_list')}}">
										<i class="icon-key"></i> Trang quản lý </a>
									</li>
								@endif
								<li>
									<a href="{{asset('profile')}}">
									<i class="icon-user"></i> My Profile </a>
								</li>
								<li>
									<a href="{{asset('auth/logout')}}">
									<i class="icon-key"></i> Log Out </a>
								</li>
							</ul>
						</li>
						@if (Auth::user()->role == "user")
							<a class="shop" href="{{asset('user/cart')}}"><img src="{{ asset('/frontend/images/cart.png') }}" alt=""/></a>
						@endif
					@endif
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div>			 
</div>
<!--/banner-->
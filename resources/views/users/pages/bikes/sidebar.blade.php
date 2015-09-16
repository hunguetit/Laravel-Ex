<?php

    function recursiveMenuSideBar($id_cha){
    	$categories = DB::table('categories')->where('parent_id','=', $id_cha)->get();
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
			echo "<option><a href='http://localhost/HungNH/public/$link'>";
			$name = '';
			for($i=0; $i<$category->level;$i++){
		        $name .='&nbsp&nbsp';
		    }
		    $name .= ''. $category->name;
			echo($name);
			echo "</option>";

			$haveChild= haveChild($category->id);
			if($haveChild>0){ 
	        	recursiveMenuSideBar($category->id);          
	        }
		}
	}
	?>
	 <section  class="sky-form">
		 <div class="product_right">
			 <h3 class="m_2">Categories</h3>
				<?php
				$categories = DB::table('categories')->where('parent_id','=', 0)->get();
				foreach ($categories as $category){
				?>	
				<select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
					<option>{{$category->name}}</option>
					<?php
						$haveChild= haveChild($category->id);
						if($haveChild>0){
				        	recursiveMenuSideBar($category->id);          
				        }
				    ?>
				</select>
				<?php
				}
				?>
												
					   
					  </div>
			 
					 <h4>components</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Frames(20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Foks, Suspensions (48)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Breaks and Pedals (45)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Tires,Tubes,Wheels (45)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Serevice Parts(12)</label>
						 </div>
					 </div>
					 <h4>Apparels</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Locks (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Speed Cassette (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bike Pedals (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Handels (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (50)</label>
						 </div>
					 </div>
				 </section>
				 <section  class="sky-form">
						<h4>Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Lezyne</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Marzocchi</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>EBC</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Oakley</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jagwire</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Yeti Cycles</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Vee Rubber</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Zumba</label>
								</div>
							</div>
				   </section>		      
				   <section  class="sky-form">
						<h4>Price</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>$50.00 and Under (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$100.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$200.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$300.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$400.00 and Under (30)</label>
								</div>
							</div>
				   </section>		  
@extends('admin.layouts.default')

@section('title','Categories')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
    <h1>List Categories</h1>
    <table class="table table-striped">
     <thead>      
       <th width="400px">Categories Name</th>
      
     </thead>
    <script>
      @if (count($errors) > 0)
          bootbox.alert({
                message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
                title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
              });
      @endif
      </script>

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
     $sql= DB::select("SELECT * FROM categories WHERE parent_id='$id_cha'");       
     foreach ($sql as $cat){         
      echo "<tr>";
       $arr= "<td>";
       for($i=0; $i<$cat->level;$i++){
        $arr .='&nbsp&nbsp&nbsp';
       }
       $arr .=' '.$cat->name.'</td>';
       echo $arr;
      
       $url_edit='categories/'.$cat->id.'/edit';
       echo "<td><a class='btn btn-primary' href='$url_edit'>EDIT</a></td>";
      
       $haveChild= haveChild($cat->id);
       $url='categories/delete/'.$cat->id;
       if($haveChild>0){    
        
         ?>
          <td><a class='btn btn-danger' href='' onclick="return confirm('You can not delete this item. Please delete subcategory first.')">DELETE</a></td>
        <?php
           
        recursiveMenu($cat->id);          
       } else {
        echo "<td><a class='btn btn-danger' href='$url' >DELETE</a></td>"; 
       }
      echo "</tr>";

      }
       
      }

      // show   
    echo "<tbody>";
    $sql= DB::select("SELECT * FROM categories WHERE parent_id='0'");
    foreach ($sql as $cat){       
        echo "<tr>";
        echo "<td>".$cat->name."</td>";
        $url_edit='categories/'.$cat->id.'/edit';
        echo "<td><a class='btn btn-primary' href='$url_edit'>EDIT</a></td>";
         
         
        $haveChild= haveChild($cat->id);
        $url='categories/delete/'.$cat->id; 
        if($haveChild>0){
        ?>
        <td><a class='btn btn-danger' href='' onclick="return confirm('You can not delete this item. Please delete subcategory first.')">DELETE</a></td>
        <?php
             
        recursiveMenu($cat->id);          
        } else {
        	echo "<td><a class='btn btn-danger' href='$url' >DELETE</a></td>"; 
        }
        echo "</tr>";
    }    
    echo "</tbody>";
    ?>
    </table>


</div>
@stop
@section('script')
@stop
@extends('vendor.vendor_layouts.main_layout')

@section('content')

@if (session('msg'))
<div class="alert alert-success alert-block" style="width:57%; margin-left:400px;  margin-top:70px;  margin-bottom:-30px;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ session('msg') }}</strong>
</div>
@endif

<div class="card" style="margin-left:360px; background-color:white; padding:30px; margin-right:125px;  margin-top:40px;">
<!-- <div class="card-header">
<h4>View Categories</h4>
</div> -->

<div class="card-body">
<div class="container-fluid">
    
    <a href="/vendor/add-category" style="margin-left:634px; "><button class="btn btn-info"  style="margin-bottom:20px;">Add New Category</button></a>
    <div class="row-fluid">
      <div class="span12">
<div class="widget-box">
         
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead style="background-color:black; color:white;">
                <tr>
                  <th><h6>Category ID</h6></th>
                  <th><h6>Category Name</h6></th>
                  <th><h6>Category URL</h6></th>
                  <th><h6>Edit</h6></th>
                  <th><h6>Delete</h6></th>
                </tr>
              </thead>
              <tbody style="background-color:DarkSlateGrey; color:white;">
                  @foreach($categories as $category)
                <tr >
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->url}}</td>
                  <td>
                  <a href="/vendor/edit-category/{{$category->id}}"><button class="btn btn-warning">Edit</button></a>
                  </td>
                  <td>
                  <form action="/vendor/delete-category/{{$category->id}}" method="POST">
                  @csrf

                  <button class="btn btn-danger" type="submit" 
                  onClick="return confirm('Do you really want to Delete it?')">Delete</button>
                  </form>
                  </td>
                </tr> 
                @endforeach

              </tbody>
              
            </table>
        
          </div>
        </div>
        <div style="margin-left:600px;">
          {{$categories->links()}}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

<script type="text/javascript">
function confirm_delete() {
  return confirm('Do you really want to Delete it?');
}
</script>
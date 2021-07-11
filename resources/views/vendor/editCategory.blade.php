@extends('vendor.vendor_layouts.main_layout')

@section('content')

<div class="card" style="margin-left:360px; background-color:#2B333E;color:white; padding:30px; margin-right:140px; margin-top:30px;">
<div class="card-header">
<h3>Edit Category</h3>
<hr>
</div>
<div class="card-body">
<div class="container-fluid">
<a href="/vendor/view-category" style="margin-left:720px; "><button class="btn btn-primary">Back</button></a>

<form action="/vendor/updated-category/{{$categories->id}}" method="POST">
@csrf
  <div class="form-group " >
    <label >Name</label>
    <input type="text" class="form-control" placeholder="Category Name" name="name" required value="{{$categories->name}}">
  </div>
  <div class="form-group " >
    <label >Levels</label>
    <select name="parent_id" class="form-control">
    <option value="0">Main Category</option>
    @foreach($levels as $category)
    <option value="{{ $category->id}}" @if($category->id == $categories->parent_id) selected @endif> {{$category->name}}</option>
    @endforeach
    </select>
  </div>

  <div class="form-group " >
    <label >URL</label>
    <input type="text" class="form-control" placeholder="Category URL" name="url" required value="{{$categories->url}}">
  </div>

  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3" name="descip" required value="{{$categories->descip}}"></textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary"> Edit </button>
  </div>
</form>
</div>
</div>
</div>


@endsection
@extends('vendor.vendor_layouts.main_layout')

@section('content')

<div class="conatiner">
<div class="row">
<div class="col-sm-12">
<div class="card" style="margin-left:360px; background-color:#2B333E; color:white; padding:30px; margin-right:125px; margin-top:50px;">
<div class="card-header">
<h3>Add Category</h3>

</div>
<hr>
<div class="card-body">
<div class="container-fluid">
<form action="{{URL('/categories')}}" method="POST">
@csrf
  <div class="control-group form-group " >
    <label >Name</label>
    <input type="text" class="form-control" placeholder="Category Name" name="name"  required>
  </div>

  <div class="form-group " >
    <label >Levels </label>
    <select name="parent_id" class="form-control">
    <option value="0">Main Category</option>
    @foreach($levels as $level)
    <option value="{{ $level->id}}">{{$level->name}}</option>
    @endforeach
    </select>
  </div>

  <div class="form-group " >
    <label >URL</label>
    <input type="text" class="form-control" placeholder="Category URL" name="url" required>
  </div>

  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3" name="descip" required></textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary"> Submit </button>
  </div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>


<!-- -->

@endsection

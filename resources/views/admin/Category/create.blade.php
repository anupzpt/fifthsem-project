@extends('admin.layouts.master')
@section('content')
<div class="container mt-3 p-5" >
    <h2>Add Data</h2>
    <form action="{{route('Category.store')}}" method="post">
        @csrf
        <div class="form-group  p-2">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Post"  name="name">
          </div>
          <div class="form-group  p-2">
            <label for="exampleInputPassword1">Isparent</label>
            <label class="switch">
                <input type="checkbox" name="isParent" value="1" checked>
                <span class="slider round"></span>
              </label>
          </div>

          <div class="form-group  p-2">
           <select name="" class="form-control" id="">
            <option value="">Select Category</option>
           </select>
          </div>
          <div class="form-group  p-2">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Post"  name="description">
          </div>
        <button class="btn btn-primary" style="margin-top: 15px" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

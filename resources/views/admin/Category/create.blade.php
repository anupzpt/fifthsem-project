@extends('admin.layouts.master')
@section('content')
<div class="col-md-12  ">
    <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
        <a class="btn btns btn-primary p-3 " href="{{ route('Category.index') }}" type="button">Back</a>
    </div>
    <div class="dark_shd full margin_bottom_30 border ">
       <div class="full graph_head center" style="background-color: #ff5722">
          <div class="heading1 margin_0 text-white">
             <h2 >Add Category</h2>
          </div>
       </div>
       <div class="table_section padding_infor_info">
        <form action="{{route('Category.store')}}" method="post">
            @csrf
            <div class="form-group  p-2">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Category"  name="name">
              </div>

              <div class="form-group  p-2">
                <label for="exampleInputPassword1">Isparent</label>
                <label class="switch ml-3">
                    <input type="checkbox" name="isParent" value="1" id="isParent" onclick="dropdown()" checked>
                    <span class="slider round"></span>
                  </label>
              </div>
              <div class="form-group  p-2" id="dropdown" style="display: none">
               <select name= "parent_id" class="form-control" id="">
                    <label for="">Select Category</label>
                <option value="" hidden>Select Parent Category</option>
                    @foreach ($response as $value)
                        <option value="{{$value->categoryId}}">{{$value->name}}</option>
                    @endforeach
               </select>
              </div>
              <div class="form-group  p-2">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
              </div>
              <div class=" d-flex justify-content-center">
                <button class="btn btn-primary custom-button "  type="submit">Save</button>
              </div>
            </div>
        </form>
       </div>
    </div>
 </div>
</div>
<script>
    function dropdown()
    {
      var switchbox = document.getElementById('isParent');
      var switchbutton = document.getElementById('dropdown');
      if (switchbox.checked == true)
      {
        switchbutton.style.display = 'none';
      }
      else{
        switchbutton.style.display = 'block';
      }
    }
</script>
@endsection

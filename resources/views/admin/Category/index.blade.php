@extends('admin.layouts.master')

@section('content')
<div>
    <a class="btn btn-primary" href="{{ route('Category.create') }}" type="button">Add Data</a>
</div>
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
       <div class="full graph_head">
          <div class="heading1 margin_0">
             <h2>Responsive Tables</h2>
          </div>
       </div>
       <div class="table_section padding_infor_info">
          <div class="table-responsive-sm">
             <table class="table">
                <thead>
                   <tr>
                      <th>Name</th>
                      <th>IsParent</th>
                      <th>Status</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($response as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->isParent}}</td>
                        <td>{{$item->status}}</td>
                        <td>edit</td>

                     </tr>
                    @endforeach

                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
</div>


@endsection

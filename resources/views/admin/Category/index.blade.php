@extends('admin.layouts.master')
@section('content')
{{-- ---Model--- --}}
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category with its product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" name="category_delete_id" id="category_id">
        <h5>Are you sure you want to delete category with all its product.?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="col-md-12  ">
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
            <a class="btn btns btn-primary p-3 " href="{{ route('Category.create') }}" type="button">Add Category</a>
        </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head  center" style="background-color: #ff5722">
                <div class="heading1 margin_0 text-white">
                    <h2>Category Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>

                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Parent Name</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($response as $item)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->parent_id == null)
                                            <h5><span class="badge  badge-pill bg-success text-white">Y</span></h5>
                                        @else
                                            <h5><span class="badge  badge-pill bg-danger text-white">N</span></h5>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->parent_id != null)
                                            <h5><span
                                                    class="badge  badge-pill badge-secondary text-white">{{ $item->parent->name }}</span>
                                            </h5>
                                        @else
                                            <h5><span class="badge  badge-pill badge-info text-white"></span></h5>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($item->status == 'A')
                                            <h5><span class="badge badge-pill  bg-success text-white">Active</span></h5>
                                        @else
                                            <h5><span class="badge  badge-pill bg-danger text-white">Inactive</span></h5>
                                        @endif
                                    </td> --}}
                                    <td>
                                        {{-- <a href="{{ route('Category.edit', [$item->categoryId]) }}" class="ml-5 mt-1"><i
                                                class="fa-solid fa-pen "></i></a> --}}
                                        <button class="btn btn-primary"> <a
                                                href="{{ route('Category.edit', [$item->categoryId]) }}"
                                                class="text-white"><span class="fas fa-pencil "></a></button>
                                        @if ($item->parent_id != null )
                                            <button class="btn btn-danger deleteCategoryBtn">
                                                <a href="{{ route('Category.destroy', [$item->categoryId]) }}"
                                                    class="text-white"><span class="fas fa-trash "></a></button>
                                        @else

                                        @endif

                                    </td>
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
@section('scripts')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
crossorigin="anonymous"></script>
<script>

    $(document).ready(function() {
            $(document).on('click', '.deleteCategoryBtn', function() {
            // e.preventDefault();
           var category_id = $(this).val();
           $('#category_id').val(category_id);
           $('#deleteModel').modal('show');

        });
    });
</script>
@endsection

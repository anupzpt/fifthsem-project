@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12  ">
        {{-- @if (session('status'))
    <h6 class="alert alert-success">{{session('status')}}</h6>
    @endif --}}
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
            {{-- <a class="btn btns btn-primary p-3 " href="{{ route('Product.create') }}" type="button">Add Prdouct</a> --}}
        </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color: #214162">
                <div class="heading1 margin_0 text-white">
                    <h2>Order Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>User Name</th>
                                <th>Quantity</th>
                                <th>Price
                                <th>
                                <th>Payment Status</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($art as $item)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->login->name }}</td>
                                    <td>{{ $item->quantity }} </td>
                                    <td>{{ $item->price }}</td>
                                    <td></td>
                                    <td>{{ $item->payment_status == '0' ? 'Pending' : 'Completed' }}</td>
                                    <td> <button class="btn btn-primary editbtn" value="{{ $item->id }}"><a
                                                href="" class="text-white"><span class="fas fa-pencil "></a></button>
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
    {{-- Model --}}

    <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="margin-top: 12rem ; margin-left:12rem">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Order Status</label>
                    <select class="custom-select  custom-select-lg mb-3" name="payment_status" id='payment_status'>
                        <option value="0">Pending</option>
                        <option id="complete" value="1">Completed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save" id="Save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- endModel --}}


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
{{-- <script src="toastr.js"></script> --}}
<script>
    function set($id) {
        debugger
        $.ajax({
            url: '{{ route('home.cart') }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $id

            },
            success: function(response) {
                console.log(response.message);
                if (response.code == 0) {
                    $(".cartCount").text("")
                    $(".cartCount").text(response.count);
                }
                if (response.code == 1) {}
                if (response.code == 101) {
                    window.location.href = "{{ route('login') }}";
                }
            },
            error: function(xhr) {
                alert(xhr.responseText);
            }
        });
    }
    $(document).ready(function() {
        $(".cart").click(function() {
            // debugger
        });
    });
</script>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script>
       $(document).ready(function() {
    $(document).on('click', '.editbtn', function() {
        var status_id = $(this).val();
        event.preventDefault();
        $('#editModel').modal('show');
        $(document).on('click', '.save', function() {
            var status = $("#payment_status").val();
            var order_id = status_id; // get the ID of the OrderList record
            $.ajax({
            url: '{{ route('home.cart') }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": order_id,
            },
            success: function(response) {
                console.log(response.message);
                if (response.code == 0) {
                    $(".cartCount").text("")
                    $(".cartCount").text(response.count);
                }
                if (response.code == 1) {}
                if (response.code == 101) {
                    window.location.href = "{{ route('login') }}";
                }
            },
            error: function(xhr) {
                alert(xhr.responseText);
            }
        });
           
        });
    });
});
    </script> --}}
@endsection

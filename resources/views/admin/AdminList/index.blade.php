@extends('admin.layouts.master')
@section('content')
<div class="col-md-12">
    <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end">
        @if (session('status'))
            <h3 class="alert alert-success">{{ session('status') }}</h3>
        @endif
    </div>
    <div class="margin_top_10 padding-bottom_2 d-flex justify-content-end ">
        <a class="btn btns btn-primary p-3" href="{{ route('AdminList.create') }}" type="button">Add Admin</a>
    </div>
    <div class="dark_shd full margin_bottom_30 border">
        <div class="full graph_head center" style="background-color: #214162">
            <div class="heading1 margin_0 text-white">
                <h2>Admin Table</h2>
            </div>
        </div>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Admin name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sn = 1;
                        @endphp
                        @foreach ($list as $item)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{$item->email}} </td>
                            <td>{{ $item->contact }}</td>
                            <td>{{ $item->address }}</td>

                            <td>
                                <img src="{{asset('/uploads'.'/'.$item->img_path)}}" width="70px" height="70px" alt="image">
                            </td>
                            <td></td>
                            @if(Auth::user()->id == $item->id)
                            <td>
                                <button class="btn btn-primary"><a href="{{ route('AdminList.edit', [$item->id]) }}" class="text-white"><span class="fas fa-pencil "></a></button>
                            </td>
                            @endif
                            {{-- <td>
                                <form action="{{ route('AdminList.destroy', [$item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" data-bs-target="#exampleModal"><span class="fas fa-trash "></a></button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection


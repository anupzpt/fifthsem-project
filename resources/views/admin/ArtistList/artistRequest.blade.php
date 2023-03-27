@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
            <a class="btn btns btn-primary p-3 " href="{{ route('artistList') }}" type="button">Back</a>
        </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color:#ff5722;">
                <div class="heading1 margin_0 text-white">
                    <h2>Artist Registration Requests</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Artist Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Address</th>
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
                                    <td>{{ $item->email }} </td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        @if ($item->user_type == 2)
                                            <button class="btn btn-danger"><a href="/deleteRequest/{{ $item->id }}"
                                                    class="text-white ml-1"><span>Delete</span></a></button>
                                        @else
                                            <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i><a
                                                    href="/artistRegister/{{ $item->id }}"
                                                    class="text-white ml-1"><span>Approve</span></a></button>
                                            <button class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i><a
                                                    href="/deleteRequest/{{ $item->id }}"
                                                    class="text-white ml-1"><span>Deny</span></a></button>
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
@endsection

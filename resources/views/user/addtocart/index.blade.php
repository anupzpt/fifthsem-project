@extends('user.layout.master')
@section('content')
<table class="table table-bordered">
    <thead>
      <tr>
        <th >SN</th>
        {{-- <th >Image</th> --}}
        <th >Product</th>
        <th >Quantity</th>
        <th >Price</th>
        <th> Total </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img width="60" src="" alt="">
        </td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Price</td>
      </tr>

    </tbody>
  </table>
@endsection

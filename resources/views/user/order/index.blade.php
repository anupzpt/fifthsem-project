@extends('user.layout.master')
@section('content')
    <style>
        .container-main {

            margin-left: 100px;
        }

        .sub-container {
            margin-top: 30px;
            margin-bottom: 90px;
            width: 1166px;
            height: 1000px;
            background-color: #FFFCFC;
            border: 2px solid #514F51;
            padding: 40px;
        }

        /* //////////////////////////////////////// */

        .head-bar {
            background-color: #514F51;
            border-radius: 15px;
            height: 50px;
            width: 1070px;
            text-align: center;
            color: white;
            padding: 10px;
        }

        .contains {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        /* //////////////////////////////////////// */

        .arthic-image {
            width: 200px;
            height: 150px;
        }

        .time {
            padding: 20px;
            margin-top: 30px;
        }

        /* //////////////////////////////////////// */

        .main-contain {
            margin-top: 30px;
        }

        /* //////////////////////////////////////// */
        #table-design {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }

        #table-design td,
        #table-design th {
            text-align: center;

            padding: 8px;
        }

        #table-design tr:nth-child(even) {
            background-color: #E5E5E5;
        }

        #table-design th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #373636;
            color: #FFFDFD;
        }

        /* //////////////////////////////////////////// */
        .footers {
            margin-top: 100px;
        }

        .total {

            margin-left: 80rem;

            padding: 10px 0;

            border-bottom-style: dotted;
            border-color: #b1aeae;
        }

        .order {
            margin: 10px 15px;
            padding: 10px 0;
            float: right;
        }

        .order-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* //////////////////////////////////////////// */
        /* .pagination {
                margin-top: 40px;
                float: right;
                display: inline-block;
            }

            .pagination a {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
            }

            .pagination a.active {
                background-color: #4CAF50;
                color: white;
                border-radius: 5px;
            }

            .pagination a:hover:not(.active) {
                background-color: #ddd;
                border-radius: 5px;
            } */

        /* /////////////////////////////// */
    </style>
    <div class="container-main">
        <div class="sub-container">
            <div class="head-bar">
                <h2>Your Order</h2>
            </div>
            <div class="contains ">
                <div class="arthic-image">
                    <img src="{{ asset('userpanel/images/logo-black.png') }}" alt="">
                </div>
                <div class="time">
                    <h2>Date:2023/2/25</h2>
                </div>
            </div>
            <div class="main-contain">
                <div>
                    <table id="table-design">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Detail</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>1</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>1</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>1</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>1</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>1</td>
                                <td>john@example.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footers">
                    <div>
                        <div class="total">
                            <h2>Total Price : 30000</h2>
                        </div>
                    </div>

                    <div class="order">
                        <button class="order-btn" type="submit">Done</button>
                    </div>
                </div>
                {{-- <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a class="active" href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

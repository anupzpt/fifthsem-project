<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arthic</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="/userpanel/css/user-profile.css">
</head>

<body>
    <div class="mycontainer">
        <div class="logoimg">
            <img src="{{ asset('userpanel/images/logo-white.png') }}" alt="img"
                style="height: 4rem; width: 7rem" />
        </div>
        <div class="myheader">
            <h3> My Profile</h3>
        </div>
    </div>
    {{-- <div class="btn">Back</div> --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 my-lg-0 my-md-1" id="navbar">
                <div id="sidebar" class="bg-black">
                    {{-- <div class="h4 text-white">My Profile</div> --}}
                    {{-- <hr /> --}}
                    <div id="navbar">
                        <ul>
                            <li class="btnn active mb-2" id="account">
                                <a href="#" class="text-decoration-none d-flex align-items-start">
                                    <div class="fas fa-box pt-2 me-3"></div>
                                    <div class="d-flex flex-column">
                                        <div class="link">My Account</div>
                                        <div class="link-desc">
                                            View & Manage Accounts Details
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="btnn mb-2" id="order">
                                <a href="#" class="text-decoration-none d-flex align-items-start">
                                    <div class="fas fa-box-open pt-2 me-3"></div>
                                    <div class="d-flex flex-column">
                                        <div class="link">My Orders</div>
                                        <div class="link-desc">View & Manage Orders</div>
                                    </div>
                                </a>
                            </li>

                            <li class="btnn" id="return">
                                <a href="#" class="text-decoration-none d-flex align-items-start">
                                    <div class="far fa-address-book pt-2 me-3"></div>
                                    <div class="d-flex flex-column">
                                        <div class="link">Artist registration</div>
                                        <div class="link-desc">
                                            View & Apply for artist
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Account Section -->
            <div class="col-lg-9 my-lg-0 my-1 account-section-wrap enable" id="account-wrap">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column user-info">
                        <h2>My Account</h2>
                        <div class="d-flex align-items-center">
                            @if (Auth::user()->user_type == '1')
                                <img src="{{ asset('/uploads' . '/' . auth()->user()->img_path) }}">
                            @else
                                <img src="{{ auth()->user()->img_path }}">
                            @endif
                        </div>
                        <div class="h5 mt-3">Hello {{ auth()->user()->name }},</div>
                        <div>Logged in as: {{ auth()->user()->email }}</div>
                    </div>
                    <hr />

                    <div class="row mt-4">
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Full Name</div>
                                <div class="detail-value">{{ auth()->user()->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Mobile:</div>
                                <div class="detail-value">
                                    @if (auth()->user()->contact)
                                        {{ auth()->user()->contact }}
                                    @else
                                        <span class="placeholder-text">Please enter your mobile</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Address:</div>
                                <div class="detail-value">
                                    @if (auth()->user()->address)
                                        {{ auth()->user()->address }}
                                    @else
                                        <span class="placeholder-text">Please enter your address</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">City:</div>
                                <div class="detail-value">
                                    @if (auth()->user()->city)
                                        {{ auth()->user()->city }}
                                    @else
                                        <span class="placeholder-text">Please enter your city</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Zip Code:</div>
                                <div class="detail-value">
                                    @if (auth()->user()->zip_code)
                                        {{ auth()->user()->zip_code }}
                                    @else
                                        <span class="placeholder-text">Please enter your zip code</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <a href="#" id="edit-profile-btn" class="my-button">EDIT PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account section end -->

            <!-- edit form section -->
            <!-- <form id="edit-profile-form" style="display:block;" > -->
            <div class="col-lg-9 my-lg-0 my-1 account-section-wrap enable d-none" id="edit-profile-form">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column user-info">
                        <h2>My Account</h2>
                        <div class="d-flex align-items-center">
                            <img src="{{ auth()->user()->img_path }}">
                        </div>
                        <div class="h5 mt-3">Hello {{ auth()->user()->name }},</div>
                        <div>Logged in as: {{ auth()->user()->email }}</div>
                    </div>
                    <hr />
                    <form action="{{ route('update-user-data') }}" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Full Name</div>
                                    <div class="detail-value">
                                        <input type="text" name="name" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Email:</div>
                                    <div class="detail-value">
                                        <input type="text" name="email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Mobile:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->contact)
                                            <input type="text" name="contact"
                                                value="{{ auth()->user()->contact }}">
                                        @else
                                            <input type="text" name="contact" placeholder="Enter your number">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Address:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->address)
                                            <input type="text" name="address"
                                                value="{{ auth()->user()->address }}">
                                        @else
                                            <input type="text" name="address"
                                                placeholder="Eg: Tokha-06,Jalpachowk,Baniyatar">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">City:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->city)
                                            <input type="text" name="city" value="{{ auth()->user()->city }}">
                                        @else
                                            <input type="text" name="city" placeholder="Enter your city">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Zip Code:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->zip_code)
                                            <input type="text" name="zip_code"
                                                value="{{ auth()->user()->zip_code }}">
                                        @else
                                            <input type="text" name="zip_code" placeholder="Enter zip code ">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button class="my-button" style="background-color:green">UPDATE PROFILE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- edit form section end -->

            <!-- order section -->
            <div class="col-lg-9 my-lg-0 my-1 order-section-wrap" id="order-wrap">
                <div id="main-content" class="bg-white border" style="overflow:scroll;height:80vh">
                    <div class="d-flex flex-column">
                        <h2>My Order</h2>
                        <div class="h5 mt-3">Hello {{ auth()->user()->name }},</div>
                        <div>Logged in as: {{ auth()->user()->email }}</div>
                        <hr />

                        @if (count($art) > 0)
                            @foreach ($art as $userDetail)
                                <div class="order-content-detail product-description">
                                    <div class="sn">
                                        {{ $userDetail->OrderCode }}
                                    </div>
                                    <div class="description">
                                        {{ $userDetail->OrderRemarks }}
                                    </div>
                                    <div class="total-cost">
                                        Rs.{{ $userDetail->total }}
                                    </div>
                                </div>
                                <div class="container sub-menu-tab">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="tab">
                                                <button class="tablinks"
                                                    onclick="openCity(event, 'ProductDetail{{ $userDetail->OrderCode }}')">User
                                                    Detail</button>
                                                <button class="tablinks"
                                                    onclick="openCity(event, 'Status{{ $userDetail->OrderCode }}')">Status</button>
                                                <button class="tablinks"
                                                    onclick="openCity(event, 'Invoice{{ $userDetail->OrderCode }}')">Invoice</button>
                                            </div>

                                            <div id="ProductDetail{{ $userDetail->OrderCode }}"
                                                class="tabcontent ProductDetail">
                                                <table class="table  table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th colspan=2>
                                                                <h4>User Information Details</h4>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><Strong>Customer Name :</Strong></td>
                                                            <td> {{ $userDetail->name }}</td>

                                                        </tr>
                                                        <tr>
                                                            <td><Strong>Email :</Strong></td>
                                                            <td> {{ $userDetail->email }}</td>

                                                        </tr>
                                                        <tr>
                                                            <td><Strong>Contact Number :</Strong></td>
                                                            <td> {{ $userDetail->contact }}</td>

                                                        </tr>
                                                        <tr>
                                                            <td><strong>Delivery Address :</strong></td>
                                                            <td> {{ $userDetail->address }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div id="Status{{ $userDetail->OrderCode }}" class="tabcontent"
                                                style="padding:20px">
                                                <strong>Status</strong>
                                                <div class="line"></div>
                                                @if ($userDetail->payment_status == 'Verification Pending')
                                                    <span class="verify">
                                                        {{ $userDetail->payment_status }}
                                                    </span>
                                                @elseif ($userDetail->payment_status == 'Approve Pending')
                                                    <span class="verify">
                                                        {{ $userDetail->payment_status }}
                                                    </span>
                                                    <hr>
                                                    <h6>Remarks:</h6>
                                                    <p>
                                                        {{ $userDetail->VerifiedRemarks }}
                                                    </p>
                                                @elseif ($userDetail->payment_status == 'Approved')
                                                    <span class="approve">
                                                        {{ $userDetail->payment_status }}
                                                    </span>
                                                    <hr>
                                                    <h6>Remarks:</h6>
                                                    <p>
                                                        {{ $userDetail->ApproveRemarks }}
                                                    </p>
                                                @else
                                                    <span class="rejected">
                                                        {{ $userDetail->payment_status }}
                                                    </span>
                                                    <hr>
                                                    <h6>Remarks:</h6>
                                                    <p>
                                                        {{ $userDetail->RejectedRemarks }}
                                                    </p>
                                                @endif
                                            </div>

                                            <div id="Invoice{{ $userDetail->OrderCode }}" class="tabcontent">
                                                <div style="float:right">
                                                    <button onclick="printDiv('Invoice{{ $userDetail->OrderCode }}')"
                                                        style="border:none;background-color: green; color: white;width:100px;height:30px"><i
                                                            class="fa-solid fa-print "
                                                            style="margin-right: 10px"></i>Print</button>
                                                </div>
                                                <h3>Invoice</h3>

                                                @if ($userDetail->payment_status == 'Approved')
                                                    <div
                                                        style="border: 2px solid #ccc; border-radius: 5px; padding: 20px; width: 400px; font-family: Arial, sans-serif; margin-left:30%">
                                                        <h1
                                                            style="font-size: 24px; margin: 0; padding-bottom: 10px; border-bottom: 2px solid #ccc;">
                                                            Invoice </h1>
                                                        <p style="font-size: 16px; margin: 0; padding-top: 10px;">
                                                            Billed
                                                            To: {{ $userDetail->name }}</p>
                                                        <p style="font-size: 16px; margin: 0;">Address:
                                                            {{ $userDetail->address }}
                                                        </p>
                                                        <table
                                                            style="font-size: 16px; margin-top: 20px; border-collapse: collapse; width: 100%;">
                                                            <tr>
                                                                <th style="text-align: left; padding-bottom: 10px;">
                                                                    Item
                                                                    Description</th>
                                                                <th style="text-align: right; padding-bottom: 10px;">
                                                                    Price
                                                                </th>
                                                            </tr>
                                                            @foreach ($orders as $item)
                                                                @if ($item->OrderCode == $userDetail->OrderCode)
                                                                    <tr>
                                                                        <td style="padding-top: 10px;">
                                                                            {{ $item->name }}
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right; padding-top: 10px;">
                                                                            Rs.{{ $item->price }}

                                                                            {{-- @php
                                                                                $total = 0;
                                                                                $total =  $item->price * $item->price;
                                                                            @endphp --}}
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                            <tr>
                                                                <th style="text-align: right; padding-top: 10px;">
                                                                    Total:
                                                                </th>
                                                                <td style="text-align: right; padding-top: 10px;">
                                                                    Rs.{{ $userDetail->total }}
                                                                    Rs.{{ $total }}

                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p>Invoice will be generate when order get approved.</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>No Product Data !!</div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- order section end -->

            <!-- Artistregistration section -->
            <div class="col-lg-9 my-lg-0 my-1 return-section-wrap" id="return-wrap">
                <div id="main-content" class="bg-white border">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <div class="d-flex flex-column">
                        <h2>Artist registration</h2>
                        <div class="h5 mt-3">Hello {{ auth()->user()->name }},</div>
                        <div>Logged in as: {{ auth()->user()->email }}</div>
                        <hr />
                        <form action="{{ route('login-artist') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="fw-normal text-muted mb-2">
                                Already have an account ? <a href="{{ route('login1') }}"
                                    class="text-primary fw-bold text-decoration-none">login here</a>
                            </div>
                            <div class="text-center text-muted text-uppercase mb-3">or</div>

                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="floatingInput" name="name" placeholder="Full Name">
                                <label for="floatingInput">Full Name</label>
                                <span style="color :red;">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                <span style="color :red;">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                    id="floatingInput" name="contact" placeholder="Contact Number">
                                <label for="floatingInput">Contact Number</label>
                                <span style="color :red;">
                                    @error('contact')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="floatingInput" name="address" placeholder="Address">
                                <label for="floatingInput">Address</label>
                                <span style="color :red;">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="artistImage"
                                    placeholder="upload picture">
                                <label for="floatingPassword">upload picture</label>
                            </div>
                            <!-- <div class="input-group mb-3">
                                <label class="input-group-text selected" for="inputGroupSelect01">Are you a ?</label>
                                <select class="form-select selected" name="user_type" id="inputGroupSelect01">
                                    <option selected value="User">User</option>
                                    <option value="Artist">Artist</option>
                                </select>
                            </div> -->

                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input check" type="checkbox" id="gridCheck">
                                <label class="form-check-label ms-2" for="gridCheck">
                                    I Agree <a href="#">Terms and conditions</a>.
                                </label>
                            </div>


                            <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Continue</button>
                        </form>
                    </div>

                </div>
            </div>
            <!-- Artistregistration section end -->
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if (session()->get('popupBoxValue') === '1')
    <script>
        var account = document.getElementById("account-wrap");
        var order = document.getElementById("order-wrap");
        var cancel = document.getElementById("return-wrap");
        var orderActive = document.getElementById("order");
        var accountActive = document.getElementById("account");
        var cancelActive = document.getElementById("return");
        orderActive.classList.remove("active");
        cancelActive.classList.remove("active");
        accountActive.classList.add("active");
        order.classList.remove("enable");
        cancel.classList.remove("enable");
        account.classList.add("enable");
    </script>
@endif
@if (session()->get('popupBoxValue') === '2')
    <script>
        var account = document.getElementById("account-wrap");
        var order = document.getElementById("order-wrap");
        var cancel = document.getElementById("return-wrap");
        var orderActive = document.getElementById("order");
        var accountActive = document.getElementById("account");
        var cancelActive = document.getElementById("return");

        accountActive.classList.remove("active");
        cancelActive.classList.remove("active");
        orderActive.classList.add("active");
        account.classList.remove("enable");
        cancel.classList.remove("enable");
        order.classList.add("enable");
    </script>
@endif
@if (session()->get('popupBoxValue') === '3')
    <script>
        var account = document.getElementById("account-wrap");
        var order = document.getElementById("order-wrap");
        var cancel = document.getElementById("return-wrap");
        var orderActive = document.getElementById("order");
        var accountActive = document.getElementById("account");
        var cancelActive = document.getElementById("return");
        orderActive.classList.remove("active");
        accountActive.classList.remove("active");
        cancelActive.classList.add("active");
        account.classList.remove("enable");
        order.classList.remove("enable");
        cancel.classList.add("enable");
    </script>
@endif
<script>
    var btnContainer = document.getElementById("navbar");
    var btns = btnContainer.getElementsByClassName("btnn");

    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(
                "active",
                "selected"
            );
            this.className += " active";
        });
    }

    // another part
    var account = document.getElementById("account-wrap");
    var order = document.getElementById("order-wrap");
    var cancel = document.getElementById("return-wrap");
    var navbar = document.getElementById("navbar");

    navbar.addEventListener("click", function(event) {
        if (event.target.closest("#account")) {
            editForm.classList.remove("d-block");
            editForm.classList.add("d-none");
            order.classList.remove("enable");
            cancel.classList.remove("enable");
            account.classList.add("enable");
        } else if (event.target.closest("#order")) {
            editForm.classList.remove("d-block");
            editForm.classList.add("d-none");
            account.classList.remove("enable");
            cancel.classList.remove("enable");
            order.classList.add("enable");
        } else if (event.target.closest("#return")) {
            editForm.classList.remove("d-block");
            editForm.classList.add("d-none");
            account.classList.remove("enable");
            order.classList.remove("enable");
            cancel.classList.add("enable");
        }
    });

    // edit profile part
    const editBtn = document.getElementById('edit-profile-btn');
    const editForm = document.getElementById('edit-profile-form');
    // var account = document.getElementById("account-wrap");

    editBtn.addEventListener("click", () => {
        account.classList.remove("enable");
        editForm.classList.remove("d-none");
        editForm.classList.add("d-block");

    });
</script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script>
    $('.order-content-detail').click(function() {
        var submenu = $(this).next('.sub-menu-tab');
        if (submenu.is(':visible')) {
            submenu.hide();
            $('.ProductDetail').show();
        } else {
            $('.sub-menu-tab').hide();
            submenu.show();
        }
    });
</script>
<script>
    function printDiv(divid) {
        const divToPrint = document.getElementById(divid);
        // Create a new window and write the contents of the div to it
        const newWindow = window.open('', 'Print Window');
        newWindow.document.write(divToPrint.outerHTML);
        newWindow.document.close();
        // Print the contents of the new window
        newWindow.focus();
        newWindow.print();
        newWindow.close();
    }
</script>

</html>

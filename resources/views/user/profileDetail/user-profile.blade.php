<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="/userpanel/css/user-profile.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 my-lg-0 my-md-1" id="navbar">
                <div id="sidebar" class="bg-black">
                    <div class="h4 text-white">My Profile</div>
                    <hr />
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
                                        <div class="link">Returns & Cancellation</div>
                                        <div class="link-desc">
                                            View & Manag your returns & Cancellation
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
                            <img src="{{ auth()->user()->img_path }}">
                        </div>
                        <div class="h5 mt-3">Hello {{auth()->user()->name}},</div>
                        <div>Logged in as: {{auth()->user()->email}}</div>
                    </div>
                    <hr />

                    <div class="row mt-4">
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Full Name</div>
                                <div class="detail-value">{{auth()->user()->name}}</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value">{{auth()->user()->email}}</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Mobile:</div>
                                <div class="detail-value">
                                    @if (auth()->user()->contact)
                                    {{ auth()->user()->contact}}
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
                                    {{ auth()->user()->address}}
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
                                    {{auth()->user()->city}}
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
                                    {{auth()->user()->zip_code}}
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
                        <div class="h5 mt-3">Hello {{auth()->user()->name}},</div>
                        <div>Logged in as: {{auth()->user()->email}}</div>
                    </div>
                    <hr />
                    <form action="{{route('update-user-data')}}" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Full Name</div>
                                    <div class="detail-value">
                                        <input type="text" name="name" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Email:</div>
                                    <div class="detail-value">
                                        <input type="text" name="email" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">Mobile:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->contact)
                                        <input type="text" name="contact" value="{{ auth()->user()->contact}}">
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
                                        <input type="text" name="address" value="{{ auth()->user()->address}}">
                                        @else
                                        <input type="text" name="address" placeholder="Eg: Tokha-06,Jalpachowk,Baniyatar">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-5">
                                <div class="account-detail">
                                    <div class="detail-label">City:</div>
                                    <div class="detail-value">
                                        @if (auth()->user()->city)
                                        <input type="text" name="city" value="{{auth()->user()->city}}">
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
                                        <input type="text" name="zip_code" value="{{auth()->user()->zip_code}}">
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
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <h2>My Order</h2>
                        <div class="h5 mt-3">Hello {{auth()->user()->name}},</div>
                        <div>Logged in as: {{auth()->user()->email}}</div>
                        <hr />
                    </div>
                </div>
            </div>
            <!-- order section end -->

            <!-- return section -->
            <div class="col-lg-9 my-lg-0 my-1 return-section-wrap" id="return-wrap">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <h2>My Return & Cancellation</h2>
                        <div class="h5 mt-3">Hello {{auth()->user()->name}},</div>
                        <div>Logged in as: {{auth()->user()->email}}</div>
                        <hr />
                    </div>
                </div>
            </div>
            <!-- return section end -->
        </div>
    </div>
</body>
@if(session()->get('popupBoxValue') === "1")
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
@if(session()->get('popupBoxValue') === "2")
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
@if(session()->get('popupBoxValue') === "3")
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

</html>
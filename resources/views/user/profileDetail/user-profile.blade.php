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
                    <div class="d-flex flex-column">
                        <h2>My Account</h2>
                        <div class="h5 mt-3">Hello Krishna,</div>
                        <div>Logged in as: krishna@gmail.com</div>
                        <hr />
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Full Name</div>
                                <div class="detail-value">Krishna Pathak</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value">krishna@gmail.com</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Mobile:</div>
                                <div class="detail-value">9818821027</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Address:</div>
                                <div class="detail-value">
                                    Jalpa Chowk, Baniyatar, Kathmandu
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">City:</div>
                                <div class="detail-value">Kathmandu</div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="account-detail">
                                <div class="detail-label">Zip Code:</div>
                                <div class="detail-value">12345</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <a href="#" class="my-button">EDIT PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account section end -->

            <!-- order section -->
            <div class="col-lg-9 my-lg-0 my-1 order-section-wrap" id="order-wrap">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <h2>My Order</h2>
                        <div class="h5 mt-3">Hello Krishna,</div>
                        <div>Logged in as: krishna@gmail.com</div>
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
                        <div class="h5 mt-3">Hello Krishna,</div>
                        <div>Logged in as: krishna@gmail.com</div>
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
            order.classList.remove("enable");
            cancel.classList.remove("enable");
            account.classList.add("enable");
        } else if (event.target.closest("#order")) {
            account.classList.remove("enable");
            cancel.classList.remove("enable");
            order.classList.add("enable");
        } else if (event.target.closest("#return")) {
            account.classList.remove("enable");
            order.classList.remove("enable");
            cancel.classList.add("enable");
        }
    });
</script>

</html>
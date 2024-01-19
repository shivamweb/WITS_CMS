<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KitaabWaala admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, KitaabWaala admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>KitaabWaala</title>

    <!-- Google font-->
    <link href="../../../../fonts.googleapis.com/css23b4.css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="../../../../fonts.googleapis.com/css7d83.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/flag-icon.css">
    <!-- Datatables css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/datatables.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/prism.css">
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/jsgrid.css">
    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/jsgrid.css">
    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vector-map.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="dashboard"><img class="blur-up lazyloaded" src="../assets/images/logo/logo.png" style="width:60px;" alt=""></a></div>
            </div>
            <div class="main-header-right ">
                <div class="mobile-sidebar">
                    <div class="media-body text-end switch-sm">
                        <label class="switch">
                            <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
                        </label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">
                        <li>
                            <form class="form-inline search-form">
                                <div class="form-group">
                                    <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                            </form>
                        </li>

                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown"><a href="/school/showNotification"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">0</span><span class="dot"></span></li>
                        <li><a href="javascript:void(0)"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center" id="iconDiv"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="../assets/images/banner/1.jpg" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="/school/profile">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
                                <li><a href="/school/showNotification">Notification<span class="pull-right"><i data-feather="mail"></i></span></a></li>
                                <li><a href="/school/inquiryaddview">Inquiry<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
                                <!-- <li><a href="javascript:void(0)">Settings<span class="pull-right"><i data-feather="settings"></i></span></a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            <div class="page-sidebar">
                <div class="sidebar custom-scrollbar">
                    <div class="sidebar-user text-center" id="iconDiv">
                        <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/banner/1.jpg" alt="#">
                        </div>
                        <h6 class="mt-3 f-14" id="companyName">JOHN</h6>
                        <p id="vendorName">Ux Designer</p>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>BookList</span><i class="fa fa-angle-right pull-right"></i></a>

                            <ul class="sidebar-submenu">
                                <li><a href="purchasedBooksList"><i class="fa fa-circle"></i>My Purchase List</a></li>
                                <li><a href="approved-bookList"><i class="fa fa-circle"></i>Approved Book List</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Inventory</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="place-neworder"><i class="fa fa-circle"></i>Place New Book Order</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Inbox</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="showNotification"><i class="fa fa-circle"></i>Notification</a></li>
                                <li><a href="inquiryaddview"><i class="fa fa-circle"></i>Add Inquiry</a></li>
                                <li><a href="inquiry"><i class="fa fa-circle"></i>List Inquiry</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="clipboard"></i><span>Reports</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">

                                <li><a href="page-create.html"><i class="fa fa-circle"></i>Purchase Reports</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Order History</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="order"><i class="fa fa-circle"></i>Orders</a></li>
                                <li><a href="transactions"><i class="fa fa-circle"></i>Transactions</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="profile"><i class="fa fa-circle"></i>Profile</a></li>
                            </ul>
                        </li>

                        </li>
                        <li><a class="sidebar-header" href="school-logout"><i data-feather="log-in"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            <!-- Right sidebar Start-->
            <div class="right-sidebar custom-scrollbar" id="right_side_bar">
                <div>
                    <div class="container p-0">
                        <div class="modal-header p-l-20 p-r-20">
                            <div class="col-sm-8 p-0">
                                <h6 class="modal-title font-weight-bold">Cart List</h6>
                            </div>
                            <button id="checkoutButton" class="btn btn-primary" type="submit">Checkout</button>
                        </div>
                    </div>
                    <div class="p-l-30 p-r-30">
                        <div class="chat-box">
                            <div class="people-list">
                                <ul class="list" id="cartProductsContainer">
                                    <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user.png" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Vincent Porter</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right sidebar Ends-->

            <div class="page-body">

                @yield('content')

            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2019 © KitaabWaala All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>

    </div>

    <!-- latest jquery-->
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>

    <!-- feather icon js-->
    <script src="../../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../../assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="../../assets/js/sidebar-menu.js"></script>
    <!-- Datatable js-->
    <script src="../../assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/datatables/custom-basic.js"></script>
    <!-- Jsgrid js-->
    <script src="../../assets/js/jsgrid/jsgrid.min.js"></script>
    <script src="../../assets/js/jsgrid/griddata-transactions.js"></script>
    <script src="../../assets/js/jsgrid/jsgrid-transactions.js"></script>
    <!-- Jsgrid js-->

    <script src="../../assets/js/jsgrid/griddata-productlist-digital.js"></script>
    <script src="../../assets/js/jsgrid/jsgrid-list.js"></script>
    <!--Customizer admin-->
    <script src="../../assets/js/admin-customizer.js"></script>

    <!-- lazyload js-->
    <script src="../../assets/js/jsgrid/jsgrid.min.js"></script>
    <script src="../../assets/js/jsgrid/griddata-sub-product.js"></script>
    <script src="../../assets/js/jsgrid/jsgrid-digital-sub.js"></script>
    <script src="../../assets/js/lazysizes.min.js"></script>

    <!--right sidebar js-->
    <script src="../../assets/js/chat-menu.js"></script>

    <script src="../../assets/js/admin-script.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        // Function to fetch cart products and update HTML
        function fetchCartProducts() {
            $.ajax({
                url: '/school/get-cart-products',
                type: 'GET',
                success: function(response) {
                    var cartProductsContainer = $('#cartProductsContainer');
                    cartProductsContainer.empty(); // Clear existing content

                    // Loop through the cart products and append to the container
                    $.each(response.cartProducts, function(index, cartProduct) {
                        var listItem = '<li class="clearfix"><img class="rounded-circle user-image" src="' + '../' + cartProduct.book.image + '" alt="">' +
                            '<div class="about">' +
                            '<div class="status">Quantity:' + cartProduct.quantity + '</div>' +
                            '<div class="status">Price Per Unit: &#8377;' + cartProduct.price + '</div>' +
                            '<div class="status">Total Price: &#8377;' + cartProduct.total_price + '</div>' +
                            '</div>' +
                            '<div class="status-circle online"></div>' +
                            '<div class="name"><span>' + cartProduct.book.book_name + '</span></div>' +
                            '</li>';

                        cartProductsContainer.append(listItem);
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
        

        fetchCartProducts();
        setInterval(fetchCartProducts, 3000);

        function checkout() {

            $.ajax({
                url: '/school/checkout',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Placed',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        $('#checkoutButton').click(function() {
            checkout();
        });
    });
</script>
<script>
    function fetchAndRenderSchoolDetails() {
        $.ajax({
            url: '../../school/fetchSchoolDetails',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                updateSetting('icon', 'iconDiv', response);
            },
        });
    }

    function updateSetting(mediaName, divId, response) {
        if (response.SchoolDetails) {
            var SchoolDetails = response.SchoolDetails;

            // Assuming 'media_url' is the correct key in your vendor details
            var mediaUrl = SchoolDetails.image;

            if (mediaUrl && divId === 'iconDiv') {
                $('#' + divId + ' img').attr('src', '../../' + mediaUrl);
            }
            // Update the vendor name
            var schoolName = SchoolDetails.school_name;
            var facultyName = SchoolDetails.faculity_name;
            if (vendorName && companyName) {
                $('#vendorName').text(facultyName);
                $('#companyName').text(schoolName);
            }
        }
    }

    $(document).ready(function() {
        fetchAndRenderSchoolDetails();
    });
    $(document).ready(function() {
  $.ajax({
    url: '/school/getNotifications',
    type: 'GET',
    dataType: 'json',
    success: function(response, textStatus, xhr) {
      if (xhr.status == 200) {
        notifications = JSON.parse(response['notifications']);
        unreadCount = response['unreadCount'];
        numberSpan = $('.badge.badge-pill.badge-primary.pull-right.notification-badge');
        
        // Update the content of the numberSpan with the unreadCount value
        numberSpan.text(unreadCount);
        
        if (unreadCount === 0) {
          numberSpan.hide();
        } else {
          numberSpan.show();
        }
      }
    },
    error: function(xhr, status, error) {
      console.error('Error:', error);
    }
  });
});

  

</script>

</html>
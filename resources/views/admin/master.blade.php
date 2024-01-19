<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KitaabWaala admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, KitaabWaala admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>KitaabWaala </title>

    <!-- Google font-->
    <link href="../../../../fonts.googleapis.com/css23b4.css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="../../../../fonts.googleapis.com/css7d83.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/prism.css">

    <link rel="stylesheet" type="text/css" href="../../../../../assets/css/jsgrid.css">
    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/chartist.css">
    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/datatables.css">
    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/vector-map.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/admin.css">
</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="dashboard"><img class="blur-up lazyloaded" src="../../../assets/images/logo/logo.png" style="width:60px;" alt=""></a></div>
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
                        <li class="onhover-dropdown"><a href="/admin/list-inquiry"><i data-feather="file-text"></i><span class="badge badge-pill badge-primary pull-right notification-badge">0</span><span class="dot"></span></li>
                        </li>
                        <li><a href="javascript:void(0)"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center" id="iconDiv"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="/admin/profile">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
                                <li><a href="/admin/notification">Notification<span class="pull-right"><i data-feather="mail"></i></span></a></li>
                                <li><a href="/admin/list-inquiry">Inquiry<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
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

                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>School</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="../../admin/Schoolview"><i class="fa fa-circle"></i>Add New School</a></li>
                                <li><a href="../../admin/list-school"><i class="fa fa-circle"></i>All School List</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="../../admin/Schoolview"><i class="fa fa-circle"></i>Add Product</a></li>
                                <li><a href="../../admin/list-school"><i class="fa fa-circle"></i>List Products</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Order History</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="../../admin/order"><i class="fa fa-circle"></i>Received Orders</a></li>
                            </ul>
                        </li>
                        <!-- <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Inventory</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="../../admin/view-book"><i class="fa fa-circle"></i>Add New Book</a></li>
                                <li><a href="../../admin/list-book"><i class="fa fa-circle"></i>List All Book</a></li>
                                <li><a href="../../admin/manage-stock"><i class="fa fa-circle"></i>Manage Stocks</a></li>
                            </ul>
                        </li> -->
                        <li><a class="sidebar-header" href="/admin/class"><i data-feather="bar-chart"></i><span>Size</span></a></li>
                        <li><a class="sidebar-header" href="/admin/viewexpense"><i data-feather="bar-chart"></i><span>Supllier</span></a></li>

                        <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Reports</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="fetchDataByDate"><i class="fa fa-circle"></i>Stock Reports</a></li>
                                <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Sales Reports</a></li>
                                <li><a href="taxes.html"><i class="fa fa-circle"></i>Expense Reports</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="../../admin/profile"><i class="fa fa-circle"></i>Profile</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="/admin/admin-logout"><i data-feather="log-in"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            <!-- Right sidebar Start-->
            <!-- <div class="right-sidebar custom-scrollbar" id="right_side_bar">
                <div>
                    <div class="container p-0">
                        <div class="modal-header p-l-20 p-r-20">
                            <div class="col-sm-8 p-0">
                                <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                            </div>
                            <div class="col-sm-4 text-end p-0"><i class="me-2" data-feather="settings"></i></div>
                        </div>
                    </div>
                    <div class="friend-list-search mt-0">
                        <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                    </div>
                    <div class="p-l-30 p-r-30">
                        <div class="chat-box">
                            <div class="people-list friend-list">
                                <ul class="list">
                                    <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user.png" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Vincent Porter</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user1.jpg" alt="">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">Ain Chavez</div>
                                            <div class="status"> 28 minutes ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user2.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Kori Thomas</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user3.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Erica Hughes</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                           
                                   
                               
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Right sidebar Ends-->
            <!-- Placeholder for admin image -->
            <div class="page-body">

                @yield('content')

            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2019 © WingersItServices All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="../../../../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../../../../assets/js/popper.min.js"></script>
    <script src="../../../../assets/js/bootstrap.js"></script>

    <!-- feather icon js-->
    <script src="../../../../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../../../../assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="../../../../assets/js/sidebar-menu.js"></script>
    <!-- Datatables js-->
    <script src="../../../../assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../assets/js/datatables/custom-basic.js"></script>
    <!--chartist js-->
    <script src="../../../../assets/js/chart/chartist/chartist.js"></script>


    <!-- lazyload js-->
    <script src="../../../../assets/js/lazysizes.min.js"></script>

    <!--copycode js-->
    <script src="../../../../assets/js/prism/prism.min.js"></script>
    <script src="../../../../assets/js/clipboard/clipboard.min.js"></script>
    <script src="../../../../assets/js/custom-card/custom-card.js"></script>

    <!--counter js-->
    <script src="../../../../assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="../../../../assets/js/counter/jquery.counterup.min.js"></script>
    <script src="../../../../assets/js/counter/counter-custom.js"></script>

    <!--Customizer admin-->
    <script src="../../../../assets/js/admin-customizer.js"></script>

    <!--map js-->
    <script src="../../../../assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../../../../assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>

    <!--apex chart js-->
    <script src="../../../../assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../../assets/js/chart/apex-chart/stock-prices.js"></script>

    <!--chartjs js-->
    <!-- <script src="../../../../assets/js/chart/flot-chart/excanvas.js"></script>
    <script src="../../../../assets/js/chart/flot-chart/jquery.flot.js"></script>
    <script src="../../../../assets/js/chart/flot-chart/jquery.flot.time.js"></script>
    <script src="../../../../assets/js/chart/flot-chart/jquery.flot.categories.js"></script>
    <script src="../../../../assets/js/chart/flot-chart/jquery.flot.stack.js"></script>
    <script src="../../../../assets/js/chart/flot-chart/jquery.flot.pie.js"></script> -->
    <!--dashboard custom js-->
    <script src="../../../../assets/js/dashboard/default.js"></script>

    <!--right sidebar js-->
    <script src="../../../../assets/js/chat-menu.js"></script>

    <!--height equal js-->
    <script src="../../../../../assets/js/equal-height.js"></script>
    <script src="../../../../../assets/js/jsgrid/jsgrid.min.js"></script>
    <script src="../../../../assets/js/jsgrid/griddata-invoice.js"></script>
    <script src="../../../../assets/js/jsgrid/jsgrid-invoice.js"></script>
    <!-- lazyload js-->
    <script src="../../../../assets/js/lazysizes.min.js"></script>

    <!--script admin-->
    <script src="../../../../assets/js/admin-script.js"></script>
    <script>
        $(document).ready(function() {
            fetchAdminPhotos();
        });

        function fetchAdminPhotos() {
            $.ajax({
                url: '../../admin/fetchAdminPhotos',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    updateSetting('icon', 'iconDiv', response);
                },
            });
        }

        function updateSetting(mediaName, divId, response) {
            if (response.AdminPhotos) {
                var fetchAdminPhotos = response.AdminPhotos;
                var mediaUrl = fetchAdminPhotos.image;
                if (mediaUrl && divId === 'iconDiv') {
                    $('#' + divId + ' img').attr('src', '../../' + mediaUrl);
                }
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/admin/getinquiry',
                type: 'GET',
                dataType: 'json',
                success: function(response, textStatus, xhr) {
                    if (xhr.status == 200) {
                        // Parse the JSON response
                        inquiry = JSON.parse(response['inquiry']);
                        unreadCount = response['unreadCount'];
                        numberSpan = $('.badge.badge-pill.badge-primary.pull-right.notification-badge');

                        // Update the content of the numberSpan with the unreadCount value
                        numberSpan.text(unreadCount);

                        // Show or hide the badge based on the unreadCount value
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

</body>

</html>
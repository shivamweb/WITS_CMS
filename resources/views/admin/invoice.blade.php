<!DOCTYPE html>
<html lang="en">

<head>
    <title>KitaabWaala</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="big-deal">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">
    <link rel="icon" href="../../../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../assets/images/favicon/favicon.png" type="image/x-icon">

    <!--Google font-->
    <link href="../../../fonts.googleapis.com/css0679.css?family=PT+Sans:400,700&amp;display=swap" rel="stylesheet">
    <link href="../../../fonts.googleapis.com/csse7ca.css?family=Raleway&amp;display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/themify.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/slick-theme.css">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/color2.css">

</head>

<body class="light-layout">

    <!-- invoice start -->
    <section class="invoice-four">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="invoice-popup">
                        <div>
                            <div class="row invoice-header">
                                <div class="col-6">
                                    <div class="header-left">
                                        <div class="brand-logo">
                                            <a href="../../../html/index.html">
                                                <img src="../../../../../assets/images/logo/logo.png" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                        <div class="invoice-to">
                                            <ul>
                                                <li>
                                                    <h4>invoice to:</h4>
                                                </li>
                                                <li>
                                                    <h3>{{$school->school_name}}</h3>
                                                </li>
                                                <li>
                                                    {{$school->mobile_number}}
                                                </li>
                                                <li>
                                                    {{$school->email}}
                                                </li>
                                                <li>
                                                    <span>{{$school->address}}<span>, <span>{{$school->pin_code}}<span>, <span>{{$school->state}}<span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="header-right">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                                KetaabWaala India-3654123
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                123-456-7898
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                               ketaabwaala@gmail.com
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-globe"></i>
                                                </span>
                                               www.ketaabwaala.com
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="header-contain">
                                        <div class="invoice-text">
                                            invoice
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-breadcrumb">
                                <div class="col-12">
                                    <div class="invoice-contain">
                                        <ul>
                                            <li>
                                                <div>
                                                    <h6>invoice date:</h6>
                                                    <h5>27-nove-2020</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h6>invoice no:</h4>
                                                        <h5>AP 4978456</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h6>account no:</h6>
                                                    <h5>27550585744</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h6>due amount:<h4>
                                                            <h5>$4808.00</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table class="invoice-table ">
                                    <thead>
                                        <tr>
                                            <th>no.</th>
                                            <th>item Name</th>
                                            <th>qty</th>
                                            <th>price</th>
                                            <th>amout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $orderItem)
                                        <tr>
                                            <td>{{$orderItem->id}}</td>
                                            <td>
                                                <h3>
                                                    {{$orderItem->orderProduct->book_name}}
                                                </h3>
                                            </td>
                                            <td>{{$orderItem->quantity}}</td>
                                            <td>&#8377;{{$orderItem->price}}</td>
                                            <td>&#8377;{{$orderItem->subtotal}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="invoice-total">
                                    <div class="row">
                                        <div class="col-md-4 offset-8">
                                            <div class="total-right">
                                                <ul>
                                                    <li>
                                                        grand total
                                                        <span>&#8377;{{$order->total_Amount}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row print-bar">
                                    <div class="col-md-6">
                                        <div class="printbar-left">
                                            <button id="exportpdf" class="btn btn-solid btn-md">
                                                <i class="fa fa-file"></i>
                                                Export as PDF
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="printbar-right">
                                            <button id="printinvoice" class="btn btn-solid btn-md ">
                                                <i class="fa fa-print"></i>
                                                Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../../../assets/js/bootstrap.js"></script>

    <!-- Theme js-->
    <script src="../../../assets/js/invoice.js"></script>
</body>

</html>
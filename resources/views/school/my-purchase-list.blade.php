@extends('school.master')

@section('title', 'Dashboard')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Book Purchased List
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Book Purchased List </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row products-admin ratio_asos">
         @foreach($purchasedBooks as $purchasedBook)
        <div class="col-xl-3 col-sm-6">
            <div class="card product">
               
                    @if($purchasedBook)
                        <div class="card-body">
                            <div class="product-box p-0">
                                <div class="product-imgbox">
                                    <div class="product-front">
                                        @if($purchasedBook['image'] )
                                            <img src="{{ asset($purchasedBook['image']) }}" class="img-fluid" alt="product">
                                        @endif
                                    </div>
                                </div>
                                <div class="product-detail detail-inline p-0">
                                    <div class="detail-title">
                                        <div class="detail-left">
                                            <a href="javascript:void(0)">
                                                <h6 class="price-title">
                                                {{ $purchasedBook['title'] }}
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="detail-right">
                                           Price:  {{ $purchasedBook['price'] }}
                                            
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="product-buttons text-center">
                                                <a href="/school/view-book-detail/{{ $purchasedBook['uuid'] }}"><button type="submit" id="submit-button" class="btn btn-primary">View Book</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
               
            </div>
        </div>
         @endforeach
    </div>
</div>

<!-- Container-fluid Ends-->
<link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



@endsection
@extends('school.master')

@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Place New Order
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Place New Order </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row products-admin ratio_asos">
        @foreach($bookdetails as $bookdetail)
        <div class="col-xl-3 col-sm-6">
            <div class="card product">
                <div class="card-body">
                    <div class="product-box p-0">
                        <div class="product-imgbox">
                            <div class="product-front">
                                <img src="{{asset($bookdetail->book->image)}}" class="img-fluid  " alt="product">
                            </div>
                        </div>
                        <div class="product-detail detail-inline p-0">
                            <div class="detail-title">
                                <div class="detail-left">
                                    <h6 class="price-title">
                                        {{$bookdetail->book->book_name}}
                                    </h6>
                                    </a>
                                </div>
                                <div class="detail-right">
                                   Price: &#8377;{{$bookdetail->book->price}}
                                    <div class="price">
                                        <div class="price">
                                            {{ $bookdetail->book->class->class }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail detail-inline p-0">
                            <div class="qty-box">
                                <div class="input-group" style="padding-left: 17px; padding-bottom:7%">
                                    <button class="qty-minus"></button>
                                    <input name="quantity" id="quantity" class="qty-adj form-control" type="number" value="1" />
                                    <button class="qty-plus"></button>
                                </div>
                            </div>
                            <div style="padding-left: 28px;">
                                <button type="submit" id="addToCartBtn_{{ $bookdetail->book->id }}" class="btn btn-primary add-to-cart" data-book-id="{{ $bookdetail->book->id }}">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Container-fluid Ends-->
<link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function() {
            var bookId = $(this).data('book-id');
            var quantity = $(this).closest('.product-box').find('.qty-adj').val();
            var price = {{ $bookdetail->book->price ?? 0 }};

            $.ajax({
                url: '/school/add-to-cart',
                type: 'POST',
                data: {
                    book_id: bookId,
                    quantity: quantity,
                    price: price,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added to Cart!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
            });
        });
    });
</script>
@endsection
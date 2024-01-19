@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Manage Stock
                        <small>KitaabWaala Admin </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Manage Stock</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage Stock</h5>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Book Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Class</th>
                        <th>Quantity</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($bookdetails as $bookdetail)
                        <td>{{$bookdetail->id}}</td>
                        <td><img src="{{asset($bookdetail->image)}}"style="width: 50px; height: 50px;"></td>
                        <td>{{$bookdetail->book_name}}</td>
                        <td>{{$bookdetail->status}}</td>
                        <td>{{$bookdetail->price}}</td>
                        <td>{{$bookdetail->class->class}}</td>
                        <td>{{$bookdetail->quantity}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


@endsection
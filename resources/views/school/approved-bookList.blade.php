@extends('school.master')

@section('title', 'Dashboard')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Approved Book List
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Approved Book List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Approved Book List</h5>
                </div>
                <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>School Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Publisher</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($bookdetails as $bookdetail)
                        <td>
                            <img src="{{asset($bookdetail->book->image)}}" style="width:50px;"/></td>
                        <td>{{$bookdetail->book->book_name}}</td>
                        <td>{{$bookdetail->book->price}}</td>
                        <td>{{$bookdetail->book->status}}</td>
                        <td>{{$bookdetail->book->publisher}}</td>
                        <td>
                            <div>
                                <a href="/school/view-book-detail/{{ $bookdetail->book->uuid }}"><i class="fa fa-eye"></i></a>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection
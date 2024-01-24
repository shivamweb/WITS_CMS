@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Supplier
                        <small>Welcome to Cloth Management System</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Supplier</li>
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
                    <h5>Supplier</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Supplier</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Supplier</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" method="POST" action="{{route('addsupplier')}}">
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Name :</label>
                                                    <input class="form-control" name="name" id="name" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Contact :</label>
                                                    <input class="form-control" name="contact_number" id="contact_number" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <text for="class" class="mb-1">Address :</label>
                                                    <textarea class="form-control" name="address" id="address" type="text"></textarea>
                                                </div>

                                            </div>
                                            <!-- <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Warehouse Cost :</label>
                                                    <input class="form-control" name="warehouse_cost" id="warehouse_cost" type="text">
                                                </div>

                                            </div> -->
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body order-datatable">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->id}}</td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->contact_number}}</td>
                                    <td>{{$supplier->address}}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <button class="btn btn-danger delete-Supplier" data-id="{{$supplier->id}}">Delete</button>
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
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.delete-Supplier', function() {
        var supplierId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to the deleteClass route
                window.location.href = "{{ url('/delete-Supplier') }}" + '/' + supplierId;
            }
        });
    });
</script>
@endsection
@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>User
                        <small>Welcome to Cloth Management System</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">User</li>
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
                    <h5>User</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add User</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add User</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" method="POST" action="{{route('addNewUser')}}">
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">School Name :</label>
                                                    <input class="form-control" name="name" id="name" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Email Id :</label>
                                                    <input class="form-control" name="email" id="email" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Mobile Number :</label>
                                                    <input class="form-control" name="mobile_number" id="mobile_number" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">City :</label>
                                                    <input class="form-control" name="city" id="city" type="text">
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">State :</label>
                                                    <input class="form-control" name="state" id="state" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Address :</label>
                                                    <textarea class="form-control" name="address" id="address" type="text"></textarea>
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Pin Code :</label>
                                                    <input class="form-control" name="pin_code" id="pin_code" type="text">
                                                </div>

                                            </div>
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
                                    <th>School Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile Number</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Address</th>
                                    <th>Pin Code</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile_number}}</td>
                                    <td>{{$user->state}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->pin_code}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>
                                    <div>
                                        <a href="/view-userdetail/{{$user->uuid}}"><i class="fa fa-eye"></i></a>
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
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.delete-user', function() {
        var userId = $(this).data('id');
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
                window.location.href = "" + '/' + userId;
            }
        });
    });
</script>
@endsection
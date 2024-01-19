@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Expense
                        <small>Kitaabwaala Admin</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Expense</li>
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
                    <h5>Expense</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Expense</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Expense</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" method="POST" action="{{route('addexpense')}}" >
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Book Cost :</label>
                                                    <input class="form-control" name="book_cost" id="book_cost" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Travelling Cost :</label>
                                                    <input class="form-control" name="travelling_cost" id="travelling_cost" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Labour Cost :</label>
                                                    <input class="form-control" name="labour_cost" id="labour_cost" type="text">
                                                </div>

                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Warehouse Cost :</label>
                                                    <input class="form-control" name="warehouse_cost" id="warehouse_cost" type="text">
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
                                    <th>Book Cost</th>
                                    <th>Travelling Cost</th>
                                    <th>Labour Cost</th>
                                    <th>Warehouse Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr>
                                    <td>{{$expense->id}}</td>
                                    <td>{{$expense->book_cost}}</td>
                                    <td>{{$expense->travelling_cost}}</td>
                                    <td>{{$expense->labour_cost}}</td>
                                    <td>{{$expense->warehouse_cost}}</td>  
                                    <td>
            <!-- Delete Button -->
            <button class="btn btn-danger" onclick="deleteExpense({{$expense->id }})">Delete</button>
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
    function deleteExpense(expenseId) {
        // Show a confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, redirect to the delete route
                window.location.href = '/admin/delete-expense/' + expenseId;
            }
        });
    }
</script>
@endsection
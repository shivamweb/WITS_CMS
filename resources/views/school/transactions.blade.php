@extends('school.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Transactions
                        <small>Kitaabwaala school </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                    
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Transactions</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Make Transection</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Transactions</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" method="POST" action="{{route('storeTransaction')}}">
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Invoice Id :</label>
                                                    <select class="form-select" id="invoice_id" name="order_id">
                                                        <option value="--">--Select Invoice Id--</option>
                                                        @foreach($orders as $order)
                                                        <option value="{{ $order->id }}" data-remaining-amount="{{ $order->remaining_Amount }}">{{ $order->id }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Transaction Id :</label>
                                                    <input class="form-control" name="transection_id" id="class" type="text" style="border-radius: 20px;">
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="remaining_amount" class="mb-1">Remaining :</label>
                                                    <label id="remaining_amount_label" class="mb-1">{{ $remainingAmount }}</label>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="class" class="mb-1">Paid Amount :</label>
                                                    <input class="form-control" name="amount" id="class" type="text" style="border-radius: 20px;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit" >Save</button>
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
                                    <th>OrderId</th>
                                    <th>TransectionId</th>
                                    <th>Remaining Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Total Amount</th>
                                    <th>Transection Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transections as $transection)
                                <tr>
                                    <td>{{$transection->order_id}}</td>
                                    <td>{{$transection->transection_id}}</td>
                                    <td>{{$transection->order->remaining_Amount}}</td>
                                    <td>{{$transection->amount}}</td>
                                    <td>{{$transection->order->total_Amount}}</td>
                                    <td>{{$transection->created_at}}</td>
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

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var status = "{{ session('status') }}";
        var message = "{{ session('message') }}";
        var errors = @json($errors->all());
        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            });
        } else if (status === 'error') {
            if (errors.length > 0) {
                var errorMessage = 'Validation Errors:<br>';
                errors.forEach(function(error) {
                    errorMessage += error + '<br>';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorMessage
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#invoice_id').change(function() {
            var orderId = $(this).val();
            if (orderId) {
                // Assuming you have the remaining_amount available in the HTML, no need for AJAX in this case
                var remainingAmount = $('#invoice_id option:selected').data('remaining-amount');
                $('#remaining_amount_label').text(remainingAmount);
            } else {
                $('#remaining_amount_label').text('');
            }
        });
    });
</script>
@endsection
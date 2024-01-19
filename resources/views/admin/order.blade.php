@extends('admin.master')

@section('title', 'Dashboard')
@section('content')


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Received Orders
                        <small>KitaabWaala admin </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active"> Received Orders</li>
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
                    <h5>Manage Order</h5>
                </div>
                <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>School Name</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Remaining Amount</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->school->school_name}}</td>
                                <td>
                                    <select class="form-select" id="paymentStatus" data-order-id="{{ $order->id }}" name="paymentStatus">
                                        <option value="{{ \App\Enums\PaymentStatusEnum::PAID }}" @if ($order->payment_status == \App\Enums\PaymentStatusEnum::PAID) selected @endif>PAID</option>
                                        <option value="{{ \App\Enums\PaymentStatusEnum::PENDING }}" @if ($order->payment_status == \App\Enums\PaymentStatusEnum::PENDING) selected @endif>PENDING</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" id="paymentMethod" data-order-id="{{ $order->id }}" name="paymentMethod">
                                        <option value="{{ \App\Enums\PaymentMethodEnum::CASH_ON_DELIVERED }}" @if ($order->payment_method == \App\Enums\PaymentMethodEnum::CASH_ON_DELIVERED ) selected @endif>CASH ON DELIVERED</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" id="orderStatus" data-order-id="{{ $order->id }}" name="orderStatus">
                                        <option value="{{ \App\Enums\OrderStatusEnum::DELIVERED }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::DELIVERED ) selected @endif>DELIVERED</option>
                                        <option value="{{ \App\Enums\OrderStatusEnum::APPROVED }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::APPROVED ) selected @endif>APPROVED</option>
                                        <option value="{{ \App\Enums\OrderStatusEnum::SHIPPED }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::SHIPPED) selected @endif>SHIPPED</option>
                                        <option value="{{ \App\Enums\OrderStatusEnum::PROCESSING }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::PROCESSING) selected @endif>PROCESSING</option>
                                        <option value="{{ \App\Enums\OrderStatusEnum::CANCELLED }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::CANCELLED) selected @endif>CANCELLED</option>
                                        <option value="{{ \App\Enums\OrderStatusEnum::PENDING }}" @if ($order->order_status == \App\Enums\OrderStatusEnum::PENDING) selected @endif>PENDING</option>
                                    </select>
                                </td>
                                <td>&#8377;{{$order->total_Amount}}</td>
                                <td>&#8377;{{$order->remaining_Amount}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="/admin/invoiceToAdmin/{{$order->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        // Handle change event for payment status
        $('select[name="paymentStatus"]').on('change', function() {
            showWarningAlert('Payment Status', $(this).val(), $(this).data('order-id'), 'paymentStatus');
        });

        // Handle change event for payment method
        $('select[name="paymentMethod"]').on('change', function() {
            showWarningAlert('Payment Method', $(this).val(), $(this).data('order-id'), 'paymentMethod');
        });

        // Handle change event for order status
        $('select[name="orderStatus"]').on('change', function() {
            showWarningAlert('Order Status', $(this).val(), $(this).data('order-id'), 'orderStatus');
        });

        // Function to show warning alert
        function showWarningAlert(type, statusValue, orderId, statusType) {
            // Display a warning alert using SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to change the ${type} to ${statusValue}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, proceed with the update
                    updateStatus(statusType, statusValue, orderId);
                } else {
                    // If user cancels, reset the select to its previous value
                    $('select[name="' + statusType + '"]').val($('select[name="' + statusType + '"]').data('original-value'));
                }
            });
        }

        // Function to update status
        function updateStatus(statusType, statusValue, orderId) {
            // Get the CSRF token from the page
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Make an asynchronous request to update the status
            $.ajax({
                type: 'POST',
                url: '/admin/update-status', // Replace with your actual update status endpoint
                data: {
                    _token: '{{ csrf_token() }}',
                    statusType: statusType,
                    statusValue: statusValue,
                    orderId: orderId,
                },
                success: function(response) {
                    // Handle success with a success alert
                    Swal.fire({
                        title: 'Success!',
                        text: 'Status updated successfully',
                        icon: 'success',
                    });
                },
                error: function(error) {
                    // Handle error with an error alert
                    Swal.fire({
                        title: 'Error!',
                        text: 'Insufficient book quantity',
                        icon: 'error',
                    }).then(function() {
                        // Reload the page after the alert is closed
                        window.location.reload();
                    });
                },
            });
        }
    });
</script>
@endsection
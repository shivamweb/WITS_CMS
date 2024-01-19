@extends('school.master')

@section('title', 'Dashboard')
@section('content')


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Orders
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Orders</li>
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
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Remaining Amount:</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    @if($order->payment_status === \App\Enums\PaymentStatusEnum::PAID)
                                    <span class="badge badge-success">Paid</span>
                                    @else
                                    <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>{{$order->payment_method}}</td>
                                <td>
                                    @if($order->order_status === \App\Enums\OrderStatusEnum::DELIVERED)
                                    <span class="badge badge-success">DELIVERED</span>
                                    @elseif($order->order_status === \App\Enums\OrderStatusEnum::APPROVED)
                                    <span class="badge badge-primary">APPROVED</span>
                                    @elseif($order->order_status === \App\Enums\OrderStatusEnum::SHIPPED)
                                    <span class="badge badge-primary">SHIPPED</span>
                                    @elseif($order->order_status === \App\Enums\OrderStatusEnum::PROCESSING)
                                    <span class="badge badge-warning">PROCESSING</span>
                                    @elseif($order->order_status === \App\Enums\OrderStatusEnum::CANCELLED)
                                    <span class="badge badge-danger">CANCELLED</span>
                                    @else
                                    <span class="badge badge-warning">PENDING</span>
                                    @endif
                                </td>
                                <td>&#8377;{{$order->total_Amount}}</td>
                                <td>&#8377;{{$order->remaining_Amount}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="/school/invoice/{{$order->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
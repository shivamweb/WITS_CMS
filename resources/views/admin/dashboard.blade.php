@extends('admin.master')

@section('title', 'Dashboard')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<style>
    .inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100%;
    }

    .inner h4 {
        font-size: 2rem;
        margin: 0;
    }

    .inner span {
        font-size: 1rem;
        margin-top: 0.2rem;
    }
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Dashboard
                        <small>KitaabWaala Admin </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Books</span>
                            <h3 class="mb-0">$<span class="counter" id="totalBooks"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Schools</span>
                            <h3 class="mb-0">$<span class="counter" id="totalSchools"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Approved</span>
                            <h3 class="mb-0">$<span class="counter" id="totalApprovedOrders"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Shipped</span>
                            <h3 class="mb-0">$<span id="totalShippedOrders" class="counter"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Processing</span>
                            <h3 class="mb-0">$<span id="totalProcessingOrders" class="counter"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Cancellled</span>
                            <h3 class="mb-0">$<span id="totalCancelledOrders" class="counter"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Pending</span>
                            <h3 class="mb-0">$<span id="totalPendingOrders" class="counter"></span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card height-equal">
            <div class="card-header">
                <h5>Order Activity</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="order-timeline">
                    <div class="media">
                        <div class="timeline-line"></div>
                        <div class="timeline-icon-primary">
                            <i data-feather="map-pin"></i>
                        </div>
                        <div class="media-body">
                            <span class="font-primary">Delivered</span>
                            <p>56 mins ago</p>
                        </div>
                        <span class="pull-right text-muted">Today</span>
                    </div>
                    <div class="media">
                        <div class="timeline-icon-secondary">
                            <i data-feather="shopping-cart"></i>
                        </div>
                        <div class="media-body">
                            <span class="font-secondary">In Transit</span>
                            <p>18 Hour ago</p>
                        </div>
                        <span class="pull-right text-muted">Yesterday</span>
                    </div>
                    <div class="media">
                        <div class="timeline-icon-warning">
                            <i data-feather="box"></i>
                        </div>
                        <div class="media-body">
                            <span class="font-warning">Dispatched</span>
                            <p>3 Days Ago</p>
                        </div>
                        <span class="pull-right text-muted">12 Sep</span>
                    </div>
                    <div class="media">
                        <div class="timeline-icon-success">
                            <i data-feather="user"></i>
                        </div>
                        <div class="media-body">
                            <span class="font-success">Order Received</span>
                            <p>8 Days Ago</p>
                        </div>
                        <span class="pull-right text-muted">05 Sep</span>
                    </div>
                </div>
                <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head4">
&lt;div class="order-timeline"&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-line"&gt;&lt;/div&gt;
      &lt;div class="timeline-icon-primary"&gt;
        &lt;i data-feather="map-pin"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-primary"&gt;Delivered&lt;/span&gt;
         &lt;p&gt;56 mins ago&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;Today&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-secondary"&gt;
         &lt;i data-feather="shopping-cart"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-secondary"&gt;In Transit&lt;/span&gt;
         &lt;p&gt;18 Hour ago&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;Yesterday&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-warning"&gt;
         &lt;i data-feather="box"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-warning"&gt;Dispatched&lt;/span&gt;
         &lt;p&gt;3 Days Ago&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;12 Sep&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-success"&gt;
         &lt;i data-feather="user"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-success"&gt;Order Received&lt;/span&gt;
         &lt;p&gt;8 Days Ago&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;05 Sep&lt;/span&gt;
   &lt;/div&gt;
&lt;/div&gt;
                                    </code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="stat-box px-3 px-md-4 py-3 py-lg-4 shadow-sm rounded">
            <div>
                <h3 class="mb-0">Stock Reports</h3>
                <div class="inner position-relative">
                    <div class="inner position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="primary mb-0" id="total-ticket-count"></h4>
                    </div>
                    <div id="chart-container" style="position: relative; height: 200x; width: 100%;">
                        <canvas id="book-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="stat-box px-3 px-md-4 py-3 py-lg-4 shadow-sm rounded">
            <div>
                <h3 class="mb-0">Expense Reports</h3>
                <div class="inner position-relative">
                    <div class="inner position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="primary mb-0" id="total-ticket-count"></h4>

                    </div>
                    <div class="chart-container" style="position: relative; height: 200x; width: 100%;">
                        <canvas id="expenseChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="stat-box px-3 px-md-4 py-3 py-lg-4 shadow-sm rounded">
            <div>
                <h3 class="mb-0">Sales Reports</h3>
                <div class="inner position-relative">
                    <div class="inner position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="primary mb-0" id="total-ticket-count"></h4>
                    </div>
                    <div class="chart-container" style="position: relative; height: 200x; width: 100%;">
                        <canvas id="sales-report-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Container-fluid Ends-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/admin/getTotalCounts',
            type: 'GET',
            success: function(response) {

                // $('#totalBooks').text(response.totalBooks);
                // $('#totalOrders').text(response.totalOrders);
                $('#totalSchools').text(response.totalSchools);
                $('#totalDeliveredOrders').text(response.totalDeliveredOrders);
                $('#totalApprovedOrders').text(response.totalApprovedOrders);
                $('#totalShippedOrders').text(response.totalShippedOrders);
                $('#totalProcessingOrders').text(response.totalProcessingOrders);
                $('#totalCancelledOrders').text(response.totalCancelledOrders);
                $('#totalPendingOrders').text(response.totalPendingOrders);
            },
            error: function() {
                console.log('Error fetching total product count');
            }
        });
    });

    $(document).ready(function() {
        loadData().then(function(chartData) {
            createChart(chartData);
        }).catch(function(error) {
            console.log('Error fetching data:', error);
        });
    });

    function loadData() {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: '/admin/getChartData',
                method: 'GET',
                success: function(chartData) {
                    resolve(chartData);
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    function createChart(data) {
        var ctx = document.getElementById('book-chart').getContext('2d');

        var bookNames = data.map(entry => entry.book_name);
        var quantities = data.map(entry => entry.quantity);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bookNames,
                datasets: [{
                    label: 'Book Quantity',
                    data: quantities,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 20,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function loadSalesReportData() {
        $.ajax({
            url: '/admin/getSalesReportData',
            method: 'GET',
            success: function(salesData) {
                createSalesReportChart(salesData);
            },
            error: function(error) {
                console.log('Error fetching sales report data:', error);
            }
        });
    }

    $(document).ready(function() {
        loadSalesReportData();
    });

    // Add the following function to create the sales report chart
    function createSalesReportChart(data) {
        var ctx = document.getElementById('sales-report-chart').getContext('2d');

        var schoolNames = data.map(entry => entry.school_name);
        var totalOrders = data.map(entry => entry.total_orders);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: schoolNames,
                datasets: [{
                    label: 'Total Orders',
                    data: totalOrders,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 20,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        $.ajax({
            url: '/admin/getexpensereport',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);


                var ctxStatus = document.getElementById('expenseChart').getContext('2d');
                chartStatus = new Chart(ctxStatus, {

                    type: 'doughnut',
                    data: {
                        labels: ['Book Cost', 'Travelling Cost', 'Labour Cost', 'Warehouse Cost'],
                        datasets: [{
                            data: [data.book_costcount, data.travelling_costcount, data.labour_costcount, data.warehouse_costcount],
                            backgroundColor: ['#4184e6', '#198754', '#c5aa5b', '#6c757d', '#c0525c'],
                        }],
                    },
                    options: {
                        cutout: 80,
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'right',
                        },
                    },
                });

            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', error);
            }
        });
    });
</script>

@endsection
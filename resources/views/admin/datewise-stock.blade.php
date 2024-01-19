@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid">
    <!-- ... your existing code ... -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <hr>

                    {{-- Date Range Picker --}}
                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" class="form-control">
                    </div>

                    <!-- Canvas for the graph -->
                    <canvas id="dateWiseGraph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this in your Blade file, after including Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        var startDateInput = document.getElementById("startDate");
        var endDateInput = document.getElementById("endDate");
        var graphCanvas = document.getElementById("dateWiseGraph").getContext("2d");
        var myChart;

        // Function to update the graph based on the selected date range
        function updateGraph(startDate, endDate) {
            $.ajax({
                url: "{{ route('fetchDataByDate') }}",
                type: "GET",
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function(response) {
                    if (response.success) {
                        var chartData = response.chartData;

                        if (myChart) {
                            myChart.destroy();
                        }

                        myChart = new Chart(graphCanvas, {
                            type: 'line',
                            data: {
                                labels: chartData.map(data => data.book_name),
                                datasets: [{
                                    label: 'Quantity',
                                    data: chartData.map(data => data.quantity),
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                // Customize Chart.js options as needed
                            }
                        });
                    } else {
                        console.error("Error fetching data:", response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", xhr.responseText);
                }
            });
        }

        startDateInput.addEventListener("change", function() {
            updateGraph(startDateInput.value, endDateInput.value);
        });

        endDateInput.addEventListener("change", function() {
            updateGraph(startDateInput.value, endDateInput.value);
        });
    });
</script>


@endsection
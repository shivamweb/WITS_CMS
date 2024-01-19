@extends('school.master')

@section('title', 'Notifications')

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>List inquiry
                        <small>KitaabWaala School</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">List inquiry</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between bottom-border">
                        <h3>Inquiry center</h3>
                    </div>
                    <hr>
                    <div class="tab-content" id="pills-tabContent">
                        @if ($inquiry->isEmpty())
                            <p>No inquiry to display.</p>
                        @else
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                @foreach ($inquiry as $inquiryItem)
                                    <div
                                        class="bg-notification mb-3 flex-wrap flex-md-nowrap rounded px-2 px-md-3 py-4 d-flex align-items-center w-100 gap-2">
                                        <img src="../assets/images/logo/logo.png" width="80" height="80"
                                            alt="Default Image">
                                        <div class="flex-grow-1">
                                            <p class="pg-large mb-1">
                                                {{ $inquiryItem->createdByUser->name . ' ' . $inquiryItem->createdByUser->last_name }}
                                            </p>
                                            <p class="pg-large mb-1">{{ $inquiryItem->description }}</p>
                                            <div class="d-flex justify-content-between">
                                                <span class="d-flex align-items-center gap-2">
                                                    <span class="dynamic-timestamp"
                                                        data-timestamp="{{ $inquiryItem->created_at->toIso8601String() }}"></span>
                                                    <span class="notification-dot"></span>
                                                </span>
                                                <span class="primary">
                                                    {{ $inquiryItem->created_at->format('M d, Y') }}
                                                </span>
                                            </div>
                             
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @endif
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    function updateTimestamps() {
        document.querySelectorAll('.dynamic-timestamp').forEach(function (element) {
            var timestamp = element.getAttribute('data-timestamp');
            var currentTime = moment();
            var inquiryTime = moment(timestamp);
            var diffInDays = currentTime.diff(inquiryTime, 'days');
            var diffInHours = currentTime.diff(inquiryTime, 'hours');
            var diffInMinutes = currentTime.diff(inquiryTime, 'minutes');
            var formattedTimestamp = '';
            if (diffInDays > 0) {
                formattedTimestamp = diffInDays + ' days ago';
            } else if (diffInHours > 0) {
                formattedTimestamp = diffInHours + ' hours ago';
            } else {
                formattedTimestamp = diffInMinutes + ' minutes ago';
            }
            element.textContent = formattedTimestamp;
        });
        setTimeout(updateTimestamps, 60000);
    }
    updateTimestamps();
</script>
@endsection

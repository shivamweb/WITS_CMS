@extends('school.master')

@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Add Inquiry
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Add Inquiry</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
       
            <form action="{{ route('sendInquiry') }}" method="post" >
              @csrf
              
              <div class="row">
                <div class="col mt-3 mt-lg-4">
                  <label for="to" class="form-label">Send To</label>
                  <select class="form-select" id="to" name="to">
                    <option value="all">All</option>
                    @foreach($admindetails as $admindetail)
                    <option value="{{ $admindetail->id }}">{{ $admindetail->id. '|' .$admindetail->name. ' ' .$admindetail->last_name. '|' .$admindetail->email}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col mt-3 mt-lg-4">
                  <label for="description" class="large">Description</label>
                  <textarea cols="20" rows="5" wrap="hard" id="description" name="description" class="form-control mt-2" placeholder="Enter Description" required></textarea>
                </div>
              </div>
          </div>
          <div class="d-flex gap-4 mt-4">
            <button type="submit" class="btn btn-primary">
              Send Inquiry
            </button>
            <button type="reset" class="btn btn-primary">Cancel</button>
          </div>
          </form>
        </div>
        </div>
</div>
      </div>
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
                }).then(function() {
                    // Redirect to a desired URL
                    window.location.href = '/school/inquiryaddview'; // Replace with your desired URL
                });
            } else if (status === 'error') {
                if (errors.length > 0) {
                    // Construct the error message from the validation errors
                    var errorMessage = 'Validation Errors:<br>';
                    errors.forEach(function(error) {
                        errorMessage += error + '<br>';
                    });

                    // Display a SweetAlert with validation errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessage
                    }).then(function() {
                        // Redirect to a desired URL after the user clicks "OK"
                        window.location.href = '/school/inquiryaddview'; // Replace with your desired URL
                    });
                } else {
                    // Display a SweetAlert with general error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message
                    });
                }
            }
        });
</script>
      @endsection
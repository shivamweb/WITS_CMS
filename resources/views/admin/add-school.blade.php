@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Add School</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                           
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                       
                                        <form name="school_profile"method="POST" action="{{route('School')}}" enctype="multipart/form-data">
                                            @csrf

                                            <tr>
                                                <td>School Name:</td>
                                                <td><input type="text" id="school_name" name="school_name"></td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td>
                                                <td><input type="email" id="email" name="email"></td>
                                            </tr>

                                            <tr>
                                                <td>Mobile Number:</td>
                                                <td><input type="text" name="mobile_number"></td>
                                            </tr>
                                            <tr>
                                                <td>School Zone :</td>
                                                <td><input type="text" id="school_zone" name="school_zone"></td>
                                            </tr>
                                            <tr>
                                                <td>Country :</td>
                                                <td><input type="text" id="cname" name="country"></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td><input type="text" id="password" name="password"></td>
                                            </tr>
                                                <td>Address:</td>
                                                <td><input type="text" id="address" name="address"></td>
                                            </tr>
                                            <tr>
                                                <td>PIN Code:</td>
                                                <td><input type="text" id="pincode" name="pin_code"></td>
                                            </tr>
                                            <tr>
                                                <td>City:</td>
                                                <td><input type="text" id="city" name="city"></td>
                                            </tr>
                                            <tr>
                                                <td>State:</td>
                                                <td><input type="text" id="state" name="state"></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Add School</button>
                            </form>

                        </div>
             
                    </div>
                </div>
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

    function previewImage(input, previewId) {
        const file = input.files[0];
        const imagePreview = document.getElementById(previewId);
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
            imagePreview.style.display = 'none';
        }
    }
</script>

@endsection
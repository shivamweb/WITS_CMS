@extends('admin.master')

@section('title', 'Dashboard')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Profile
                        <small>WITS CMS Admin </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">

        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Profile</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Profile</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                   

                                        <form method="POST" action="{{route('storeAdminProfile')}}" enctype="multipart/form-data">
                                            @csrf
                                                    <div class="profile-details text-center">
                                                        @if ($adminDetails->image)
                                                        <img src="{{asset($adminDetails->image)}}" alt="" style="height:200px;width:200px;border-radius:50%">
                                                        @else
                                                        <img src="../assets/images/default/noimage.jpg" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                                        @endif
                                                        <h5 class="f-w-600 mb-0">{{$adminDetails->firstname. ' ' .$adminDetails->lastname}}</h5>
                                                        <span>{{$adminDetails->email}}</span></br></div>
                                        <div class="row">
                                        <div class="col-lg-7 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <label for="formFile" class="form-label"> Upload Your Profile Image:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <input class="form-control" type="file" name="image" id="fileToUpload" value="{{$adminDetails->image}}" onchange="previewImage(this, 'imgPreview1');"  style="border-radius:20px" require>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <label for="fname" class="form-label">First Name:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <input type="text" id="fname" name="firstname" class="form-control" value="{{ $adminDetails->firstname }}" style="border-radius:20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <label for="fname" class="form-label">Last Name:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <input type="text" id="lname" name="lastname" class="form-control" value="{{$adminDetails->lastname}}" style="border-radius:20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <label for="fname" class="form-label">Email:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" class="form-control" value="{{$adminDetails->email}}" style="border-radius:20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <label for="fname" class="form-label">Mobile Number:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-3 mt-lg-4">
                                            <div class="form-group">
                                                <input type="text" name="mobile_number" class="form-control" value="{{ $adminDetails->mobile_number ?? '' }}"  style="border-radius:20px">
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            <button type="submit" class="btn btn-primary">Add Profile</button>
                            </form>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="account-setting">
                                <h5 class="f-w-600">Notifications</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="chk-ani">
                                            <input class="checkbox_animated" id="chk-ani" type="checkbox">
                                            Allow Desktop Notifications
                                        </label>
                                        <label class="d-block" for="chk-ani1">
                                            <input class="checkbox_animated" id="chk-ani1" type="checkbox">
                                            Enable Notifications
                                        </label>
                                        <label class="d-block" for="chk-ani2">
                                            <input class="checkbox_animated" id="chk-ani2" type="checkbox">
                                            Get notification for my own activity
                                        </label>
                                        <label class="d-block mb-0" for="chk-ani3">
                                            <input class="checkbox_animated" id="chk-ani3" type="checkbox" checked="">
                                            DND
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="account-setting deactivate-account">
                                <h5 class="f-w-600">Deactivate Account</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="">
                                            I have a privacy concern
                                        </label>
                                        <label class="d-block" for="edo-ani1">
                                            <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">
                                            This is temporary
                                        </label>
                                        <label class="d-block mb-0" for="edo-ani2">
                                            <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="">
                                            Other
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Deactivate Account</button>
                            </div>
                            <div class="account-setting deactivate-account">
                                <h5 class="f-w-600">Delete Account</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="edo-ani3">
                                            <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani1" checked="">
                                            No longer usable
                                        </label>
                                        <label class="d-block" for="edo-ani4">
                                            <input class="radio_animated" id="edo-ani4" type="radio" name="rdo-ani1">
                                            Want to switch on other account
                                        </label>
                                        <label class="d-block mb-0" for="edo-ani5">
                                            <input class="radio_animated" id="edo-ani5" type="radio" name="rdo-ani1" checked="">
                                            Other
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Delete Account</button>
                            </div>
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
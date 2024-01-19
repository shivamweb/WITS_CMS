@extends('school.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Add School</a></li>
                        <li class="nav-item"><a class="nav-link" id="top-pancard-tab" data-bs-toggle="tab" href="#top-pancard" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Spoc Person</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-aadhar-tab" data-bs-toggle="tab" href="#top-aadhar" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Document</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Add School</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <body>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <form name="school_profile" method="POST" action="{{route('storeSchoolProfile')}}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="profile-details text-center">

                                                <img src="{{ $schooldetails->image ? '../'.$schooldetails->image : asset('assets/images/avtar/defaultProduct.jpeg') }}" alt="" id="imgPreview1" style="height:200px;width:200px;border-radius:50%;">


                                                <h5 class="f-w-600 mb-0">{{ $schooldetails ? $schooldetails->school_name : '' }}</h5>
                                                <span>{{ $schooldetails ? $schooldetails->email : '' }}</span></br>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="formFile" class="form-label"> Upload Your Profile Image:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input class="form-control" type="file" name="image" id="fileToUpload" onchange="previewImage(this, 'imgPreview1');" style="border-radius: 20px;" require>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<tr>
                                                    <td>School Name:</td>
                                                    <td><input type="text" id="school_name" name="school_name" value="{{$schooldetails->school_name}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">School Name:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="school_name" name="school_name" class="form-control" value="{{ $schooldetails->school_name }}" style="border-radius: 20px;">
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
                                                        <input type="email" id="email" name="email" class="form-control" value="{{ $schooldetails->email }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<tr>
                                                    <td>Email:</td>
                                                    <td><input type="email" id="email" name="email" value="{{$schooldetails->email}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">Password:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="password" name="password" class="form-control" value="{{ $schooldetails->password }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>Password:</td>
                                                    <td><input type="text" id="password" name="password" value="{{$schooldetails->password}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">Mobile Number:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="mobile_number " name="mobile_number" class="form-control" value="{{ $schooldetails->mobile_number }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>Mobile Number:</td>
                                                    <td><input type="text" id="mobile_number " name="mobile_number" value="{{$schooldetails->mobile_number}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">School Zone:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="school_zone" name="school_zone" class="form-control" value="{{ $schooldetails->school_zone }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>School Zone:</td>
                                                    <td><input type="text" id="school_zone" name="school_zone" value="{{$schooldetails->school_zone}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">Country:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="cname" name="country" class="form-control" value="{{ $schooldetails->country }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>Country :</td>
                                                    <td><input type="text" id="cname" name="country" value="{{$schooldetails->country}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">Address:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="address" name="address" class="form-control" value="{{ $schooldetails->address }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>Address:</td>
                                                    <td><input type="text" id="address" name="address" value="{{$schooldetails->address}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">PIN Code:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="pincode" name="pin_code" class="form-control" value="{{ $schooldetails->pin_code }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>PIN Code:</td>
                                                    <td><input type="text" id="pincode" name="pin_code" value="{{$schooldetails->pin_code}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">City:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="pincode" name="city" class="form-control" value="{{ $schooldetails->city }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<tr>
                                                    <td>City:</td>
                                                    <td><input type="text" id="pincode" name="city" value="{{$schooldetails->city}}"></td>
                                                </tr>-->
                                            <div class="row">
                                                <div class="col-lg-7 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <label for="fname" class="form-label">State:</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-3 mt-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" id="state" name="state" class="form-control" value="{{ $schooldetails->state }}" style="border-radius: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add School</button>
                                            <!--<tr>
                                                    <td>State:</td>
                                                    <td><input type="text" id="state" name="state" value="{{$schooldetails->state}}"></td>
                                                </tr>-->
                                        </form>
                                    </body>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-pancard" role="tabpanel" aria-labelledby="top-pancard-tab">
                            <h5 class="f-w-600">Spoc Person Detail</h5>
                            <tr>
                                <hr>
                            </tr>
                            <form method="POST" action="{{route('storeSchoolFaculityDetail')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-7 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">Faculity Name:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="fname" name="faculity_name" value="{{$schooldetails->faculity_name ?? '' }}" style="border-radius: 20px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">Faculity Email:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="faculity_email" name="faculity_email" value="{{$schooldetails->faculity_email ?? '' }}" style="border-radius: 20px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">Faculity Mobile No:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="faculity_mobileno" name="faculity_mobileno" value="{{$schooldetails->faculity_mobileno ?? '' }}" style="border-radius: 20px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">Faculity Gender:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="faculity_gender" name="faculity_gender" value="{{$schooldetails->faculity_gender ?? ''}}" style="border-radius: 20px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">Designation:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="designation" name="designation" value="{{$schooldetails->designation ?? '' }}" style="border-radius: 20px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="table-responsive pancard-table">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <hr>
                                            </tr>
                                            <tr>
                                                <td>Faculity Name:</td>
                                                <td> <input type="text" id="fname" name="faculity_name" value="{{$schooldetails->faculity_name ?? '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Email:</td>
                                                <td> <input type="text" id="faculity_email" name="faculity_email" value="{{$schooldetails->faculity_email ?? '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Mobile No:</td>
                                                <td> <input type="text" id="faculity_mobileno" name="faculity_mobileno" value="{{$schooldetails->faculity_mobileno ?? '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Gender:</td>
                                                <td> <input type="text" id="faculity_gender" name="faculity_gender" value="{{$schooldetails->faculity_gender ?? ''}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Designation:</td>
                                                <td> <input type="text" id="designation" name="designation" value="{{$schooldetails->designation ?? '' }}"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                                <button type="submit" class="btn btn-primary">Add Faculity</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="top-aadhar" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Document</h5>
                            <form method="POST" action="{{route('storeSchoolDocument')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive profile-table">
                                    <table class="table table-responsive">
                                            <tr>
                                                <hr>
                                            </tr>
                                            <tr>
                                                <td>School Document:</td>
                                                <!-- <td>
                                                    <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview')">
                                                    <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview')">
                                                    <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview')">
                                                    <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview')">
                                                    <img id="documentPreview" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview')">

                                                </td>
                                                <td>
                                                    <img id="documentPreview" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview1')">
                                                </td>
                                                <td>
                                                    <img id="documentPreview1" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview2')">
                                                </td>
                                                <td>
                                                    <img id="documentPreview2" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <input type="file" id="school_doc_image" name="school_document[]" accept="image/*" onchange="previewImage(this, 'documentPreview3')">
                                                </td>
                                                <td>
                                                    <img id="documentPreview3" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">upload</button>
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
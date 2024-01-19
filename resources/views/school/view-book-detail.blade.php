@extends('school.master')

@section('title', 'Dashboard')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>View Book
                        <small>Kitaabwaala School</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">View Book</li>
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
                    <h5>Add Product</h5>
                </div>
                <div class="card-body">
                    <div class="row product-adding">

                        <div class="row">
                            <div class="col-xl-5">
                                <div class="add-product">
                                    <div class="row">
                                        <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                            <div class="item"><img id="imgPreview1" src="{{ asset($bookdetails->image) }}" alt="" class="blur-up lazyloaded" style="width: 104%;height:378px;" disabled></div>
                                        </div>
                                        <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                            <ul class="file-upload-product">
                                                <li>
                                                    <div class="box-input-file"><input class="upload" type="file" name="image" multiple onchange="previewImage(this, 'imgPreview1');" disabled><i class="fa fa-plus"></i></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="form">
                                    <div class="form-group mb-3  row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustom01">Book Name :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->book_name}}" id="book_name" name="book_name" type="text" required="" disabled>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3  row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustom01">Price:</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->price}}" id="price" name="price" type="text" required="" disabled>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustom02">Part :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->part}}" id="validationCustom02" name="part" type="text" required="" disabled>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustomUsername">Publisher :</label>
                                        </div>

                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->publisher}}" id="validationCustomUsername" name="publisher" type="text" required="" disabled>

                                        </div>
                                    </div>
                                </div>
                                <div class="form">
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="exampleFormControlSelect1">Select Class :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->class_id}}" id="validationCustomUsername" name="class_id" type="text" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="exampleFormControlSelect1">Select Status :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->status}}" id="validationCustomUsername" name="status" type="text" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="exampleFormControlSelect1">Select Stock Status :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control " value="{{$bookdetails->stock_status}}" id="validationCustomUsername" name="stock_status" type="text" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label>Total Books :</label>
                                        </div>
                                        <div class="col-xl-2 col-sm-6">
                                            <input class="form-control" value="{{$bookdetails->quantity}}" name="quantity" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4">Add Description :</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <textarea id="description" class="form-control" name="description" cols="100" rows="4" disabled>{{$bookdetails->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-xl-3 offset-sm-4">
                                    <button type="submit" id="submit-button" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-primary">Discard</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- touchspin js-->
<script src="../assets/js/touchspin/vendors.min.js"></script>
<script src="../assets/js/touchspin/touchspin.js"></script>
<script src="../assets/js/touchspin/input-groups.min.js"></script>
<!-- ckeditor js-->
<script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="../assets/js/editor/ckeditor/styles.js"></script>
<script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="../assets/js/editor/ckeditor/ckeditor.custom.js"></script>

<!-- Zoom js-->
<!-- <script src="../assets/js/jquery.elevatezoom.js"></script>
<script src="../assets/js/zoom-scripts.js"></script> -->

<script>
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
            imagePreview.style.display = 'block';
        }
    }

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
@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Add Products
                        <small>WITS CMS</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="/vendor/dashboard"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Amin</li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row product-adding">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>General</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                        <form id="productForm" method="POST" action="{{ route('addNewProduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="col-form-label pt-0"><span>*</span>
                                    Name</label>
                                <input class="form-control" name="name" id="name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-form-label pt-0"><span>*</span>
                                    Supplier Name</label>
                                <input class="form-control" name="supplier_name" id="supplier_name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-form-label pt-0"><span>*</span>
                                    Product Discription</label>
                                <textarea class="form-control" name="description" id="description" type="text"></textarea>
                            </div>    
                            <div class="form-group">
                                <label for="category_id" class="col-form-label pt-0"><span>*</span>Category</label>
                                <select class="custom-select form-control" name="category_id" id="category_id">
                                    
                                    <option value="test">test</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id" class="col-form-label pt-0"><span>*</span>SubCategory</label>
                                <select class="custom-select form-control" id="subcategory_id" name="subcategory_id">
                                <option value="test">test</option>
                                </select>
                            </div>
                            <div class="form-group">
                                        <button type="submit" id="submit-button" class="btn btn-primary">Add</button>
                                        <!-- <button type="button" class="btn btn-primary">Discard</button> -->
                                    </div>
                            <!-- <div class="form-group">
                                <label for="title" class="col-form-label pt-0"><span>*</span>
                                    Title</label>
                                <input class="form-control" name="title" id="title" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <label for="specifications" class="col-form-label pt-0"><span>*</span> Gst</label>
                                        <input class="form-control" name="gst" id="gst" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <label for="product_status" class="col-form-label pt-0"><span>*</span> Product Status</label>
                                        <input class="form-control" name="product_status" id="product_status" type="text" value="" disabled>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <h6 class="product-title">color</h6>
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="brown"> Brown
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="white"> White
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="red"> Red
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="purple"> Purple
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="black"> Black
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="color-checkbox" name="color[]" value="yellow"> Yellow
                                    </div>
                                </div>
                            </div>-->
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mt-3 mt-lg-4">
                                        <h6 class="product-title">Specification</h6>
                                    </div>
                                    <div class="col-lg-6 mt-3 mt-lg-4">
                                        <label class="" id="addRow" for="customFile">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="forelect sim-group">
                                <h6 class="product-title">Size</h6>
                                <label for="sizeType">Select Type:</label>
                                <select class="custom-select form-control" id="sizeType" onchange="toggleSizeOptions()">
                                    <option value="string">String</option>
                                    <option value="numeric">Numeric</option>
                                </select>
                            </div> -->
                            <!-- <div id="stringSizeOptions">
                                <div class="row">
                                    <div class="col-lg-6 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input type="checkbox" id="sizeS" name="size[]" value="S">
                                            <label for="sizeS">Small</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="sizeM" name="size[]" value="M">
                                            <label for="sizeM">Medium</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="sizeL" name="size[]" value="L">
                                            <label for="sizeL">Large</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="sizeXL" name="size[]" value="XL">
                                            <label for="sizeXL">Extra Large</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div id="numericSizeOptions" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input type="checkbox" id="size1" name="size[]" value="1">
                                            <label for="size1">Size 1</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size2" name="size[]" value="2">
                                            <label for="size2">Size 2</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size3" name="size[]" value="3">
                                            <label for="size3">Size 3</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size4" name="size[]" value="4">
                                            <label for="size3">Size 4</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input type="checkbox" id="size5" name="size[]" value="5">
                                            <label for="size1">Size 1</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size6" name="size[]" value="6">
                                            <label for="size2">Size 2</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size7" name="size[]" value="7">
                                            <label for="size3">Size 3</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size8" name="size[]" value="8">
                                            <label for="size3">Size 4</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input type="checkbox" id="size9" name="size[]" value="9">
                                            <label for="size1">Size 1</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size10" name="size[]" value="10">
                                            <label for="size2">Size 2</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size11" name="size[]" value="11">
                                            <label for="size3">Size 3</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size12" name="size[]" value="12">
                                            <label for="size3">Size 4</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-3 mt-lg-4">
                                        <div class="form-group">
                                            <input type="checkbox" id="size13" name="size[]" value="13">
                                            <label for="size1">Size 1</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size14" name="size[]" value="14">
                                            <label for="size2">Size 2</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size15" name="size[]" value="15">
                                            <label for="size3">Size 3</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="size16" name="size[]" value="16">
                                            <label for="size3">Size 4</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span>Stock Status</label>
                                        <select class="custom-select form-control" name="stock_status">
                                            <option value="">--Select--</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-4">
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span>Quantity</label>
                                        <input class="form-control" name="quantity" id="quantity" type="text">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="product_variation" class="col-form-label pt-0"><span>*</span>Product Variation</label>
                                <input class="form-control" name="product_variation" id="product_variation" type="text">
                            </div>
                            <div class="form-group">
                                <label for="shiping" class="col-form-label pt-0"><span>*</span>Shiping Information</label>
                                <input class="form-control" name="shipping_information" id="shipping_information" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Return Policy</label>
                                <textarea rows="5" cols="12" name="return_policy"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-form-label"><span>*</span>
                                    Product Price</label>
                                <input class="form-control" name="product_price" id="product_price" type="text">
                            </div>
                            <div class="form-group">
                                <label for="warranty" class="col-form-label"><span>*</span>
                                    Warranty Information</label>
                                <input class="form-control" name="warranty_information" id="warranty_information" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Description</label>
                                <textarea rows="5" cols="12" name="description"></textarea>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row product-adding">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Product Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><span>*</span>Image only with dimension 232X218 can be uploaded.</p>
                                        <div class="add-product">
                                            <div class="row">
                                                <div class="col-xl-9 xl-50 col-sm-6 col9">
                                                    <div class="col-xl-12">
                                                        <div class="product-slider owl-carousel owl-theme" id="sync1" style="display: block;">
                                                            <div class="item"><img id="imgPreview1" src="../assets/images/default/default.jpg" alt="" class="blur-up lazyloaded" style="width: 104%;height:378px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                    <ul class="file-upload-product">
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]" multiple onchange="previewImage(this, 'imgPreview1');"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]" onchange="previewImage(this, 'imgPreview1');"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]" multiple onchange="previewImage(this, 'imgPreview1');"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]" multiple onchange="previewImage(this, 'imgPreview1');"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]" multiple onchange="previewImage(this, 'imgPreview1');"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                        <li>
                                                            <div class="box-input-file"><input class="upload" type="file" name="image[]"><i class="fa fa-plus"></i></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <h5 for="resume" style="padding-bottom: 5px;">Upload Product Details (PDF only):</h5>
                                        <input type="file" class="form-control" id="productPdf" name="productPdf" accept=".pdf">
                                    </div>
                                    <div class="form-group">
                                        <h5 for="excelFile" style="padding-bottom: 5px;">Choose an Excel file:</h5>
                                        <input type="file" class="form-control" name="excelFile" id="excelFile" accept=".xlsx, .xls">
                                    </div>
                                    <div class="form-group">
                                        <h5 for="pptFile" style="padding-bottom: 5px;">Choose a PowerPoint file (PPT or PPTX):</h5>
                                        <input type="file" class="form-control" name="pptFile" id="pptFile" accept=".ppt, .pptx">
                                    </div>
                                    <div class="form-group">
                                        <h5 for="video" style="padding-bottom: 5px;">Enter Video Url:</h5>
                                        <input type="url" class="form-control" id="video" name="video" placeholder="Enter video url">
                                    </div>
                                    <div class="form-group">
                                        <iframe width="100%" height="150" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="row product-adding">
                                        <div class="col-xl-12">
                                            <div class="add-product">
                                                <!-- <div class="card">
                                                    <div class="card-header">
                                                        <h5>Meta Data</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="digital-add needs-validation">
                                                            <div class="form-group">
                                                                <label for="metadata" class="col-form-label pt-0"> Product SKU</label>
                                                                <input class="form-control" name="sku" id="sku" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Meta Description</label>
                                                                <textarea rows="4" cols="12" name="meta_description"></textarea>
                                                                <div class="form-group mb-0">
                                                                    <div class="product-buttons text-center">
                                                                        <button type="submit" id="submit-button" class="btn btn-primary">Add</button>
                                                                        <button type="button" class="btn btn-light">Discard</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                                                    function updateVideoUrl() {
                                                        const videoUrlInput = document.getElementById('video');
                                                        const videoFrame = document.querySelector('iframe');
                                                        const newVideoUrl = videoUrlInput.value.trim();

                                                        if (newVideoUrl !== '') {
                                                            videoFrame.src = newVideoUrl;
                                                            videoFrame.style.display = 'block';
                                                        } else {
                                                            videoFrame.src = '';
                                                            videoFrame.style.display = 'none';
                                                        }
                                                    }

                                                    document.getElementById('video').addEventListener('input', updateVideoUrl);

                                                    function populateSubcategories(selectedCategory) {
                                                        if (selectedCategory) {
                                                            $.ajax({
                                                                url: '/vendor/get-subcategories/' + selectedCategory,
                                                                type: 'GET',
                                                                success: function(data) {
                                                                    var subcategorySelect = document.getElementById('subcategory_id');
                                                                    subcategorySelect.innerHTML = '<option value="">--Select Sub-Category--</option>';
                                                                    data.forEach(function(subcategory) {
                                                                        var option = document.createElement('option');
                                                                        option.value = subcategory.id;
                                                                        option.textContent = subcategory.sub_category;
                                                                        subcategorySelect.appendChild(option);
                                                                    });
                                                                }
                                                            });
                                                        } else {
                                                            document.getElementById('subcategory_id').innerHTML = '<option value="">--Select Sub-Category--</option>';
                                                        }
                                                    }

                                                    // Call the function on page load with the initial selected category
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var initialCategory = document.getElementById('category_id').value;
                                                        populateSubcategories(initialCategory);
                                                    });

                                                    // Attach the event listener to the category dropdown
                                                    document.getElementById('category_id').addEventListener('change', function() {
                                                        var selectedCategory = this.value;
                                                        populateSubcategories(selectedCategory);
                                                    });

                                                    function toggleSizeOptions() {
                                                        var sizeType = document.getElementById('sizeType').value;
                                                        var stringSizeOptions = document.getElementById('stringSizeOptions');
                                                        var numericSizeOptions = document.getElementById('numericSizeOptions');

                                                        if (sizeType === 'string') {
                                                            stringSizeOptions.style.display = 'block';
                                                            numericSizeOptions.style.display = 'none';
                                                        } else if (sizeType === 'numeric') {
                                                            stringSizeOptions.style.display = 'none';
                                                            numericSizeOptions.style.display = 'block';
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
                                                <script>
                                                    $(document).ready(function() {
                                                        // Function to add a new row
                                                        $("#addRow").on("click", function() {
                                                            var newRow = '<div class="row">' +
                                                                '<div class="col-lg-4 mt-3 mt-lg-4">' +
                                                                '<div class="form-group">' +
                                                                '<input class="form-control" name="size[]" placeholder="Enter size" type="text">' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-4 mt-3 mt-lg-4">' +
                                                                '<div class="form-group">' +
                                                                '<input class="form-control" name="quantity[]" placeholder="Enter Quantity" type="text">' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-4 mt-3 mt-lg-4">' +
                                                                '<div class="form-group">' +
                                                                '<input class="form-control" name="status[]" placeholder="Enter status" type="text">' +
                                                                '</div>' +
                                                                '</div>' +
                                                                '</div>';
                                                            // Append the new row
                                                            $(".container").append(newRow);
                                                        });
                                                    });
                                                </script>
                                                @endsection
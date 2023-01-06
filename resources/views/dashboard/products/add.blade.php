@extends('dashboard.layouts.index')
@php
use App\Models\UserBusinessProfile;
$user_id = Auth::user()->id;
$businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
@endphp
@section('title')
   {{ $businsee_profile->business_name }} | Add Products
@endsection
@section('header')
@include('dashboard.layouts.header')
@endsection
@section('sidebar')
@include('dashboard.layouts.sidebar')
@endsection
@section('page-content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 4px 8px;
    background: #084cdf;
  border-radius: 10px;
  color: #fff;
    cursor: pointer;
}
.image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
    .cropper-container{
      width: auto !important;
    }
    .modal:nth-of-type(even) {
    z-index: 1052 !important;
}
.modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
}
  </style>
     <div class="pagetitle">
       <h1>Add Product</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
           <li class="breadcrumb-item active">Add</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->
 
     <section class="section dashboard">
    

      <div class="card">
         <div class="card-body">
           <h5 class="card-title">Products Details</h5>
                  <form class="row g-3">
                     <div class="col-12">
                       <label for="inputNanme4" class="form-label">Name</label>
                       <input type="text" class="form-control" id="name" name="name" required>
                     </div>

                     <div class="col-6">
                      <label for="Stock" class="form-label">Stock</label>
                      <select class="form-select" aria-label="Default select" id="Stock" name="in_stock">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
        
                      </select>
                     </div>
                     <div class="col-6">
                     </div>
                     <div class="col-md-8 col-6">
                       <label for="inputEmail4" class="form-label">Category</label>
                       <select class="form-select" id="category_id" name="category_id">
                         <option>No items</option>
                       </select>
                
                     </div>
                     <div class="col-md-4 col-6 pt-3">
    
                      <button type="button" class="btn btn-sm btn-primary mt-3" onclick="addCategory()"><i class="bi-plus-circle"></i> Add Category</button>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Quantity</label>
                       <input type="text" class="form-control" id="base_qty" name="base_qty">
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Unit</label>
                       <select class="form-select" id="unit" name="unit">
                        <option value="gm">No items</option>
                      </select>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Original Price</label>
                       <input type="text" class="form-control" id="original_price" name="original_price">
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Discounted Price</label>
                       <input type="text" class="form-control" id="selling_price" name="selling_price">
                     </div>
                     <div class="col-12">
                       <label for="inputAddress" class="form-label">Description</label>
                       <textarea class="form-control"  id="description" name="description" style="height: 100px;"></textarea>
                     </div>
                     <div class="col-12">
                       <span class="form-label mb-2">Image</span><br>
                       <div class="image-preview m-2 p-3">
                         <div class="row" id="image-preview">
                         
                         </div>
                         <label for="file-upload" class="custom-file-upload mt-2">
                            <i class="bi bi-cloud-arrow-up"></i> <span id="upload-btn-txt-1"> Upload Image</span>
                          </label>
                        <input id="file-upload" type="file" accept="image/*"/>
                     </div>
                  
                     <div class="text-center">
                       <button type="submit" class="btn btn-primary">Add</button>
                      
                     </div>
                   </form>
               </div>
 
          </div>
           
       
     </section>
     <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crop Image Before Upload</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-12">
                          <img src="" id="sample_image" />
                      </div>
                      {{-- <div class="col-md-4">
                          <div class="preview"></div>
                      </div> --}}
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <span id="image_upload_button">

              </span>
             
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
      </div>
    </div>	
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" id="categoryForm">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" required>
              </div>
            
              <div class="col-12">
                <span class="form-label mb-2">Image</span><br>
                <div class="row" id="category-preview">
                         
                </div>
                <label for="category_image" class="custom-file-upload mt-2">
                  <i class="bi bi-cloud-arrow-up"></i><span id="upload-btn-txt-2"> Upload Image</span>
                </label>
                <input type="file" class="form-control" id="category_image" accept="image/*">
              </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="add-category-btn" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div><!-- End Vertically centered Modal-->
  {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> --}}
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
     <script>

      $(document).ready(function(){
        loadCategories();
        $('#category_id').select2();
        var $modal = $('#modal');
      
        var image = document.getElementById('sample_image');
      
        var cropper;
      
        $('#file-upload').change(function(event){
          $('#image_upload_button').html(' <button type="button" id="upload_image" class="btn btn-primary">Upload</button>');
        
          var files = event.target.files;
      
          var done = function(url){
            image.src = url;
            $modal.modal('show');
          };
      
          if(files && files.length > 0)
          {
            reader = new FileReader();
            reader.onload = function(event)
            {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
          }
        });

        $('#category_image').change(function(event){
          $('#image_upload_button').html(' <button type="button" id="upload_category_image" class="btn btn-primary">Upload</button>');
        
          var files = event.target.files;
      
          var done = function(url){
            image.src = url;
            $modal.modal('show');
            $('#addCategoryModal').modal('hide');
          };
      
          if(files && files.length > 0)
          {
            reader = new FileReader();
            reader.onload = function(event)
            {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
          }
        });
      
        $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3
          });
        }).on('hidden.bs.modal', function(){
          cropper.destroy();
             cropper = null;
        });

        $(document).on('click', '#upload_category_image', function() { 

          canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
          });
      
          canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
              var base64data = reader.result;
              $.ajax({
                url: "{{route('products.upload.category.image')}}",
                method:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{image:base64data},
                beforeSend: function() {
                  $('#upload_category_image').prop('disabled', true);
                  $('#upload_category_image').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                },
                complete: function() {
                  $('#upload_category_image').prop('disabled', false);
                  $('#upload_category_image').html('Upload');
                },
                success:function(data)
                {
                  if(data.success){
                    $modal.modal('hide');
                    $('#addCategoryModal').modal('show');
                    $('#category-preview').html('<div class="col-md-3 col-6"><img id="theImg" style="border-radius: 5px;max-width: 100px;" src="'+data.file_name+'" /></div>');
                    $('#category-preview').append('<input type="hidden" id="category-image" name="category-image" value="'+data.file_name+'" />');
                    $('upload-btn-txt-2').text("Change Image");
                  }
                  else{
                    alert(data.message);
                  }
                
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                }
                
              });
            };
          });
         });
       
         $(document).on('click', '#upload_image', function() { 
          console.log('product');
          canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
          });
      
          canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
              var base64data = reader.result;
              $.ajax({
                url: "{{route('products.upload.image')}}",
                method:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{image:base64data},
                beforeSend: function() {
                  $('#upload_image').prop('disabled', true);
                  $('#upload_image').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                },
                complete: function() {
                  $('#upload_image').prop('disabled', false);
                  $('#upload_image').html('Upload');
                },
                success:function(data)
                {
                  if(data.success){
                    $modal.modal('hide');
                    $('#image-preview').append('<div class="col-md-3 col-6"><img id="theImg" style="border-radius: 5px;max-width: 100px;" src="'+data.file_name+'" /></div>');
                    $('#image-preview').append('<input type="hidden"name="images[]" value="'+data.file_name+'" />');
                    $('upload-btn-txt-1').html('Upload More Images');
                  }
                  else{
                    alert(data.message);
                  }
                
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                }
                
              });
            };
          });
        });
        
      });

      function loadCategories(){
        $.ajax({
                url: "{{route('products.get.categories')}}",
                method:'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data)
                {
                  if(data.success){
                    $("#category_id").html('');
                    $.each(data.categories, function(key,value){
                      $("#category_id").append(new Option(value.name, value.id, true, true));
                    });
                  }
                
                }
                
              });
      }
    
        function addCategory(){
          $('#addCategoryModal').modal('show');
        }
        $('#add-category-btn').click(function (){
          var cat_name = $('#category_name').val();
          var image = $('#category-image').val();
          if(cat_name == ''){
            alert("name require");
          }
          else if (image == '' || image == null){
            alert("image is require");
          }
          else{
            $.ajax({
                url: "{{route('products.add.category')}}",
                method:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{image: image, name: cat_name},
                beforeSend: function() {
                  $('#add-category-btn').prop('disabled', true);
                  $('#add-category-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                },
                complete: function() {
                  $('#add-category-btn').prop('disabled', false);
                  $('#add-category-btn').html('Upload');
                },
                success:function(data)
                {
                  if(data.success){
                    loadCategories();
                    $('#addCategoryModal').modal('hide');
                  }
                  else{
                    alert(data.message);
                  }
                
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                }
                
              });
          }
        });
        </script>
@endsection

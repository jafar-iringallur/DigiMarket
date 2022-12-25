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
                       <label for="inputNanme4" class="form-label">Your Name</label>
                       <input type="text" class="form-control" id="inputNanme4">
                     </div>
                     <div class="col-12">
                       <label for="inputEmail4" class="form-label">Email</label>
                       <input type="email" class="form-control" id="inputEmail4">
                     </div>
                     <div class="col-12">
                       <label for="inputPassword4" class="form-label">Password</label>
                       <input type="password" class="form-control" id="inputPassword4">
                     </div>
                     <div class="col-12">
                       <label for="inputAddress" class="form-label">Address</label>
                       <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                     </div>
                     <div class="col-12">
                       <span class="form-label mb-2">Image</span><br>
                  
                       <div class="image-preview m-2 p-3">
                         <div class="row" id="image-preview">
                         
                         </div>
                      
                      <label for="file-upload" class="custom-file-upload">
                        <i class="bi bi-cloud-arrow-up"></i> Upload Image
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
     <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
              <button type="button" id="crop" class="btn btn-primary">Upload</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
      </div>
    </div>	
    
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
     <script>

      $(document).ready(function(){
      
        var $modal = $('#modal');
      
        var image = document.getElementById('sample_image');
      
        var cropper;
      
        $('#file-upload').change(function(event){
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
      
        $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3
          });
        }).on('hidden.bs.modal', function(){
          cropper.destroy();
             cropper = null;
        });
      
        $('#crop').click(function(){
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
                success:function(data)
                {
                  if(data.success){
                    $modal.modal('hide');
                    $('#image-preview').prepend('<div class="col-md-3 col-6"><img id="theImg" style="border-radius: 5px;max-width: 60px;" src="'+data.file_name+'" /></div>');
                    $('#image-preview').append('<input type="hidden"name="images[]" value="'+data.file_name+'" />');
                  }
                  else{
                    alert(data.message);
                  }
                
                }
                
              });
            };
          });
        });
        
      });
      </script>
  
@endsection

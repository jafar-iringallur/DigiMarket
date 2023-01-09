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
@include('dashboard.products.add-js')
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
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}

#size_varient{
  padding: 0.5vh;
}
#size_varient::placeholder {
    font: 1.5vh sans-serif;
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
                  <form class="row g-3" method="Post" action="{{route('product.save')}}">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger" style="font-size: 14px">
                      {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                    @endif
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
                       <select class="form-select" id="category_id" name="category_id" required>
                         <option>No items</option>
                       </select>
                
                     </div>
                     <div class="col-md-4 col-6 pt-3">
    
                      <button type="button" class="btn btn-sm btn-primary mt-3" onclick="addCategory()"><i class="bi-plus-circle"></i> Add Category</button>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Quantity</label>
                       <input type="text" class="form-control" id="base_qty" name="base_qty" value="1" required>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Unit</label>
                       <select class="form-select" id="unit_sel" name="unit" required>
                        <option value="piece" selected>piece</option>
                        <option value="kg">kg</option>
                        <option value="gm">gm</option>
                        <option value="ml">ml</option>
                        <option value="litre">litre</option>
                        <option value="mm">mm</option>
                        <option value="ft">ft</option>
                        <option value="meter">meter</option>
                        <option value="sq.ft">sq.ft</option>
                        <option value="sq.meter">sq.meter</option>
                        <option value="km">km</option>
                        <option value="set">set</option>
                        <option value="hour">hour</option>
                        <option value="day">day</option>
                        <option value="bunch">bunch</option>
                        <option value="bundle">bundle</option>
                        <option value="month">month</option>
                        <option value="year">year</option>
                        <option value="service">service</option>
                        <option value="work">work</option>
                        <option value="packet">packet</option>
                        <option value="box">box</option>
                        <option value="pound">pound</option>
                        <option value="dozen">dozen</option>
                        <option value="gunta">gunta</option>
                        <option value="pair">pair</option>
                        <option value="minute">minute</option>
                        <option value="quintal">quintal</option>
                        <option value="ton">ton</option>
                        <option value="capsule">capsule</option>
                        <option value="tablet">tablet</option>
                        <option value="plate">plate</option>
                        <option value="inch">inch</option>
                        <option value="ounce">ounce</option>
                        <option value="bottle">bottle</option>
                        <option value="night">night</option>
                        <option value="tour">tour</option>
                      </select>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Original Price</label>
                       <input type="number" class="form-control" id="original_price" name="original_price" required>
                     </div>
                     <div class="col-6">
                       <label for="inputPassword4" class="form-label">Discounted Price</label>
                       <input type="number" class="form-control" id="selling_price" name="selling_price">
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
                     </div>
                     <div class="col-12">
                      <span class="form-label mb-2">Size Varients</span>  
                     <br>
                      <table class="table table-borderless" style="margin-bottom: 0px !important" id="size_variant_table">
                     
                        <tr>
                              <td><input type="text" class="form-control" id="size_varient" name="size_varient[0]['size']" placeholder="Size"></td>
                              <td><input type="number" class="form-control" id="size_varient" name="size_varient[0]['original_price']" placeholder="Original Price"></td>
                              <td><input type="number" class="form-control" id="size_varient" name="size_varient[0]['selling_price']" placeholder="Discout Price"></td>
                        </tr>
                      
                        
                      </table>
                      <button type="button" class="btn btn-sm btn-success" onclick="newVarient()" style="position: absolute;right: 0;margin-right: 15px;padding: 1px 3px;margin-bottom: 10px"><i class="bi-plus-circle"></i> Add more</button><br>
                     </div>
                     <div class="text-center">
                       <button type="submit" class="btn btn-primary" style="width: 90%">Add Product</button>
                      
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
              <div class="col-md-8 col-8">
                <label for="inputNanme4" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" required>
              </div>
              <div class="col-md-4 col-4 pt-3">
                <button type="button" id="find-icon-btn" class="btn btn-sm btn-primary mt-3" onclick="findIcons()"><i class="bi-search"></i> Find Icons</button>
              </div>
              <div class="col-12">
                <span class="form-label mb-2">Select a Icon</span><br>
                <div class="row" id="category-icon-preview">
                  <input type="radio" name="cat_icon" value="" style="display: none" checked>
                       <p style="font-size: 12px">Icon Not found</p> 
                </div>
              </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="add-category-btn" onclick="submitCategory()" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div><!-- End Vertically centered Modal-->
  {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> --}}
 
@endsection

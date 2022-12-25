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
                     <div class="text-center">
                       <button type="submit" class="btn btn-primary">Add</button>
                      
                     </div>
                   </form>
               </div>
 
          </div>
           
       
     </section>
 
 
  
@endsection

@extends('dashboard.layouts.index')
@php
use App\Models\UserBusinessProfile;
$user_id = Auth::user()->id;
$businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
@endphp
@section('title')
   {{ $businsee_profile->business_name }} | Orders
@endsection
@section('header')
@include('dashboard.layouts.header')
@endsection
@section('sidebar')
@include('dashboard.layouts.sidebar')
@endsection
@section('page-content')
<style>
.dashboard .activity .activity-item .activite-label {
   min-width: 0px;
}
   </style>
<div class="pagetitle">
   <h1>Order Id  # 12334</h1>
   <nav>
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
       <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Orders</a></li>
       <li class="breadcrumb-item active">121</li>
     </ol>
   </nav>
 </div><!-- End Page Title -->
<section class="section dashboard">
   <div class="row">

     <!-- Left side columns -->
     <div class="col-lg-8">
        
      <div class="card top-selling overflow-auto">

         <div class="filter" style="padding-right: 1rem">
            <span class="badge bg-success">Delivered</span>
         </div>

         <div class="card-body">
           <h5 class="card-title">Items <br>
            {{-- <span> 26/12/2022 10:30 am</span> --}}
           </h5>
           {{-- <hr style="margin: 0px">
           <h5 class="card-title" style="padding: 5px">Items <br></h5> --}}
            <table class="table table-borderless">
               <thead>
                 <tr>
                   <th scope="col">Preview</th>
                   <th scope="col">Product</th>
                   <th scope="col">Size</th>
                   <th scope="col">Qty</th>
                   <th scope="col">Price</th>
                   <th scope="col">Total</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <th scope="row"><a href="#"><img src="{{asset('dashboard/img/product-1.jpg')}}" alt=""></a></th>
                   <td><span class="text-primary fw-bold">Ut inventore ipsa voluptas </span></td>
                   <td>15</td>
                   <td class="fw-bold">2</td>
                   <td>50</td>
                   <td>
                   <span class="text-success fw-bold">100</span>
                   </td>
                 </tr>
                 <tr>
                   <th scope="row"><a href="#"><img src="{{asset('dashboard/img/product-2.jpg')}}" alt=""></a></th>
                   <td><span class="text-primary fw-bold">Ut inventore sds voluptas </span></td>
                   <td>15</td>
                   <td class="fw-bold">1</td>
                   <td>30</td>
                   <td>
                   <span class="text-success fw-bold">30</span>
                   </td>
                 </tr>
              
                 <tr style="border-top: 1px solid #899bbd;font-size:16px">
                    <th colspan="5">Grand Total :</th>
                    <th><span class="text-success fw-bold">130</span></th>
                 </tr>
               </tbody>
             </table>
         </div>

      </div>
      <div class="card top-selling overflow-auto">
        <div class="card-body">
          <h5 class="card-title">Customer Details </h5>

          <div class="row">
            <div class="col-lg-3 col-md-4 label ">Name</div>
            <div class="col-lg-9 col-md-8">Kevin Anderson</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Mobile</div>
            <div class="col-lg-9 col-md-8">1234567890</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Address</div>
            <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Place</div>
            <div class="col-lg-9 col-md-8">iringallur</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">City</div>
            <div class="col-lg-9 col-md-8">Vengara</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">District</div>
            <div class="col-lg-9 col-md-8">Malappuram</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Pin</div>
            <div class="col-lg-9 col-md-8">676304</div>
          </div>
        </div>

      </div>
     </div>
     <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
        
          <div class="card-body">
            <h5 class="card-title">Activity </h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label"></div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                    <span class="fw-bold text-dark">Delivered</span><br>
                    <span style="color: #899bbd">26/12/2026 10:30 am</span>
                </div>
              </div><!-- End activity item-->


              <div class="activity-item d-flex">
                <div class="activite-label"></div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                    <span class="fw-bold text-dark">Order Shipped</span><br>
                    <span style="color: #899bbd">26/12/2026 10:30 am</span>
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label"></div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                    <span class="fw-bold text-dark">Order Accepted</span><br>
                    <span style="color: #899bbd">26/12/2026 10:30 am</span>
                </div>
              </div><!-- End activity item-->

          

              <div class="activity-item d-flex">
                <div class="activite-label"></div>
                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                <div class="activity-content">
                    <span class="fw-bold text-dark">Order Received</span><br>
                    <span style="color: #899bbd">26/12/2026 10:30 am</span>
                </div>
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->

        <div class="card">
        
          <div class="card-body">
            <h5 class="card-title">Payment </h5>

          </div>

        </div>
   </div>

   </div>

</section>
@endsection

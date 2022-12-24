@extends('dashboard.layouts.index')
@php
use App\Models\UserBusinessProfile;
$user_id = Auth::user()->id;
$businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
@endphp
@section('title')
   {{ $businsee_profile->business_name }} | Products
@endsection
@section('header')
@include('dashboard.layouts.header')
@endsection
@section('sidebar')
@include('dashboard.layouts.sidebar')
@endsection
@section('page-content')
@include('dashboard.products.index-content')
@endsection

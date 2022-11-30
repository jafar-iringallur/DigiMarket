

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


  <title>Getting Startted | Botire </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
  
<style>
@charset "UTF-8";
/*font Variables*/
/*Color Variables*/
@import url("https://fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,700,900");
.multi_step_form {
  background: #f6f9fb;
  display: block;
  overflow: hidden;
}
.multi_step_form #msform {
  text-align: center;
  position: relative;
  padding-top: 50px;
  min-height: 820px;
  max-width: 810px;
  margin: 0 auto;
  background: #ffffff;
  z-index: 1;
}
.multi_step_form #msform .tittle {
  text-align: center;
  /* padding-bottom: 55px; */
}
.multi_step_form #msform .tittle h2 {
  font: 500 24px/35px "Roboto", sans-serif;
  color: #6100a5;
  padding-bottom: 5px;
}
.multi_step_form #msform .tittle p {
  font: 400 16px/28px "Roboto", sans-serif;
  color: #5f6771;
}
.multi_step_form #msform fieldset {
  border: 0;
  padding: 20px 105px 0;
  position: relative;
  width: 100%;
  left: 0;
  right: 0;
}
.multi_step_form #msform fieldset:not(:first-of-type) {
  display: none;
}
.multi_step_form #msform .sub-head {
  font: 500 18px/35px "Roboto", sans-serif;
  color: #6100a5;
}
.multi_step_form #msform fieldset h6 {
  font: 400 15px/28px "Roboto", sans-serif;
  color: #5f6771;
  padding-bottom: 30px;
}
.multi_step_form #msform fieldset .intl-tel-input {
  display: block;
  background: transparent;
  border: 0;
  box-shadow: none;
  outline: none;
}
.multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag {
  padding: 0 20px;
  background: transparent;
  border: 0;
  box-shadow: none;
  outline: none;
  width: 65px;
}
.multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow {
  border: 0;
}
.multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow:after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  font: normal normal normal 24px/7px Ionicons;
  color: #5f6771;
}
.multi_step_form #msform fieldset #phone {
  padding-left: 80px;
}
.multi_step_form #msform fieldset .form-group {
  padding: 0 10px;
}
.multi_step_form #msform fieldset .fg_2, .multi_step_form #msform fieldset .fg_3 {
  padding-top: 10px;
  display: block;
  overflow: hidden;
}
.multi_step_form #msform fieldset .fg_3 {
  padding-bottom: 70px;
}
.multi_step_form #msform fieldset .form-control, .multi_step_form #msform fieldset .product_select {
  border-radius: 3px;
  border: 1px solid #d8e1e7;
  padding: 0 20px;
  height: auto;
  font: 400 15px/48px "Roboto", sans-serif;
  color: #5f6771;
  box-shadow: none;
  outline: none;
  width: 100%;
}
.multi-steps > li.is-active:before, .multi-steps > li.is-active ~ li:before {
	 content: counter(stepNum);
	 font-family: inherit;
	 font-weight: 700;
}
 .multi-steps > li.is-active:after, .multi-steps > li.is-active ~ li:after {
	 background-color: #ededed;
}
 .multi-steps {
	 display: table;
	 table-layout: fixed;
	 width: 100%;
     font-size:1.5vh;
}
 .multi-steps > li {
	 counter-increment: stepNum;
	 text-align: center;
	 display: table-cell;
	 position: relative;
	 color: #ed0677;
}
 .multi-steps > li:before {
	 content: '\f00c';
	 content: '\2713';
	 content: '\10003';
	 content: '\10004';
	 content: '\2713';
	 display: block;
	 margin: 0 auto 4px;
	 background-color: #fff;
	 width: 36px;
	 height: 36px;
	 line-height: 32px;
	 text-align: center;
	 font-weight: bold;
	 border-width: 2px;
	 border-style: solid;
	 border-color: #ed0677;
	 border-radius: 50%;
}
 .multi-steps > li:after {
	 content: '';
	 height: 2px;
	 width: 100%;
	 background-color: #ed0677;
	 position: absolute;
	 top: 16px;
	 left: 50%;
	 z-index: -1;
}
 .multi-steps > li:last-child:after {
	 display: none;
}
 .multi-steps > li.is-active:before {
	 background-color: #fff;
	 border-color: #ed0677;
}
 .multi-steps > li.is-active ~ li {
	 color: #808080;
}
 .multi-steps > li.is-active ~ li:before {
	 background-color: #ededed;
	 border-color: #ededed;
}
 
</style>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body translate="no" >
  <!-- Multi step form --> 
<section class="multi_step_form p-2">  
  <div id="msform"> 
    <!-- Tittle -->
    <div class="tittle">
      <h2>Get Started</h2>
      <p>In order to use this service, you have to complete this process</p>
    </div>
    <!-- progressbar -->
    <div class="container-fluid">
        <ul class="list-unstyled multi-steps">
          <li class="is-active">Verify Email</li>
       
          <li>Add Business Info</li>
          <li>Add Product</li>
        </ul>
      </div>
    <!-- fieldsets -->
   <center>
    <div class="col-md-6 shadow p-3 mb-5 bg-white rounded" style="background-color: white">
        <h3 class="sub-head">Verify your email</h3>
        <p style="font-size: 16px">Please click the verification button in the email we sent to <span class="text-success"> {{ auth()->user()->email }} </span>. This helps keep your account secure.
           <br><br>
           <span style="font-size: 14px;color: #5f6771;"> No email in your inbox or spam folder? Let's resend it.<br>
           Wrong address? Log out to sign in with a different email<br>
           If you mistyped your email when signing up, create a new account.</span></p>
    </div>
   </center>
</div>  
</section> 
<!-- End Multi step form -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
   

</body>

</html>
 

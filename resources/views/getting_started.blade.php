

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


  <title>Getting Startted | Botire </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>

<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
  
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
  text-align: center;
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
  content: "???";
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
     font-size:1.7vh;
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
#public_url:focus{
    outline: none;
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
            @if($status == 1)
          <li class="is-active">Verify Email</li>
          <li>Add Business Info</li>
          <li>Confirm Url</li>
          @elseif ($status == 2)
          <li>Verify Email</li>
          <li class="is-active">Add Business Info</li>
          <li>Confirm Url</li>
          @else
          <li>Verify Email</li>
          <li>Add Business Info</li>
          <li class="is-active">Confirm Url</li>
          @endif
        </ul>
      </div>
    <!-- fieldsets -->
  <section class="d-flex align-items-center justify-content-center">
    @if($status == 1)
    <div class="col-md-6 shadow p-3 mb-5 bg-white rounded" style="background-color: white">
    
        <h3 class="sub-head">Verify your email</h3>
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ __('A verification link has been sent to your email address.') }}
        </div>
        @endif
        <p style="font-size: 16px">Please click the verification button in the email we sent to <span class="text-success"> {{ auth()->user()->email }} </span>. This helps keep your account secure.
           <br><br>
           
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <span style="font-size: 12px;color: #5f6771;"> No email in your inbox or spam folder? </span>
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size:13px;"> Resend Link</button>.
          </form>
          <span style="font-size: 12px;color: #5f6771;">
           Wrong address? <a href="{{route('logout')}}">Log out </a> to sign in with a different email,
           If you mistyped your email when signing up, create a new account.</span></p>
    </div>
    @elseif ($status == 2)
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded" style="background-color: white">
        <h3 class="sub-head">Add Your Business Info</h3>
        <form method="Post" action="{{route('save.business')}}" enctype="multipart/form-data">
          @csrf
          @if($errors->any())
          <div class="alert alert-danger" style="font-size: 14px">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
          </div>
          @endif
              <div class="form-group">
                <label for="inputEmail4">Company Name</label>
                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Your Company Name" required>
              </div>
              <div class="form-group">
                <label for="inputPassword4">Address</label>
                <input type="text" class="form-control" id="business_address_line_1" name="business_address_line_1" placeholder="Company Address" required>
              </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Place</label>
              <input type="text" class="form-control" id="business_place" name="business_place" placeholder="Place" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">City</label>
              <input type="text" class="form-control" id="business_city" name="business_city" placeholder="City" required>
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <select id="business_state" name="business_state" class="form-control" required>
                        @foreach($states as $state)
                        @if($state->id == 10 )
                        <option value={{$state->id}} selected>{{$state->name}}</option>
                        @else
                        <option value={{$state->id}}>{{$state->name}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
              <div class="form-group col-md-6">
                <label for="inputCity">District</label>
                <select id="business_district" name="business_district" class="form-control" required>
                    <option selected>--Select a District--</option>
                    @foreach($cities as $city)
                    <option value={{$city->id}}>{{$city->city}}</option>
                    @endforeach
                </select>
              </div>
             
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Zip</label>
                    <input type="number" class="form-control" id="business_zip" name="business_zip" placeholder="Zip" required>
                  </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Email</label>
                    <input type="email" class="form-control" id="business_email" name="business_email" placeholder="Email" required>
                  </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Phone</label>
                    <input type="number" class="form-control" id="business_phone" name="business_phone" placeholder="Phone" required>
                  </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">WhatsApp</label>
                    <input type="number" class="form-control" id="business_whatsapp" name="business_whatsapp" placeholder="Whatsapp Number" required>
                  </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Entity Type</label>
                  <select id="entity_type" name="entity_type" class="form-control" required>
                    <option selected>--Choose a entity--</option>
                    @foreach($entity_types as $key => $value)
                    <option value={{$key}}>{{$value}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Industry</label>
                  <select id="industry_type" name="industry_type" class="form-control" required>
                    <option selected>--Choose a industry--</option>
                    @foreach($industries as $key => $value)
                    <option value={{$key}}>{{$value}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword4">Logo</label>
                <input type="file" class="form-control" id="business_logo" name="business_logo" accept="image/*">
                <input type="hidden" class="form-control" id="business_logo_file" name="business_logo_file">
              </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    @else
    <div class="col-md-8 shadow p-3 mb-5 bg-white rounded" style="background-color: white">
      <h3 class="sub-head">Confirm Your Public Url</h3>
      <form method="POST" action="{{route('save.url')}}">
         @csrf
         @if($errors->any())
         <div class="alert alert-danger" style="font-size: 14px">
           {!! implode('', $errors->all('<div>:message</div>')) !!}
         </div>
         @endif
            <div class="form-group">
              <label for="inputEmail4">Public Url <span class="text text-success" style="font-size: 12px" id="url_status">Availiable</span></label>
              <div class="row">
                <div class="col-md-8 d-flex justify-content-between mb-2">
                  <p class="" style="padding-left: 9px; border-color: red;margin: 0;line-height: 44px; border: 1px solid #ced4da !important;border-right: transparent !important;color: #ababb3;">{{ env('PUBLIC_URL') }}</p>
                 
                  <input type="text" value="{{$public_url}}" autofocus="autofocus" id="public_url" name="public_url" maxlength="26" size="50" 
                  style=" padding-right: 23px !important;    width: 100%;border: 1px solid #ced4da !important;border-left: white !important;margin: 0 !important" required>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary mb-2" id="url_confirm_btn">Confirm</button>
                </div>
              </div>
       
            
            </div>

      </form>
    </div>
    @endif
  </section>
</div>  
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crop Image Before Upload</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
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
</section> 
<!-- End Multi step form -->

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
  
    $('#business_logo').change(function(event){
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
            url: "{{route('upload.logo')}}",
            method:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{business_logo:base64data},
            success:function(data)
            {
              if(data.success){
                $modal.modal('hide');
                $('#uploaded_image').attr('src', data);
                $('#business_logo_file').val(data.file_name);
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
  <script>
  $('#business_state').on('change', function() {
    $("#business_district option").remove(); 
   var state = $('#business_state').val();
    $.ajax({
        type: "GET",
        url: "{{route('get.city')}}",
        data: { state : state},
        dataType: "json",
        success: function(data) {
         if(data.success){
            $('#business_district').append($('<option/>', { 
                    text : "--Select a district--"
            }));
            $.each(data.data, function (index, value) {
                $('#business_district').append($('<option/>', { 
                    value: value['id'],
                    text : value['city']
                }));
            });     
         }
        }
        });
    });

    $('#public_url').keyup(function(){
      $('#url_status').text('Not available');
      $('#url_status').removeClass("text-success");
      $('#url_status').addClass("text-danger");
      $('#url_confirm_btn').prop('disabled', true);
      var keyword =  $('#public_url').val();
      $.ajax({
        type: "GET",
        url: "{{route('check.url')}}",
        data: { keyword : keyword},
        dataType: "json",
        success: function(data) {
         if(data.success){
          $('#url_status').text('Available');
          $('#url_status').removeClass("text-danger");
          $('#url_status').addClass("text-success");
          $('#url_confirm_btn').prop('disabled', false);
         }
         else{
         
         }
        }
        });
    });
  
  </script>

</body>

</html>
 

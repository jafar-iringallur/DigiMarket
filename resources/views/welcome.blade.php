<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" rel="stylesheet">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" rel="stylesheet">

        <style>
           $roboto: 'Roboto', sans-serif; 
/*Color Variables*/ 
$bc: #5cb85c;
$heding: #405867; 
$pfont: #5f6771;

// Mixins
@mixin transition($property: all, $duration: 300ms, $animate: linear, $delay:0s){
    transition: $property $duration $animate $delay; 
}  

// Placeholder Mixins
@mixin placeholder {
    &.placeholder { @content; }
    &:-moz-placeholder { @content; }
    &::-moz-placeholder { @content; }
    &::-webkit-input-placeholder { @content; }
}

// Font family link
@import url('https://fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,700,900');

.multi_step_form{
    background: #f6f9fb;
    display: block;
    overflow: hidden;
    #msform {
        text-align: center;
        position: relative;
        padding-top: 50px;
        min-height: 820px;  
        max-width: 810px;
        margin: 0 auto;
        background: #ffffff;
        z-index: 1; 
        .tittle{
            text-align: center;
            padding-bottom: 55px;
            h2{
                font: 500 24px/35px $roboto;
                color: #3f4553;
                padding-bottom: 5px;
            }
            p{
                font: 400 16px/28px $roboto;
                color: $pfont;
            }
        }
        fieldset { 
            border: 0; 
            padding: 20px 105px 0;  
            position: relative;
            width: 100%;
            left: 0;
            right: 0;
            &:not(:first-of-type) {
                display: none;
            }
            h3{
                font: 500 18px/35px $roboto;
                color: #3f4553; 
            }
            h6{
                font: 400 15px/28px $roboto;
                color: $pfont;
                padding-bottom: 30px;
            }
            .intl-tel-input{
                display: block;
                background: transparent;
                border: 0;
                box-shadow: none;
                outline: none;
                .flag-container{
                    .selected-flag{
                        padding:0 20px; 
                        background: transparent;
                        border: 0;
                        box-shadow: none;
                        outline: none;
                        width: 65px;
                        .iti-arrow{
                            border: 0; 
                            &:after{ 
                                content: "\f35f";
                                position: absolute;
                                top: 0;
                                right: 0;
                                font: normal normal normal 24px/7px Ionicons;
                                color: $pfont;
                            }
                        }
                    }
                } 
            }
            #phone{
                padding-left: 80px;
            }
            .form-group{
                padding: 0 10px;
            }
            .fg_2, .fg_3{
                padding-top: 10px;
                display: block;
                overflow: hidden;
            }
            .fg_3{
                padding-bottom: 70px;
            }
            .form-control, .product_select{
                border-radius: 3px;
                border: 1px solid #d8e1e7;
                padding: 0 20px;
                height: auto;
                font: 400 15px/48px $roboto;
                color: $pfont;
                box-shadow: none;
                outline: none;
                width: 100%;
                @include placeholder{
                    color: $pfont;
                } 
                &:hover, &:focus{
                    border-color: $bc;
                }
                &:focus{  
                    @include placeholder{
                        color: transparent;
                    }
                }
            } 
            .product_select{ 
                &:after{
                    display: none;
                }
                &:before{
                    content: "\f35f";
                    position: absolute;
                    top: 0;
                    right: 20px;
                    font: normal normal normal 24px/48px Ionicons;
                    color: $pfont;
                }
                .list{
                    width: 100%;
                }
            }
            .done_text{ 
                padding-top: 40px;
                .don_icon{
                    height: 36px;
                    width: 36px;
                    line-height: 36px;
                    font-size: 22px;
                    margin-bottom: 10px;
                    background: $bc;
                    display: inline-block;
                    border-radius: 50%;
                    color: #ffffff;
                    text-align: center;
                }
                h6{
                    line-height: 23px;
                }
            }
            .code_group{
                margin-bottom: 60px;
                .form-control{
                    border: 0;
                    border-bottom: 1px solid #a1a7ac;
                    border-radius: 0;
                    display: inline-block;
                    width: 30px;
                    font-size: 30px;
                    color: $pfont;
                    padding: 0;
                    margin-right: 7px;
                    text-align: center;
                    line-height: 1;
                }
            } 
            
            .passport{
                margin-top: -10px;
                padding-bottom: 30px;
                position: relative;
                .don_icon{
                    height: 36px;
                    width: 36px;
                    line-height: 36px;
                    font-size: 22px; 
                    position: absolute;
                    top: 4px;
                    right: 0; 
                    background: $bc;
                    display: inline-block;
                    border-radius: 50%;
                    color: #ffffff;
                    text-align: center;
                }
                h4{
                    font: 500 15px/23px $roboto;
                    color: $pfont;
                    padding: 0;
                }
            }
            .input-group{
                padding-bottom: 40px;
                .custom-file{
                    width: 100%;
                    height: auto;
                    .custom-file-label{ 
                        width: 168px;   
                        border-radius: 5px;
                        cursor: pointer;  
                        font: 700 14px/40px $roboto;
                        border: 1px solid #99a2a8; 
                        text-align: center;
                        @include transition;
                        color: $pfont;
                        i{
                            font-size: 20px;
                            padding-right: 10px;
                        }
                        &:hover, &:focus{
                            background: $bc;
                            border-color: $bc;
                            color: #fff;
                        }
                    }
                    input{
                        display: none;
                    }
                }
            }
            .file_added{
                text-align: left;
                padding-left: 190px;
                padding-bottom: 60px;
                li{
                    font: 400 15px/28px $roboto;
                    color: $pfont;
                    a{
                        color: $bc;
                        font-weight: 500;
                        display: inline-block;
                        position: relative;
                        padding-left: 15px;
                        i{
                            font-size: 22px;
                            padding-right: 8px;
                            position: absolute;
                            left: 0;
                            transform: rotate(20deg);
                        }
                    }
                }
            }
        }
        
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;  
            li {
                list-style-type: none;
                color: #99a2a8; 
                font-size: 9px;
                width: calc(100%/3);
                float: left;
                position: relative; 
                font: 500 13px/1 $roboto; 
                &:nth-child(2){
                    &:before{
                        content: "\f12f";
                    }
                }
                &:nth-child(3){
                    &:before{
                        content: "\f457";
                    }
                }
                &:before {
                    content: "\f1fa";
                    font: normal normal normal 30px/50px Ionicons;
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                    display: block; 
                    background: #eaf0f4;
                    border-radius: 50%;
                    margin: 0 auto 10px auto;
                } 
                &:after {
                    content: '';
                    width: 100%;
                    height: 10px;
                    background: #eaf0f4;
                    position: absolute;
                    left: -50%;
                    top: 21px;
                    z-index: -1; 
                } 
                &:last-child{
                    &:after{
                        width: 150%;
                    }
                }
                &.active{
                    color: $bc;
                    &:before, &:after{
                        background: $bc;
                        color: white;
                    }
                }
            }
        } 
        .action-button { 
            background: $bc; 
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer; 
            min-width: 130px;
            font: 700 14px/40px $roboto;
            border: 1px solid $bc;
            margin: 0 5px;
            text-transform: uppercase; 
            display: inline-block;
            &:hover, &:focus{
                background: $heding;
                border-color: $heding;
            }
        }
        .previous_button {
            background: transparent;
            color: #99a2a8;
            border-color: #99a2a8;
            &:hover, &:focus{
                background: $heding;
                border-color: $heding;
                color: #fff;
            }
        } 
    } 
}
        </style>
    </head>
    <body class="antialiased">
       <!-- Multi step form --> 
<section class="multi_step_form">  
    <form id="msform"> 
      <!-- Tittle -->
      <div class="tittle">
        <h2>Verification Process</h2>
        <p>In order to use this service, you have to complete this verification process</p>
      </div>
      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active">Verify Phone</li>  
        <li>Upload Documents</li> 
        <li>Security Questions</li>
      </ul>
      <!-- fieldsets -->
      <fieldset>
        <h3>Setup your phone</h3>
        <h6>We will send you a SMS. Input the code to verify.</h6> 
        <div class="form-row"> 
          <div class="form-group col-md-6">  
            <input type="tel" id="phone" class="form-control" placeholder="+880"> 
          </div>  
          <div class="form-group col-md-6"> 
            <input type="text" class="form-control" placeholder="1123456789">
          </div> 
        </div> 
        <div class="done_text"> 
          <a href="#" class="don_icon"><i class="ion-android-done"></i></a> 
          <h6>A secret code is sent to your phone. <br>Please enter it here.</h6> 
        </div>  
        <div class="code_group"> 
          <input type="text" class="form-control" placeholder="0">
          <input type="text" class="form-control" placeholder="0">
          <input type="text" class="form-control" placeholder="0">
          <input type="text" class="form-control" placeholder="0">
        </div>  
        <button type="button" class="action-button previous_button">Back</button>
        <button type="button" class="next action-button">Continue</button>  
      </fieldset>
      <fieldset>
        <h3>Verify Your Identity</h3>
        <h6>Please upload any of these documents to verify your Identity.</h6>
        <div class="passport">
          <h4>Govt. ID card <br>PassPort <br>Driving License.</h4> 
          <a href="#" class="don_icon"><i class="ion-android-done"></i></a> 
        </div>
        <div class="input-group"> 
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="upload">
            <label class="custom-file-label" for="upload"><i class="ion-android-cloud-outline"></i>Choose file</label>
          </div>
        </div>
        <ul class="file_added">
          <li>File Added:</li>
          <li><a href="#"><i class="ion-paperclip"></i>national_id_card.png</a></li>
          <li><a href="#"><i class="ion-paperclip"></i>national_id_card_back.png</a></li>
        </ul>
        <button type="button" class="action-button previous previous_button">Back</button>
        <button type="button" class="next action-button">Continue</button>  
      </fieldset>  
      <fieldset>
        <h3>Create Security Questions</h3>
        <h6>Please update your account with security questions</h6> 
        <div class="form-group"> 
          <select class="product_select">
            <option data-display="1. Choose A Question">1. Choose A Question</option> 
            <option>2. Choose A Question</option>
            <option>3. Choose A Question</option> 
          </select>
        </div> 
        <div class="form-group fg_2"> 
          <input type="text" class="form-control" placeholder="Anwser here:">
        </div> 
        <div class="form-group"> 
          <select class="product_select">
            <option data-display="1. Choose A Question">1. Choose A Question</option> 
            <option>2. Choose A Question</option>
            <option>3. Choose A Question</option> 
          </select>
        </div> 
        <div class="form-group fg_3"> 
          <input type="text" class="form-control" placeholder="Anwser here:">
        </div> 
        <button type="button" class="action-button previous previous_button">Back</button> 
        <a href="#" class="action-button">Finish</a> 
      </fieldset>  
    </form>  
  </section> 
  <!-- End Multi step form -->   

  <script>
    ;(function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
    //* Add Phone no select
    function phoneNoselect(){
        if ( $('#msform').length ){   
            $("#phone").intlTelInput(); 
            $("#phone").intlTelInput("setNumber", "+880"); 
        };
    }; 
    //* Select js
    function nice_Select(){
        if ( $('.product_select').length ){ 
            $('select').niceSelect();
        };
    }; 
    /*Function Calls*/  
    verificationForm ();
    phoneNoselect ();
    nice_Select ();
})(jQuery); 
    </script>
    </body>
</html>

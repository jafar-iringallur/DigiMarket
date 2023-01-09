<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
   <script>

    $(document).ready(function(){
      loadCategories();
      var category_sel = $('#category_id').select2({
          placeholder: "Select a category"
      });
      category_sel.data('select2').$selection.css('height', '34px');
      var unit_sel = $('#unit_sel').select2({
          placeholder: "Select a unit"
      });
      unit_sel.data('select2').$selection.css('height', '34px');
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

     
    
      $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 3
        });
      }).on('hidden.bs.modal', function(){
        cropper.destroy();
           cropper = null;
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

      function findIcons(){
        var cat_name = $('#category_name').val();
        if(cat_name == ''){
          alert("name require");
        }
        else{
          $.ajax({
              url: "{{route('products.find.category.icon')}}",
              method:'GET',
              data:{name: cat_name},
              beforeSend: function() {
                $('#find-icon-btn').prop('disabled', true);
                $('#find-icon-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
              },
              complete: function() {
                $('#find-icon-btn').prop('disabled', false);
                $('#find-icon-btn').html('<i class="bi-search"></i> Find Icons');
              },
              success:function(response)
              {
                if(response.success){
                  $("#category-icon-preview").html('');
                  $.each(response.data, function(key,value){
                    $("#category-icon-preview").append(` <div class="col-6 d-flex align-items-center justify-content-center mb-2">
                     <label>
                      <input type="radio" name="cat_icon" value="`+value+`">
                      <img src="`+value+`" alt="Option 1">
                    </label>
                     </div>`);
                  });
                }
                else{
                  alert(response.message);
                }
              
              },
              error: function(xhr) { // if error occured
                  alert("Error occured.please try again");
              }
              
            });
        }
      }
      function submitCategory (){
        var cat_name = $('#category_name').val();
        var cat_icon = $('input[name="cat_icon"]:checked').val();
        if(cat_name == ''){
          alert("name require");
        }
        else if (cat_icon == '' || cat_icon == null){
          alert("icon is require");
        }
        else{
          $.ajax({
              url: "{{route('products.add.category')}}",
              method:'POST',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data:{icon: cat_icon, name: cat_name},
              beforeSend: function() {
                $('#add-category-btn').prop('disabled', true);
                $('#add-category-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
              },
              complete: function() {
                $('#add-category-btn').prop('disabled', false);
                $('#add-category-btn').html('Add');
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
      }
      function newVarient(){
          var index = $('#size_variant_table tr').length;
          $('#size_variant_table tr:last').after(`<tr> <td><input type="text" class="form-control" id="size_varient" name="size_varient[`+index+`]['size']" placeholder="Size"></td>
                              <td><input type="text" class="form-control" id="size_varient" name="size_varient[`+index+`]['original_price']" placeholder="Original Price"></td>
                              <td><input type="text" class="form-control" id="size_varient" name="size_varient[`+index+`]['selling_price']" placeholder="Discout Price"></td></tr>`);
      }

      </script>
$(document).ready(function(){
  var $modal = $('#modal_crop');
  var crop_image = document.getElementById('sample_image');
  var cropper;
  var img = document.getElementById('sample_image');
//or however you get a handle to the IMG
  var width = img.clientWidth;
  var height = img.clientHeight;
  console.log(width);

  $('#upload_image').change(function(event){
      var files = event.target.files;
      console.log(files);
      console.log(files[0]['name']);
      extension = files[0]['name'].split('.').pop();


      var done = function(url){

          if(extension == 'jpg' || extension == 'png' || extension == 'jpeg'){
            crop_image.src = url;
            $modal.modal('show');
          }else{
            alert('Unsupported image extension');
            // sleep(000);
            location.reload();
          }

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
      cropper = new Cropper(crop_image, {
          aspectRatio: 1,
          viewMode: 3,
          preview:'.preview'
      });
  }).on('hidden.bs.modal', function(){
      cropper.destroy();
      cropper = null;
  });
  $('#crop_and_upload').click(function(){
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
              let formdata = $("#form").serialize();
              let description = $('#outdescription').val();
              let name = $('#outname').val();
              let owner = $('#owner').val();
              // console.log(data);
              console.log(name + "<<email || password>>. "+ description);
              $.ajax({
                  url:'save.php',
                  method:'POST',
                  data:{crop_image:base64data,name:name,description:description,owner:owner},
                  success:function(data)

                  {
                      location.reload();
                      $modal.modal('hide');
                  }

              });

          };
      });
  });
});

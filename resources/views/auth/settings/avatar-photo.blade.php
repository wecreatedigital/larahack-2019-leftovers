<div class="card">
  <div class="card-header">
    <h2>{{__('Profile Picture')}}</h2>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-4 d-flex justify-content-center mx-auto mb-4">
          @if( !empty(Auth::user()->avatar))
            <img src="{{ Auth::user()->avatar }}" id="preview-avatar-image" class="avatar" alt="Avatar">
          @endif
        </div>
      <div class="col-md-4 text-center">
        <div id="upload-demo"></div>
      </div>
      <div class="col-md-4" style="padding:5%;">
        <strong>Select image to crop:</strong>
        <div class="custom-file">
           <input id="avatar-file-upload" type="file" class="custom-file-input">
           <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
        </div>
        <button type="submit" class="btn btn-purple float-right upload-new-avatar">Update</button>
      </div>
    </div>
  </div>


</div>
<style media="screen">
.croppie-container .cr-boundary {
  position: relative;
  overflow: hidden;
  margin: 0 auto;
  z-index: 1;
  border-radius: 50%;
  width: 100%;
  height: 100%;
}
</style>
<script type="text/javascript">
$( document ).ready(function() {
  $.noConflict();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Croppie setup
  var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,
    viewport: {
      width: 200,
      height: 200,
      type: 'circle'
    },
    boundary: {
      width: 200,
      height: 200,
    }
  });

  $('#avatar-file-upload').on('change', function () {

    // Let User know they have selected a file
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);

    // Move File for User to crop
    var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
  });

  // Upload Cropped Image
  $('.upload-new-avatar').on('click', function (ev) {
    resize.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (img) {
      $.ajax({
        url: '/update-avatar-settings',
        type: "POST",
        data: {"avatar":img},
        success: function (data) {
          console.log(true);
        }
      });
    });
  });
});
</script>

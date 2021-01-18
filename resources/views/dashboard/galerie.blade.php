@extends('layout.master')
  @push('css')
      <style>


      </style>
  @endpush
  @section('container')
      <form action="">
          <div class="container py-4">
              <div class="row">
                <div class="col-sm-4 mx-auto">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile">
                            <label class="custom-file-label" for="inputGroupFile" aria-describedby="inputGroupFileAddon">Choose image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon">Upload</span>
                        </div>
                    </div>
                    <div class="border rounded-lg text-center p-3">
                        <img src="//placehold.it/140?text=IMAGE" class="img-fluid" id="preview" />
                    </div>
                </div>
              </div>
          </div>
      </form>
  @endsection

  @push('scripts')
  <script>

$(document).ready(function(){
    
    // input plugin
    bsCustomFileInput.init();
    
    // get file and preview image
    $("#inputGroupFile").on('change',function(){
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    })
    
})

  </script>
  @endpush
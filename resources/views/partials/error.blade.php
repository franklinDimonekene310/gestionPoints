@if (Session::has('error'))
          {{-- <button type="button" class=" d-none btn btn-danger toastrDefaultError">
            Launch Error Toast
          </button> --}}
         
         
         <button type="button" class="d-none btn btn-warning toastsDefaultWarning">
          Launch Warning Toast
        </button>

        <p id="alert" class="d-none">{{ Session::get('error') }}</p>  
         
         
@endif
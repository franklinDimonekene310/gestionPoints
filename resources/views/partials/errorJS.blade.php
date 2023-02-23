<script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ url('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

// ----------------------------------------------------------------


// ----------------------------------------------------------------
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });  
   
    /* $('.toastrDefaultError').click(function() {
      toastr.error(document.querySelector('#alert').innerHTML)
    }); */ 

    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Alert',
        subtitle: 'Création',
        body: document.querySelector('#alert').innerHTML,
      })
    });

  });  
</script>
  
<script>
    
    $(document).ready(function() {
        
      if({{ Session::has('error') }}) {
            $('.toastsDefaultWarning').click();      
      }    
    });
</script>   
  
  <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
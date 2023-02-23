<script>

    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });   
  
     
      $('.toastrDefaultSuccess').click(function() {
        toastr.success(document.querySelector('#alert').innerHTML)
      });
      
      
  
    });
  
  </script>
  
  <script>
    
    $(document).ready(function() {
        
      if({{ Session::has('success') }}) {
            $('.toastrDefaultSuccess').click();      
      }    
    });
  </script>   
  
  <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
@extends('app')
@section('styles')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
   
@endsection

@section('content')
     <!-- Content Header (Page header) -->
    
     @include('partials.session')
     
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Les titres cours</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Liste des titres cours</li>
                <li class="breadcrumb-item">
                  <a href="{{ route('titreCours.create') }}">Ajouter</a>
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card card-dark card-outline">
                <div class="card-header">
                  <h3 class="card-title">Les titres cours</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- /.card-header <button type="button" class="btn btn-block btn-outline-secondary btn-sm">Secondary</button>-->
                  
                  <table id="example1" class="table table-bordered table-sm table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Designation</th>
                          <th>Etat</th>
                          <th>Cr??ation</th>
                          <th>Modification</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($titreCours as $titreCour)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $titreCour->libelle }}  </td>
                          <td>
                              @if ($titreCour->etat == true)
                                <span class="float-center badge bg-success">actif</span>
                              @else
                                <span class="float-center badge bg-danger">inactif</span>
                              @endif
                          </td>
                          <td>{{ $titreCour->created_at }} </td>
                          <td>{{ $titreCour->updated_at }}</td>
                          <td>
                            <form action="{{ route('titreCours.destroy', $titreCour) }}" method="post">
                              @csrf
                              @method('delete')

                              <div class="row">
                                <div class="col-4">
                                  <a class="btn btn-block btn-info btn-xs" href="{{ route('titreCours.show', $titreCour) }}">Voir</a>
                                </div>
                                <div class="col-4">
                                  <a href="{{ route('titreCours.edit', $titreCour) }}" class="btn btn-block btn-primary btn-xs"> Modifier</a>
                                </div>
                                <div class="col-4">
                                  <button type="submit" class="btn btn-block btn-danger btn-xs">Danger</button>
                                </div>                            
                              
                              </div>
                              
                              
                            </form>
                           
                          </td>
                        </tr>
                      @empty
                       
                      @endforelse
                              
                    </tbody>
                   
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          
         
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->      
@endsection

@section('js')
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ url('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script> 

  
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
      
    });
  </script>

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
@endsection
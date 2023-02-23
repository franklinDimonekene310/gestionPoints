@extends('app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Détails du titre de l'application</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{ route('titreApplications.index') }}">Liste des titre applications</a></li>
            <li class="breadcrumb-item active">Détails du titre de l'application</li>
           </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        
   
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">Détails du titre de l'application</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    
       
        
      <div class="card-body">
        <div class="form-group">
          <label for="libelle">Désignation *</label>
          <input type="text" readonly required class="form-control" id="libelle" name="libelle"  value="{{ $titreApplication->libelle }}">
        </div>

        <div class="form-group">
            <label for="creation">Création </label>
            <input type="text" readonly required class="form-control" id="creation" name="creation"  value="{{ $titreApplication->created_at }}">
          </div>

          <div class="form-group">
            <label for="modification">Dernière modification </label>
            <input type="text" readonly required class="form-control" id="modification" name="modification"  value="{{ $titreApplication->updated_at }}">
          </div>
       
         <div class="custom-control custom-checkbox">
            <input class="custom-control-input" disabled type="checkbox" id="etat" name="etat" @if($titreApplication->etat == true) checked @endif>
            <label for="etat" class="custom-control-label" >Etat</label>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <div class="col-4">
            <a href="{{ route('titreApplications.edit', $titreApplication->id) }}" class="btn btn-primary"> Modifier</a>
          </div>      
      </div>
   
  </div>

</div>
</section>

@endsection
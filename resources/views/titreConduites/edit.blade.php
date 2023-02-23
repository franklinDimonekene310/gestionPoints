@extends('app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edition d'un titre conduite</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{ route('titreConduites.index') }}">Liste des titres d'applications</a></li>
            <li class="breadcrumb-item active">Edition du titre conduite</li>
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
      <h3 class="card-title">Edition du titre conduite</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    <form action="{{ route('titreConduites.update', $titreConduite->id) }}" method="post">
        @csrf
        @method('put')
        
      <div class="card-body">
        <div class="form-group">
          <label for="libelle">Désignation *</label>
          <input type="text" required class="form-control" id="libelle" name="libelle" placeholder="Ex. Mauvais" value="{{ $titreConduite->libelle }}">
        </div>
       
         <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="etat" name="etat" @if($titreConduite->etat == true) checked @endif>
            <label for="etat" class="custom-control-label" >Etat</label>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </form>
  </div>

</div>
</section>

@endsection
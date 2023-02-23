@extends('app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edition d'une annee Scolaire</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{ route('anneeScolaires.index') }}">Liste des annees Scolaires</a></li>
            <li class="breadcrumb-item active">Edition d'une annee Scolaire</li>
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
      <h3 class="card-title">Edition du d'une annee Scolaire</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    <form action="{{ route('anneeScolaires.update', $anneeScolaire) }}" method="post">
        @csrf
        @method('put')
        
      <div class="card-body">

        <div class="form-group">
          <label for="anneeScolaireDebut">Début année *</label>
          <input type="date" class="form-control" id="anneeScolaireDebut" name="anneeDebut" value="{{ $anneeScolaire->anne_debut }}">
        </div>

        <div class="form-group">
          <label for="anneeScolaireFin">Début année *</label>
          <input type="date" class="form-control" id="anneeScolaireFin" name="anneeFin" value="{{ $anneeScolaire->anne_fin }}">
        </div>
       
         <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="etat" name="etat" @if($anneeScolaire->etat == true) checked @endif>
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
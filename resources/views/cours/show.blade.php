@extends('app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Détails du titre de la conduite</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{ route('titreConduites.index') }}">Liste des titre de la conduite</a></li>
            <li class="breadcrumb-item active">Détails du titre de la conduite</li>
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
      <h3 class="card-title">Détails du titre de la conduite</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    
       
        
      <div class="card-body">
        
        <div class="form-group">
          <label>Classe </label>
          <select class="form-control" name="classe" disabled>
            <option>Selectionner ...</option>
            @foreach($classes as $classe)
              @if ($classe->id == $cour->classe->id)
                <option value="{{ $classe->id }}" selected>{{ $classe->libelle }}</option>
              @endif
              <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Titres de cours </label>
          <select class="form-control" name="classe" disabled>
            <option>Selectionner ...</option>
            @foreach($titreCours as $titreCour)
              @if ($titreCour->id == $cour->titreCour->id)
                <option value="{{ $titreCour->id }}" selected>{{ $titreCour->libelle }}</option>
              @endif
              <option value="{{ $titreCour->id }}">{{ $titreCour->libelle }}</option>
            @endforeach
          </select>
        </div>   

        <div class="form-group">
            <label for="creation">Création </label>
            <input type="text" readonly required class="form-control" id="creation" name="creation"  value="{{ $titreConduite->created_at }}">
          </div>

          <div class="form-group">
            <label for="modification">Dernière modification </label>
            <input type="text" readonly required class="form-control" id="modification" name="modification"  value="{{ $titreConduite->updated_at }}">
          </div>
       
         <div class="custom-control custom-checkbox">
            <input class="custom-control-input" disabled type="checkbox" id="etat" name="etat" @if($titreConduite->etat == true) checked @endif>
            <label for="etat" class="custom-control-label" >Etat</label>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <div class="col-4">
            <a href="{{ route('titreConduites.edit', $titreConduite->id) }}" class="btn btn-primary"> Modifier</a>
          </div>      
      </div>
   
  </div>

</div>
</section>

@endsection
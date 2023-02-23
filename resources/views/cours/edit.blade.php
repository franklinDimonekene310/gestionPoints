@extends('app')

@section('styles')    
    <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">   
@endsection

@section('content')

@include('partials.error')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edition d'un cour</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cours.index') }}">Liste des cours</a></li>
            <li class="breadcrumb-item active">Edition du cour</li>
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
      <h3 class="card-title">Edition du cour</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    <form action="{{ route('cours.update', $cour->id) }}" method="post">
        @csrf
        @method('put')

      <div class="card-body"> 
        <div class="form-group">
          <label>Classe </label>
          <select class="form-control" name="classe">
            <option>Selectionner ...</option>
            @foreach($classes as $classe)
              @if ($classe->id == $cour->classe->id)
                <option value="{{ $classe->id }}" selected>{{ $classe->libelle }}</option>
              @else
                <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
              @endif
                
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Titres de cours </label>
          <select class="form-control" name="titreCour">
            <option>Selectionner ...</option>
            @foreach($titreCours as $titreCour)
              @if ($titreCour->id == $cour->titreCour->id)
                <option value="{{ $titreCour->id }}" selected>{{ $titreCour->libelle }}</option>
              @else
                <option value="{{ $titreCour->id }}">{{ $titreCour->libelle }}</option>
              @endif              
            @endforeach
          </select>
        </div>   
       
         <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="etat" name="etat" @if($cour->etat == true) checked @endif>
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

@section('js')

@include('partials.errorJs');

@endsection
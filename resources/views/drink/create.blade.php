@extends('adminlte::page')

@section('title', 'Cadastro Bebidas')

@section('content_header')
  <h1>Cadastrar Bebidas</h1>
@stop

@section('content')
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Cadastro de Bebidas</h3>
    </div>

    <form class="form-horizontal" action="{{route('drink.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
            @if(isset($id))
                <input type="hidden" name="id" value="{{ $id }}">
            @endif
            <div class="container">
                @if(session('message'))
                <div class="alert alert-success">
                    <p>{{session('message')}}</p>
                </div>
                @endif

                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name">
                   
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Descrição:</label>
                    <div class="col-md-6">
                        <textarea name="description" name="description"class="form-control" id="description" cols="30" rows="10" required autocomplete="description" autofocus></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Preço:</label>
                    <div class="col-md-6">
                        <input id="Meta" type="number" class="form-control" name="price">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Categoria:</label>
                    <div class="col-md-6">
                        <select name="categorie_id" id="">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }}</option>                                
                            @endforeach
                        </select>
                   
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4  ">
                        <button type="submit" class="btn btn-primary float-right">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>

            @section('css')
                <style>
                    .container{
                        margin-top:30px;
                    }
                </style>
            @endsection
            @section('js')

            @endsection
                
    </form>
  </div>
@stop
@section('js')
@stop
@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
  <h1>Editar Produto</h1>
@stop

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Produto:   {{$product->name}}</h3>
        </div>
        <form class="form-horizontal" action="{{route('admin.edit',$product->id)}}" method="POST">
            @csrf
            @method('PUT')      
            <div class="container">


            </div> 
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Lanche:</label>    
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name ?? ''}}" autofocus>    

                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Descrição:</label>    
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control" name="description" value="{{$product->description ?? ''}}" autofocus>    
                 
                </div>
            </div>
             
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Preço:</label>    
                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}" autofocus>    
                 
                </div>
            </div>

      
        
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4  ">
                    <button type="submit" class="btn btn-primary float-right">
                        Alterar
                    </button>
                </div>
            </div>
        </div>
        
        </form>
    </div>  
@stop
@section('css')
    <style>
        .container{
            margin-top:30px;
        }
    </style>    
@endsection

@section('js')
@stop
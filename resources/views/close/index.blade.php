@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            @can('user')
              <div class="alert alert-success">
                <div class="text-cente p-5">
                    <h4>SEU PEDIDO FOI ENVIADO COM SUCESSO AGARDE A ENTREGA</h4>
                </div>
              </div>
            @elsecan('adimin')
            <div class=" alert alert-success" role="alert">
                <div class="text-cente p-5">
                    <h4>PEDIDO FEITO COM SUCESSO!</h4>
                </div>
              </div>
            @endcan
        </div>
    </div>
@stop



@extends('adminlte::page')

@section('title', 'LANCHONETE')

@section('content_header')
        {{-- <x-app-layout> --}}
            {{-- <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot> --}}
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 col-sm-4">
                        <div class="max-w-7xl max-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  ">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <h4 class="text-center">LANCHONETE MAMA MIA</h4>
                                </div>
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                                    <div class="max-auto sm:px-2 lg:px-8 ">
                                        <div class=" bg-white border-b border-gray-400 m-2 text-center">
                                                    <img class="border rounded ml-2" src="{{ asset('images/hamburgueimag.png')}}" alt=""/>
                                           <div class=" p-2 text-center">
                                                <h2>LANCHONETE</h2>
                                               <p class="text-left font-italic">
                                                Mamaia é uma Lanchonete,proucupada em sempre fazer o melhor lanche,para você,para
                                                que você tenha uma experiência unica provando o melhor lanche da cidade,e agora prara melhorar
                                                ainda mais essa experiência,para mais comodidade,agora você pode pedir seu lanche,aqui neste site,
                                                no menu ao lado você pode escolher seu lanche sua bebida e também seu combo,com fotos meramente inlustrativas,
                                                verificar seu pedido no carrinho, clicando no icone de um carrinho encima do menu, cadastrar endereço,
                                                para entrega,fechar seu pedido,  escolhe sua forma de pagamento e aguardar a entrega.  
                                              
                                               </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>

                </div>
            </div>

          
        {{-- </x-app-layout>   --}}

    {{-- <h1 class="m-0 text-dark ">Dashboard</h1> --}}
@stop

@section('content')

@stop






@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Lista de productos</h4>
                    @can('products.create')
                    <a href="{{route('products.create')}}" class="btn btn-success">+ Crear</a>
                    @endcan

                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                            <tr>
                                
                                <th scope="row">{{$product->id}}</th>
                                
                                <td>{{$product->description}}</td>

                                
                                <td>
                                    @can('products.show')
                                    <a href="{{route('products.show',$product->id)}}" class="btn btn-light">Ver</a>
                                    @endcan
                                </td>
                                
                                <td>
                                    @can('products.edit')
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-outline-secondary">Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('products.destroy')
                                        {!! Form::open(['route' =>['products.destroy',$product->id], 
                                                        'method' => 'DELETE'])  !!}

                                            <button class="btn btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}    
                                    @endcan
                                </td>
                                    
                            </tr>
                            @endforeach
                        
                        </tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
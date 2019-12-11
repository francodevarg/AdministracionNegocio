@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Lista de Roles</h4>
                    @can('roles.create')
                    <a href="{{route('roles.create')}}" class="btn btn-success">+ Crear</a>
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

                            @foreach($roles as $role)
                            <tr>
                                
                                <th scope="row">{{$role->id}}</th>
                                
                                <td>{{$role->name}}</td>

                                
                                <td>
                                    @can('roles.show')
                                    <a href="{{route('roles.show',$role->id)}}" class="btn btn-light">Ver</a>
                                    @endcan
                                </td>
                                
                                <td>
                                    @can('roles.edit')
                                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-outline-secondary">Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('roles.destroy')
                                        {!! Form::open(['route' =>['roles.destroy',$role->id], 
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
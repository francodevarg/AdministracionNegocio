@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Lista de Usuarios</h4>
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

                            @foreach($users as $user)
                            <tr>
                                
                                <th scope="row">{{$user->id}}</th>
                                
                                <td>{{$user->name}}</td>

                                
                                <td>
                                    @can('users.show')
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-light">Ver</a>
                                    @endcan
                                </td>
                                
                                <td>
                                    @can('users.edit')
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-secondary">Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('users.destroy')
                                        {!! Form::open(['route' =>['users.destroy',$user->id], 
                                                        'method' => 'DELETE'])  !!}

                                            <button class="btn btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}    
                                    @endcan
                                </td>
                                    
                            </tr>
                            @endforeach
                            {{$users->links()}}
                                            
                                        

                        </tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
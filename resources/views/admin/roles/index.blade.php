@extends('adminlte::page')

@section('title', 'AcademiOnline GPT')

@section('content_header')
    <h1><strong>LISTA DE ROLES</strong></h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Perfecto!</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Crear Rol</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-warning" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No existe roles registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
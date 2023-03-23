@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicación</h4>
@role('admin')
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a href="{{ route('pages-users-create') }}" class="btn btn-primary text-white">Añadir nuevo usuario</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->hasRole('admin'))
                                    <a href="{{ route('pages-roles-switch', $user->id) }}">
                                        <span class="badge bg-primary">Administrador</span>
                                    </a>
                                @else
                                    <a href="{{ route('pages-roles-switch', $user->id) }}">
                                        <span class="badge bg-success">Usuario</span>
                                    </a>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('pages-user-show', $user->id) }}">Editar</a> | <a href="{{ route('pages-user-destroy', $user->id) }}">Borrar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="alert alert-danger text-center" role="alert">
        <h4 class="alert-heading">Acceso denegado</h4>
        <p>No tienes permisos para acceder a esta página.</p>
        <hr>
        <p class="mb-0">Si crees que esto es un error, ponte en contacto con el administrador</p>
    </div>
@endrole

@endsection

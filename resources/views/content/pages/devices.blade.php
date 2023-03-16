@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dispositivos')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection

@section('content')
<h4>Listado de dispositivos</h4>
<div class="card">
    <div class="table-responsive text-nowrap">
        <a href="{{ route('pages-devices-create') }}" class="btn btn-primary text-white">Añadir nuevo dispositivo</a>
        <a href="{{ route('pages-devices-export') }}" class="btn btn-success text-white">Exportar excel dispositivos</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Activo</th>
                    <th>Creado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->id }}</td>
                        <td>{{ $device->name }}</td>
                        <td>
                            @foreach ($types as $type)
                                @if ($device->type_id == $type->id)
                                    <span><i class="{{ $type->icon }}"></i></span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if ($device->active)
                                <a href="{{ route('pages-devices-switch', $device->id) }}">
                                    <span class="badge bg-primary">Activo</span>
                                </a>
                            @else
                                <a href="{{ route('pages-devices-switch', $device->id) }}">
                                    <span class="badge bg-danger">Inactivo</span>
                                </a>
                            @endif
                        </td>
                        <td>{{ $device->created_at }}</td>
                        <td><a href="{{ route('pages-devices-show', $device->id) }}">Editar</a> | <a href="{{ route('pages-devices-destroy', $device->id) }}">Borrar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection

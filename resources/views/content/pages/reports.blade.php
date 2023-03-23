@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes')

@section('content')
<h4>Reportes</h4>
<div class="card">
    <div class="table-responsive text-nowrap">
        <a href="{{ route('pages-reports-create') }}" class="btn btn-primary text-white">Añadir nuevo reporte</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Creado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->created_at }}</td>
                        <td><a href="/storage/pdf/{{ $report->url }}">Descargar</a> | <a href="{{ route('pages-reports-destroy', $report->id) }}">Borrar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection

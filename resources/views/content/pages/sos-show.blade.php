@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Sistema Operativo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Editando un sistema operativo</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pages-sos-update') }}">
                    @csrf

                    <input type="hidden" name="so_id" value="{{ $so->id }}">

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nombre</label>
                        <input type="text" name="name" value="{{ $so->name }}" class="form-control" id="basic-default-fullname" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Version</label>
                        <input type="text" name="version" value="{{ $so->version }}" class="form-control" id="basic-default-fullname" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Descripción</label>
                        <input type="text" name="description" value="{{ $so->description }}" class="form-control" id="basic-default-email" required/>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
          </div>
    </div>
</div>
@endsection

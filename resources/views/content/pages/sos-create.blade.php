@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando Sistema Operativo nuevo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <a href="{{ route('pages-sos') }}">Volver atras</a>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Creando un sistema operativo nuevo</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pages-sos-store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nombre</label>
                        <input type="text" name="name" class="form-control" id="basic-default-fullname" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Version</label>
                        <input type="text" name="version" class="form-control" id="basic-default-fullname" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Descripción</label>
                        <input type="text" name="description" class="form-control" id="basic-default-email"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
          </div>
    </div>
</div>
@endsection

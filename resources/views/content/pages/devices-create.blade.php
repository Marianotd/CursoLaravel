@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando dispositivo nuevo')

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
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <a href="{{ route('pages-devices') }}">Volver atras</a>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Creando un dispositivo nuevo</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pages-devices-store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="selectpickerIcons" class="form-label">Tipo de dispositivo</label>
                        <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="type_id">
                            @forelse ($types as $type)
                               <option data-icon="bx-bx-{{ $type->icon }}" value="{{ $type->id }}">{{ $type->name }}</option> 
                            @empty
                                <option value="">No hay tipos cargados</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="selectpickerIcons" class="form-label">Tipo de dispositivo</label>
                        <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="so_id">
                            @forelse ($sos as $so)
                               <option data-icon="bx-bx-{{ $so->icon }}" value="{{ $so->id }}">{{ $so->name }}</option> 
                            @empty
                                <option value="">No hay sistemas operativos cargados</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nombre</label>
                        <input type="text" name="name" class="form-control" id="basic-default-fullname" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Descripción</label>
                        <input type="text" name="description" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Número de serie</label>
                        <input type="text" name="serial_number" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Mac</label>
                        <input type="text" name="mac_address" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Dirección IP</label>
                        <input type="text" name="ip_address" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Modelo</label>
                        <input type="text" name="model" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Fábrica</label>
                        <input type="text" name="manufacturer" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Firmware</label>
                        <input type="text" name="firmware" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Stock</label>
                        <input type="text" name="stock" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Disco Duro</label>
                        <input type="text" name="hdd" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Memoria Ram</label>
                        <input type="text" name="ram" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">CPU</label>
                        <input type="text" name="cpu" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tarjeta gráfica</label>
                        <input type="text" name="gpu" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Slots totales</label>
                        <input type="text" name="total_slots" class="form-control" id="basic-default-email"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Histórico</label>
                        <textarea name="history" id="basic-default-fullname" class="form-control" cols="30" rows="3" style="resize:none;"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
          </div>
    </div>
</div>
@endsection

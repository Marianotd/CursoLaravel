@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando usuario nuevo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <a href="{{ route('pages-users') }}">Volver atras</a>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Creando un usuario nuevo</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pages-users-store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nombre completo</label>
                        <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="John Doe" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Email</label>
                        <input type="text" name="email" class="form-control" id="basic-default-email" placeholder="example@example.com" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="password" name="password" class="form-control" id="basic-default-password" placeholder="Secret Password" required/>
                    </div>

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>   
                    @endif --}}

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
          </div>
    </div>
</div>
@endsection

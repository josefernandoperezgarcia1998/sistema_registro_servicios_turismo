@extends('layouts.general')

@section('title_page')
Crear usuario del personal
@endsection

@section('content_page')
    @if (session('mensaje'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('mensaje')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre completo</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1"
                name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Confirmar contraseña</label>
            <input id="password-confirm" type="password" class="form-control" name="password2" required
                autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection

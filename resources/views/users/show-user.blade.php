@extends('layouts.general')

@section('title_page')
Datos del usuario personal
@endsection

@section('content_page')
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"
                name="name" value="{{ $personal->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email"
            value="{{ $personal->email }}"disabled>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection

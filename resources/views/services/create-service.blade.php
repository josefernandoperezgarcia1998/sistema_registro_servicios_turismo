@extends('layouts.general')

@section('title_page')
Crear servicio
@endsection

@section('content_page')
<form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nombre</label>
        <select class="form-select" aria-label="Default select example" name="personal_id">
            <option selected value="personal_id">Selecciona un usuario</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Persona atendida</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" name="person_served" value="{{ old('person_served') }}" required  autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Area</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" name="area" value="{{ old('area') }}" required  autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Tipo de servicio</label>
        <input type="text" class="form-control" id="exampleFormControlInput4" name="type_service" value="{{ old('type_service') }}" required  autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de inicio</label>
        <input type="date" name="date_start_service" id="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de fin</label>
        <input type="date" name="date_end_service" id="">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection

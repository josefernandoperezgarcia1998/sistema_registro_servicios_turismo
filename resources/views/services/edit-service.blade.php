@extends('layouts.general')

@section('title_page')
    Editar Servicio
@endsection

@section('content_page')
<form action="{{ route('services.update', $service->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre del personal</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="personal_name" value="{{ old('personal_name', $service->personal_name) }}" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Persona atendida</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" name="person_served" value="{{ old('person_served', $service->person_served) }}" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Area</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" name="area" value="{{ old('area', $service->area) }}" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Tipo de servicio</label>
        <input type="text" class="form-control" id="exampleFormControlInput4" name="type_service" value="{{ old('type_service', $service->type_service) }}" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$service->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de inicio</label>
        <input type="date" name="date_start_service" id="" value="{{ old('date_start_service', $service->date_start_service) }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de fin</label>
        <input type="date" name="date_end_service" id="" value="{{ old('date_end_service', $service->date_end_service) }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
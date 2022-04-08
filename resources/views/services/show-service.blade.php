@extends('layouts.general')

@section('title_page')
    Mostrar Servicio
@endsection

@section('content_page')
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre del personal</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="personal_name" disabled value="{{ $service->personal->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Persona atendida</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" name="person_served" disabled value="{{ $service->person_served }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Area</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" name="area" disabled value="{{ $service->area }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Tipo de servicio</label>
        <input type="text" class="form-control" id="exampleFormControlInput4" name="type_service" disabled value="{{ $service->type_service }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" disabled>{{$service->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de inicio</label>
        <input type="text" name="date_start_service" id="" disabled value="{{ $service->date_start_service }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Fecha de fin</label>
        <input type="text" name="date_end_service" id="" disabled value="{{ $service->date_end_service }}">
    </div>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
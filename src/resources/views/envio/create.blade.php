@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar envio') }}</div>

                <div class="card-body">

<form action="creates" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Empresa</label>
    <input id="company_name" name="company_name" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Codigo postal</label>
    <input id="codigo_postal" name="codigo_postal" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Direccion</label>
    <input id="address" name="address" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Ciudad</label>
    <input id="city" name="city" type="city" class="form-control" tabindex="4">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Relefono</label>
    <input id="phone" name="phone" type="text" class="form-control" tabindex="5">
  </div>
  <a class="btn btn-primary" href="{{ route('envio.index') }}">{{ __('Cancelar') }}</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
</div>
            </div>
        </div>
    </div>
</div>

@endsection
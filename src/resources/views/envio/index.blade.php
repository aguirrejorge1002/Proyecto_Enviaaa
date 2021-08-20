@extends('layouts.app')
@section('content')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>algo</title>
<link href="../css/tarea_sesion14.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>


function gotoNode(name) {
    $('#user-id-2').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    var s = name;
    $(e.currentTarget).find('#id_envio').val(id);
    if (s == 'nuevo') var ss = 0;
    if (s == 'recolectada') var ss = 1;
    if (s == 'en ruta') var ss = 2;
    if (s == 'entregada') var ss = 3;
    if (s == 'incidente') var ss= 4;
    $("#status").val(ss);
  });
}

</script>

</head>
<body>
<div class="container">
  <div class="row justify-content-left">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <form action="envio/search" method="POST">
            @csrf
            <div class="mb-3">
            <label for="" class="form-label">Buscar</label>
            <input id="company_name" name="company_name" type="text" class="form-control" tabindex="1" required>    
            </div>
            <button type="submit" class="btn btn-primary" tabindex="4">Buscar</button>
            <a class="btn btn-primary" href="{{ route('envio.index') }}">{{ __('Limpiar filtro') }}</a>
            <a href="envio/create" class="btn btn-primary">Crear Envio</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>   
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Empresa</th>
      <th scope="col">CP</th>
      <th scope="col">Direccion</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Telefono</th>
      <th scope="col">Estatus</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($envios as $envio)
    <tr>
        <td>{{$envio->id}}</td>
        <td>{{$envio->company_name}}</td> 
        <td>{{$envio->codigo_postal}}</td>
        <td>{{$envio->address}}</td> 
        <td>{{$envio->city}}</td>
        <td>{{$envio->phone}}</td>
        <td>{{$envio->status}}</td>
        <td>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#user-id-2" data-id="{{ $envio->id }}" onClick="gotoNode('{{ $envio->status }}')">Editar</button>
            <div id="user-id-2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar estatus<div id="bookId1"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="envio/edit" method="POST">
                      @csrf    
                      @method('PUT')
                        <input type="hidden" name="id_envio" id="id_envio" value="" />
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Estatus:</label>
                        <select id="status" name="status" class="form-control" value="{{ $envio->status }}">
                          <option value="0">nueva</option>
                          <option value="1">recolectada</option>
                          <option value="2">en ruta</option>
                          <option value="3">entregada</option>
                          <option value="4">incidente</option>
                        </select>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" tabindex="4">Editar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>          
        </td>  
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
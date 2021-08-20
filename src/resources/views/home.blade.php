@extends('layouts.app')
@section('content')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>algo</title>
<link href="../css/tarea_sesion14.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(e) {
  $('#modalAlumno').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#bookId').val(id);
  });
});
</script>

</head>
<body>

<h2>Ejemplo pasar parametros al Bootstrap modal desde el llamador</h2>
<p>En el evento show.bs.modal. Pregunta desde Foros MSDN <a href="https://social.msdn.microsoft.com/Forums/es-ES/cdfc46ee-5194-4b3a-a731-4174b2009d40/cmo-enviar-valor-a-ventana-modal-bootstrap?forum=netfxwebes">ver aquí</a>
</p>

<br />
<a id="alumno" 
    data-target="#modalAlumno" 
    data-toggle="modal" 
    data-id="454365346" 
    href="#" 
    class="sepV_a" 
    title="Agregar alumnos"><i class="icon-eye-open"></i> Agregar alumno</a>

<div class="modal fade" id="modalAlumno">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3>New Tasks</h3>
        </div>
        <div class="modal-body">
            <input type="text" name="bookId" id="bookId" value="" />

         </div>
</div>

</body>
</html>
@endsection

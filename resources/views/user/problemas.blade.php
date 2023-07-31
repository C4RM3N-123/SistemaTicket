@extends('template.layout')
@section('titleGeneral', '')
@section('sectionGeneral')
<form id="frmCityInsert" action="{{url('city/insert')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 form-group text-center">
        <h3>PROBLEMA</h3>
        </div>
        <div class="col-md-12 form-group">
            <label for="txtNombreQueja">Nombre de la queja</label>
            <input type="text" id="txtNombreQueja" name="txtNombreQueja" class="form-control">
        </div>
        <div class="col-md-12 form-group">
            <label for="txtDescripcion">Descripción</label>
            <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <label for="sltUrgencia">Tipo</label>
            <select id="sltUrgencia" name="sltUrgencia" class="form-control">
                <option value="0">Normal</option>
                <option value="1">Urgente</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <label for="imgImagenes">Imágenes</label>
            <input type="file" id="imgImagenes" name="imgImagenes[]" class="form-control" multiple>
            <small class="form-text text-muted">Seleccione una o varias imágenes.</small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" onclick="sendFrmCityInsert();">Enviar</button>
        </div>
    </div>
</form>
@endsection
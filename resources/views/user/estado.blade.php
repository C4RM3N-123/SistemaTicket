@extends('template.layout')
@section('titleGeneral', '')
@section('sectionGeneral')

<form id="frmCityInsert" action="{{url('city/insert')}}" method="post">
    <div class="row">
        <div class="col-md-12 form-group text-center">
            <h3>ESTADO DEL TICKET</h3>
        </div>        
        <div class="col-md-4">
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>SOLICITADO</h3>
            <p>Nombre del problema</p>
            </div>
            <a href="#" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-info">
            <div class="inner">
            <h3>EN PROCESO</h3>
            <p>Nombre del problema</p>
            </div>
            <a href="#" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
            <div class="inner">
            <h3>FINALIZADO</h3>
            <p>Nombre del problema</p>
            </div>
            <a href="#" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</form>

@endsection
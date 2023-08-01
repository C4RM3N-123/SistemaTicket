@extends('template.layout')
@section('titleGeneral', '')
@section('sectionGeneral')
<form id="frmCityInsert" action="{{url('city/insert')}}" method="post">
    <div class="row">
        <div class="col-md-12 form-group text-center">
            <h3>ESTADO DEL TICKET</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>TIPO</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos que podrían ir en la tabla dependiendo a la respuesta del admin -->
                    <tr>
                        <td>Ticket 1</td>
                        <td>Descripción del Ticket 1</td>
                        <td>Urgente</td>
                        <td>Solicitado</td>
                    </tr>
                    <tr>
                        <td>Ticket 2</td>
                        <td>Descripción del Ticket 2</td>
                        <td>Urgente</td>
                        <td>En Proceso</td>
                    </tr>
                    <tr>
                        <td>Ticket 3</td>
                        <td>Descripción del Ticket 3</td>
                        <td>Normal</td>
                        <td>Finalizado</td>
                    </tr>
                    <!--Datos-->
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
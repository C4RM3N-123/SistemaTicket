@extends('template.layout')
@section('titleGeneral', 'Lista de reportes...')
@section('sectionGeneral')


<!--Mostrar toda la lista de reportes-->
<!--=================================================================================================-->
<form id="frmReportInsert" action="{{ url('report/insert') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Descripción" id="txtDescription" name="description">
        </div>
        <div class="col-md-2">
            <select class="form-control" id="ddlCreatorRole" name="creator_role">
                <option report="Admin">Admin</option>
                <option report="Employee">Employee</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Datos del Creador" id="txtCreatorData" name="creator_data">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="ID del Ticket" id="txtTicketId" name="idTicket">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" placeholder="Fecha de Creación" id="txtCreatedAt" name="created_at">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" onclick="sendFrmReportInsert();">Registrar Reporte</button>
        </div>
    </div>
</form>



<!--Mostrar toda la lista de reportes-->
<!--=================================================================================================-->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID del Reporte</th>
            <th>Descripción</th>
            <th>Rol del Creador</th>
            <th>Datos del Creador</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Actualización</th>
            <th>ID del Ticket</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($listTReport as $report)
            <tr id="reportRow_{{$report->idReport}}">
                <td>{{$report->idReport}}</td>
                <td>{{$report->description}}</td>
                <td>{{$report->creator_role}}</td>
                <td>{{$report->creator_data}}</td>
                <td>{{$report->created_at}}</td>
                <td>{{$report->updated_at}}</td>
                <td>{{$report->idTicket}}</td>
                <td class="text-right">
                    <button class="btn btn-xs btn-info" onclick="showEditModal('{{$report->idReport}}', '{{$report->description}}', '{{$report->creator_role}}', '{{$report->creator_data}}');">Actualizar</button>
                    <button class="btn btn-xs btn-danger" onclick="deleteReport('{{$report->idReport}}');">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal de edición -->
<!--==================================================================================================-->

<div class="modal fade" id="editReportModal" tabindex="-1" role="dialog" aria-labelledby="editReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReportModalLabel">Editar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="txtNewDescription">Descripción:</label>
                        <input type="text" id="txtNewDescription" class="form-control">
                    <div class="form-group">
                        <label for="txtNewCreatorRole">Rol del Creador:</label>
                        <input type="text" id="txtNewCreatorRole" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtNewCreatorData">Datos del Creador:</label>
                        <input type="text" id="txtNewCreatorData" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="updateReport($('#editReportModal').data('idReport'));">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('viewresources/report/insert.js')}}"></script>
<script src="{{asset('viewresources/report/update.js')}}"></script>
<script src="{{asset('viewresources/report/delete.js')}}"></script>
@endsection

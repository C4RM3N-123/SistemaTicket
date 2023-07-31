@extends('template.layout')

@section('titleGeneral', 'Inserción de Imágenes')

@section('sectionGeneral')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar Nueva Imagen</div>
                    <div class="panel-body">
                        @if (session('listMessage') && session('typeMessage') === 'error')
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach (session('listMessage') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('listMessage') && session('typeMessage') === 'success')
                            <div class="alert alert-success">
                                <ul>
                                    @foreach (session('listMessage') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="insertForm" action="{{ url('picture/insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="txtTicketID">ID del Ticket:</label>
                                <input type="text" name="txtTicketID" id="txtTicketID" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="imageBefore">Imagen Before:</label>
                                <input type="file" name="imageBefore" id="imageBefore" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="imageAfter">Imagen After:</label>
                                <input type="file" name="imageAfter" id="imageAfter" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Imágenes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{asset('viewresources/picture/insert.js')}}"></script>
@endsection
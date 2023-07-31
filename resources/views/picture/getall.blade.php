@extends('template.layout')

@section('titleGeneral', 'Muestra imágenes')

@section('sectionGeneral')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Imágenes Guardadas</h3>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Before</h4>
                        <div class="image-row" style="border: 1px solid black; padding: 10px;">
                            @foreach ($listPictures as $picture)
                                @if ($picture->imageBefore !== null)
                                    <div class="col-md-3">
                                        <div class="thumbnail">
                                            <!-- Mostrar la imagen Before -->
                                            <img src="data:image/{{ pathinfo($picture->imageBefore, PATHINFO_EXTENSION) }};base64,{{ base64_encode($picture->imageBefore) }}" style="width: 100%">
                                            <!-- Botón de actualización -->
                                            <button class="btn btn-primary" onclick="showEditModal('{{ $picture->idImage }}')">Actualizar</button>
                                            <button class="btn btn-danger" onclick="deletePicture('{{ $picture->idImage }}', 'Before')">Eliminar</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <h4>After</h4>
                        <div class="image-row" style="border: 1px solid black; padding: 10px;">
                            @foreach ($listPictures as $picture)
                                @if ($picture->imageAfter !== null)
                                    <div class="col-md-3">
                                        <div class="thumbnail">
                                            <!-- Mostrar la imagen After -->
                                            <img src="data:image/{{ pathinfo($picture->imageAfter, PATHINFO_EXTENSION) }};base64,{{ base64_encode($picture->imageAfter) }}" style="width: 100%">
                                            <!-- Botón de actualización -->
                                            <button class="btn btn-primary" onclick="showEditModal('{{ $picture->idImage }}')">Actualizar</button>
                                            <button class="btn btn-danger" onclick="deletePicture('{{ $picture->idImage }}', 'After')">Eliminar</button>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .image-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .image-row .thumbnail {
            margin: 5px;
        }
    </style>


    <!-- Modal para ingresar rutas -->
    <div class="modal fade" id="editPictureModal" tabindex="-1" role="dialog" aria-labelledby="routeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routeModalLabel">Ingresar Rutas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para ingresar las rutas -->
                    <form id="routeForm">
                    <div class="form-group">
                        <label for="imageBefore">Imagen:</label>
                            <input type="file" name="txtRoute" id="txtRoute" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="updatePicture($('#editPictureModal').data('idPicture'));">Guardar Rutas</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{asset('viewresources/picture/update.js')}}"></script>
<script src="{{asset('viewresources/picture/delete.js')}}"></script>
<script src="{{asset('viewresources/picture/insert.js')}}"></script>
@endsection

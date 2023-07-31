<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TPicture;
use App\Models\TTicket;

class PictureController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post'))
        {
            // Validación del campo 'idTicket' ...
            $listMessage = [];

            $validator = Validator::make(
                $request->all(),
                [
                    'idTicket' => 'required',
                    'imageBefore' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                    'imageAfter' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'idTicket.required' => 'El campo "ID del Ticket" es requerido.',
                    'imageBefore.image' => 'El archivo Before debe ser una imagen válida.',
                    'imageBefore.mimes' => 'El archivo Before debe ser de tipo JPEG, PNG, o JPG',
                    'imageBefore.max' => 'El tamaño máximo del archivo Before debe ser 16 MB.',
                    'imageAfter.image' => 'El archivo After debe ser una imagen válida.',
                    'imageAfter.mimes' => 'El archivo After debe ser de tipo JPEG, PNG, o JPG',
                    'imageAfter.max' => 'El tamaño máximo del archivo After debe ser 16 MB.',
                ]
            );

            if ($validator->fails())
            {
                $errors = $validator->errors()->all();

                foreach ($errors as $value)
                {
                    $listMessage[] = $value;
                }
            }


            $tPicture = new TPicture();

            $tPicture->idImage = uniqid();
            $tPicture->idTicket = $request->input('txtTicketID');

            // Guardar la imagen Before si se proporciona en la solicitud
            if ($request->hasFile('imageBefore')) {
                $imageBefore = file_get_contents($request->file('imageBefore')->getRealPath());
                $tPicture->imageBefore = $imageBefore;
            } else {
                $tPicture->imageBefore = null; // Guardar null si no se proporciona la imagen Before
            }

            // Guardar la imagen After si se proporciona en la solicitud
            if ($request->hasFile('imageAfter')) {
                $imageAfter = file_get_contents($request->file('imageAfter')->getRealPath());
                $tPicture->imageAfter = $imageAfter;
            } else {
                $tPicture->imageAfter = null; // Guardar null si no se proporciona la imagen After
            }

            $tPicture->save();

            $sessionManager->flash('listMessage', ['Imagen agregada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');

            return redirect('picture/insert');
        }

        return view('picture/insert');
    }


    public function actionGetAll()
    {
        $listPictures = TPicture::all();

        return view('picture/getall', [
            'listPictures' => $listPictures
        ]);
    }

    public function actionUpdate($idImage, Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];
    
            $validator = Validator::make(
                $request->all(),
                [
                    'imageBefore' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                    'imageAfter' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'imageBefore.image' => 'El archivo Before debe ser una imagen válida.',
                    'imageBefore.mimes' => 'El archivo Before debe ser de tipo JPEG, PNG o JPG.',
                    'imageBefore.max' => 'El tamaño máximo del archivo Before debe ser 16 MB.',
                    'imageAfter.image' => 'El archivo After debe ser una imagen válida.',
                    'imageAfter.mimes' => 'El archivo After debe ser de tipo JPEG, PNG o JPG.',
                    'imageAfter.max' => 'El tamaño máximo del archivo After debe ser 16 MB.',
                ]
            );
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
    
                foreach ($errors as $value) {
                    $listMessage[] = $value;
                }
            }
    
            $pictureToUpdate = TPicture::find($idImage);
    
            if (!$pictureToUpdate) {
                $listMessage[] = 'La imagen que se intenta actualizar no existe.';
            } else {
                // Update 'imageBefore' if applicable
                if ($request->hasFile('imageBefore')) {
                    $imageBefore = file_get_contents($request->file('imageBefore')->getRealPath());
                    if ($imageBefore) {
                        $pictureToUpdate->imageBefore = $imageBefore;
                    } else {
                        $listMessage[] = 'No se encontró la imagen Before.';
                    }
                }
    
                // Update 'imageAfter' if applicable
                if ($request->hasFile('imageAfter')) {
                    $imageAfter = file_get_contents($request->file('imageAfter')->getRealPath());
                    if ($imageAfter) {
                        $pictureToUpdate->imageAfter = $imageAfter;
                    } else {
                        $listMessage[] = 'No se encontró la imagen After.';
                    }
                }
            }
    
            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('picture/update/' . $idImage);
            }
    
            // Save the updated picture data
            $pictureToUpdate->save();
    
            $sessionManager->flash('listMessage', ['Actualización realizada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');
    
            return redirect('picture/getall');
        }
    
        // If not a POST request, redirect to the edit page with the image ID
        return redirect('picture/edit/' . $idImage);
    }
    

    public function actionDelete($idImage, Request $request, SessionManager $sessionManager)
    {
        $picture = TPicture::find($idImage);
    
        if ($picture)
        {
            // Obtén el valor del texto enviado desde el formulario
            $imageTypeToDelete = $request->input('txtImageType');
    
            // Verifica si el valor del texto es válido ('Before' o 'After')
            if ($imageTypeToDelete === 'Before' || $imageTypeToDelete === 'After') {
                // Verifica si el valor del texto coincide con el valor en la columna 'imageType'
                if ($picture->imageType === $imageTypeToDelete) {
                    // Elimina la imagen de la base de datos
                    $picture->delete();
    
                    // Si necesitas eliminar también los archivos de imagen asociados, asegúrate de hacerlo aquí
    
                    $sessionManager->flash('listMessage', ['Imagen eliminada correctamente.']);
                    $sessionManager->flash('typeMessage', 'success');
                } else {
                    $sessionManager->flash('listMessage', ['El valor del texto no coincide con el tipo de imagen a eliminar.']);
                    $sessionManager->flash('typeMessage', 'error');
                }
            } else {
                $sessionManager->flash('listMessage', ['El valor del texto no es válido. Debe ser "Before" o "After".']);
                $sessionManager->flash('typeMessage', 'error');
            }
        } else {
            $sessionManager->flash('listMessage', ['La imagen que se intenta eliminar no existe.']);
            $sessionManager->flash('typeMessage', 'error');
        }
    
        return redirect('picture/getall');
    }
    
}

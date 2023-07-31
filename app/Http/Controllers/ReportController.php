<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TTicket;
use App\Models\TReport;
 
class ReportController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                [
                    'description' => trim($request->input('description')),
                    'creator_role' => trim($request->input('creator_role')),
                    'creator_data' => trim($request->input('creator_data')),
                    'idTicket' => trim($request->input('idTicket')),
                ],
                [
                    'description' => 'required',
                    'creator_role' => 'required',
                    'creator_data' => 'required',
                    'idTicket' => 'required|unique:treport,idTicket',
                ],
                [
                    'description.required' => 'El campo "descripción" es requerido.',
                    'creator_role.required' => 'El campo "rol del creador" es requerido.',
                    'creator_data.required' => 'El campo "datos del creador" es requerido.',
                    'idTicket.required' => 'El campo "ID del ticket" es requerido.',
                    'idTicket.unique' => 'El ID del ticket ya está registrado para otro reporte.',
                ]
            );

            if ($validator->fails()) {
                $errors = $validator->errors()->all();

                foreach ($errors as $value) {
                    $listMessage[] = $value;
                }
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('report/getall');
            }

            $tReport = new TReport();

            $tReport->idReport = uniqid();
            $tReport->description = $request->input('description');
            $tReport->creator_role = $request->input('creator_role');
            $tReport->creator_data = $request->input('creator_data');
            $tReport->idTicket = $request->input('idTicket');

            $tReport->save();

            $sessionManager->flash('listMessage', ['Registro realizado correctamente.']);
            $sessionManager->flash('typeMessage', 'success');

            return redirect('report/getall');
        }

        // You need to create a corresponding view for the insert action (report/insert.blade.php)
        return view('report/getall');
    }

    public function actionGetAll()
    {
        $listTReport = TReport::all();

        return view('report.getall', [
            'listTReport' => $listTReport
        ]);
    }

    public function actionDelete($idReport, SessionManager $sessionManager)
    {
        $tReport = TReport::find($idReport);

        if ($tReport != null) {
            $tReport->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente.']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('report/getall');
    }


    public function actionUpdate($idReport, Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post'))
        {
            $listMessage = [];
    
            $validator = Validator::make(
                [
                    'description' => trim($request->input('Description')),
                    'creator_role' => trim($request->input('Creator_role')),
                    'creator_data' => trim($request->input('Creator_data')),
                ],
                [
                    'description' => 'required',
                    'creator_role' => 'required',
                    'creator_data' => 'required',
                ],
                [
                    'description.required' => 'El campo "descripción" es requerido.',
                    'creator_role.required' => 'El campo "rol del creador" es requerido.',
                    'creator_data.required' => 'El campo "datos del creador" es requerido.',
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
    
            // Se busca el reporte que se está editando por su ID
            $reportToUpdate = TReport::find($idReport);
    
            if (!$reportToUpdate)
            {
                $listMessage[] = 'El reporte que se intenta editar no existe.';
            }
    
            if (count($listMessage) > 0)
            {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('report/update/'.$idReport); // Redirigir a la página de edición con el ID del reporte
            }
    
            // Actualizar los datos del reporte
			$reportToUpdate->description = $request->input('description');
			$reportToUpdate->creator_role = $request->input('creator_role');
            $reportToUpdate->creator_data = $request->input('creator_data');

            
            $reportToUpdate->update();
            /*
            $reportToUpdate->update([
                'description' => $request->input('description'),
                'creator_role' => $request->input('creator_role'),
                'creator_data' => $request->input('creator_data'),
            ]);
            */
            $sessionManager->flash('listMessage', ['Actualización realizada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');
    
            //return redirect('report/update/'.$idReport);
            return redirect('report/getall');
        }
    
        // Si no es una solicitud POST, redirigir a la página de edición con el ID del reporte
        return redirect('report/update/'.$idReport);
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Tdetailticket;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller{
    public function actionInsert(Request $request, SessionManager $sessionManager)
	{
		if($request->isMethod('post'))
		{
			$listMessage = [];

			$validator = Validator::make(
			[
				'name' => trim($request->input('txtName')),
				'description' => trim($request->input('txtDescripcion'))
				
			],
			[
				'name' => 'required',
				'description' => 'required'
			],
			[
				'name.required' => 'El campo "nombre" es requerido.',
				'description.required' => 'El campo "Descripcion" es requerido.',


			]);
	
			if($validator->fails())
			{
				$errors = $validator->errors()->all();
	
				foreach($errors as $value)
				{
					$listMessage[] = $value;
				}
			}

		

			if(count($listMessage) > 0) {
				$sessionManager->flash('listMessage', $listMessage);
				$sessionManager->flash('typeMessage', 'error');

				return redirect('ticket/problemas');
			}

			$tCity = new Tdetailticket();

			$tCity->idTicket = uniqid();
			$tCity->name = $request->input('txtName');
			$tCity->description = $request->input('txtDescripcion');

			$tCity->save();

			$sessionManager->flash('listMessage', ['Registro realizado correctamente.']);
			$sessionManager->flash('typeMessage', 'success');

			return redirect('user/problemas');
		}

		return view('user/problemas');
	}

    public function actionEscribir()
	{
		$listEst = Tdetailticket::all();

		return view('ticket/problemas');
	}

    public function actionEstado()
	{
		$listEst = Tdetailticket::all();

		return view('user/estado',
		[
			'listEst' => $listEst
		
		]);
		
		
	}
}
?>
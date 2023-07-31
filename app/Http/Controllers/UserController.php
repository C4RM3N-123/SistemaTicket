<?php
namespace App\Http\Controllers;

use App\Models\TDetailUser;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TCity;

 
class UserController extends Controller
{
	
	public function actionEditar()
	{
		
		return view('user/edit');

	}
	public function actionEscribir()
	{
		
		return view('user/problemas');
		
	}
	public function actionLoguear()
	{
		
		return view('user/login');
		
	}
	public function actionEstado()
	{
		
		return view('user/estado');
		
	}

	//Funciones del administrador
	public function verUsuario()
	{

		return view('admi/verUsuario');
		
	}
	public function verTicket()
	{

		return view('admi/verTicket');
		
	}
	
}
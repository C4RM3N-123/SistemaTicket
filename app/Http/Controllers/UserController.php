<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TUser;

class UserController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                [
                    'first_name' => trim($request->input('txtFirstName')),
                    'last_name' => trim($request->input('txtLastName')),
                    'email' => trim($request->input('txtEmail')),
                    'username' => trim($request->input('txtUsername')),
                    'password' => $request->input('txtPassword'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('txtPhone'),
                    'role' => $request->input('txtRole'),
                ],
                [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:tuser,email',
                    'username' => 'required|unique:tuser,username',
                    'password' => 'required|min:6',
                    'gender' => 'required|boolean',
                    'phone' => 'nullable|integer',
                    'role' => 'required',
                ],
                [
                    'first_name.required' => 'El campo "nombre" es requerido.',
                    'last_name.required' => 'El campo "apellido" es requerido.',
                    'email.required' => 'El campo "correo electrónico" es requerido.',
                    'email.email' => 'El formato del correo electrónico es inválido.',
                    'email.unique' => 'El correo electrónico ya está registrado.',
                    'username.required' => 'El campo "nombre de usuario" es requerido.',
                    'username.unique' => 'El nombre de usuario ya está registrado.',
                    'password.required' => 'El campo "contraseña" es requerido.',
                    'password.min' => 'La contraseña debe tener al menos :min caracteres.',
                    'gender.required' => 'El campo "género" es requerido.',
                    'gender.boolean' => 'El campo "género" debe ser verdadero o falso.',
                    'phone.integer' => 'El campo "teléfono" debe ser un número entero.',
                    'role.required' => 'El campo "rol" es requerido.',
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

                return redirect('user/insert');
            }

            $tUser = new TUser();

            $tUser->idUser = uniqid();
            $tUser->first_name = $request->input('txtFirstName');
            $tUser->last_name = $request->input('txtLastName');
            $tUser->email = $request->input('txtEmail');
            $tUser->username = $request->input('txtUsername');
            $tUser->password = bcrypt($request->input('txtPassword'));
            $tUser->gender = (bool)$request->input('gender');
            $tUser->phone = $request->input('txtPhone');
            $tUser->role = $request->input('txtRole');

            $tUser->save();

            $sessionManager->flash('listMessage', ['Registro realizado correctamente.']);
            $sessionManager->flash('typeMessage', 'success');

            return redirect('user/insert');
        }

        return view('user/insert');
    }

    public function actionGetAll()
    {
        $listTUser = TUser::all();

        return view('user/getall', [
            'listTUser' => $listTUser
        ]);
    }

    public function actionDelete($idUser, SessionManager $sessionManager)
    {
        $tUser = TUser::find($idUser);

        if ($tUser != null) {
            $tUser->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente.']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('user/getall');
    }

    public function actionUpdate($idUser, Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                [
                    'first_name' => trim($request->input('txtFirstName')),
                    'last_name' => trim($request->input('txtLastName')),
                    'email' => trim($request->input('txtEmail')),
                    'username' => trim($request->input('txtUsername')),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('txtPhone'),
                    'role' => $request->input('txtRole'),
                ],
                [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:tuser,email,' . $idUser . ',idUser',
                    'username' => 'required|unique:tuser,username,' . $idUser . ',idUser',
                    'gender' => 'required|boolean',
                    'phone' => 'nullable|integer',
                    'role' => 'required',
                ],
                [
                    'first_name.required' => 'El campo "nombre" es requerido.',
                    'last_name.required' => 'El campo "apellido" es requerido.',
                    'email.required' => 'El campo "correo electrónico" es requerido.',
                    'email.email' => 'El formato del correo electrónico es inválido.',
                    'email.unique' => 'El correo electrónico ya está registrado.',
                    'username.required' => 'El campo "nombre de usuario" es requerido.',
                    'username.unique' => 'El nombre de usuario ya está registrado.',
                    'gender.required' => 'El campo "género" es requerido.',
                    'gender.boolean' => 'El campo "género" debe ser verdadero o falso.',
                    'phone.integer' => 'El campo "teléfono" debe ser un número entero.',
                    'role.required' => 'El campo "rol" es requerido.',
                ]
            );

            if ($validator->fails()) {
                $errors = $validator->errors()->all();

                foreach ($errors as $value) {
                    $listMessage[] = $value;
                }
            }

            $userToUpdate = TUser::find($idUser);

            if (!$userToUpdate) {
                $listMessage[] = 'El usuario que se intenta editar no existe.';
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('user/edit/' . $idUser); // Redirigir a la página de edición con el ID del usuario
            }

            $userToUpdate->first_name = $request->input('txtFirstName');
            $userToUpdate->last_name = $request->input('txtLastName');
            $userToUpdate->email = $request->input('txtEmail');
            $userToUpdate->username = $request->input('txtUsername');
            $userToUpdate->gender = (bool)$request->input('gender');
            $userToUpdate->phone = $request->input('txtPhone');
            $userToUpdate->role = $request->input('txtRole');

            $userToUpdate->save();

            $sessionManager->flash('listMessage', ['Actualización realizada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');

            return redirect('user/getall');
        }

        // Si no es una solicitud POST, redirigir a la página de edición con el ID del usuario
        return redirect('user/edit/' . $idUser);
    }

    	
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

		return view('admin/verUsuario');
		
	}
	public function verTicket()
	{

		return view('admin/verTicket');
		
	}
}

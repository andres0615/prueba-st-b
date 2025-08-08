<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
// use Exception;
// use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class UserService
{
    /**
     * El modelo que maneja este servicio
     * @var Builder|User
     */
    protected $userModel;

    /**
     * Constructor del servicio
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function store($requestData)
    {

        // Crear un nuevo usuario
        $user = $this->userModel->create([
            'username' => $requestData['username'],
            'password' => Hash::make($requestData['password']),
            'rol' => $requestData['rol'],
            'state' => $requestData['state'],
        ]);


        $responseData = [
            'success' => true,
            'message' => 'Personaje actualizado exitosamente',
            'data' => [
                'user' => $user,
            ]
        ];

        return $responseData;
    }

    public function index()
    {
        // Obtener todos los usuarios
        $users = $this->userModel->all();

        $responseData = [
            'success' => true,
            'message' => 'Personaje actualizado exitosamente',
            'data' => [
                'users' => $users,
            ]
        ];

        return $responseData;
    }

    public function show($id)
    {
        // Obtener todos los usuarios
        $user = $this->userModel->findOrFail($id)->first();

        $responseData = [
            'success' => true,
            'message' => 'Personaje obtenido exitosamente',
            'data' => [
                'user' => $user,
            ]
        ];

        return $responseData;
    }

    public function update($requestData, $id)
    {

        $user = $this->userModel->findOrFail($id)->first();

        $user->username = $requestData['username'];
        $user->rol = $requestData['rol'];
        $user->state = $requestData['state'];

        if(!empty($requestData['password'])){
            $user->password = Hash::make($requestData['password']);
        }


        $user->save();

        $responseData = [
            'success' => true,
            'message' => 'Personaje actualizado exitosamente',
            'data' => [
                'user' => $user,
            ]
        ];

        return $responseData;
    }

    public function delete($id)
    {

        $user = $this->userModel->findOrFail($id)->delete();

        $responseData = [
            'success' => true,
            'message' => 'Personaje eliminado exitosamente',
            'data' => [
            ]
        ];

        return $responseData;
    }
}
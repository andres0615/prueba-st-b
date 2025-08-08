<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    /**
     * El servicio user
     * @var UserService
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request)
    {
        try {
            $responseData = $this->userService->store($request->all());

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el usuario',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function index(Request $request)
    {
        try {
            $responseData = $this->userService->index();

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al listar usuarios',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $responseData = $this->userService->show($id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener usuario',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $responseData = $this->userService->update($request->all(), $id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $responseData = $this->userService->delete($id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }
}

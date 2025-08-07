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
                'message' => 'Error al crear el personaje',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }
}

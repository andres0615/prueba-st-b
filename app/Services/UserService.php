<?php

namespace App\Services;

use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
// use Exception;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Database\Eloquent\Builder;

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
        $responseData = [
            'success' => true,
            'message' => 'Personaje actualizado exitosamente',
            'data' => [
                // 'character' => $character->load('user'),
                // 'chat' => $chat, // Incluir el chat creado
            ]
        ];

        return $responseData;
    }
}
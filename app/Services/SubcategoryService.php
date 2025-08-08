<?php

namespace App\Services;

use App\Models\Subcategory;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class SubcategoryService
{
    /**
     * El modelo que maneja este servicio
     * @var Builder|Subcategory
     */
    protected $subcategoryModel;

    /**
     * Constructor del servicio
     */
    public function __construct(Subcategory $subcategoryModel)
    {
        $this->subcategoryModel = $subcategoryModel;
    }

    public function index()
    {
        // Obtener todos los usuarios
        $subcategories = $this->subcategoryModel->all();

        $responseData = [
            'success' => true,
            'message' => 'Categorias obtenidos exitosamente',
            'data' => [
                'subcategories' => $subcategories,
            ]
        ];

        return $responseData;
    }

    public function store($requestData)
    {

        // Crear un nuevo usuario
        $category = $this->subcategoryModel->create([
            'name' => $requestData['name'],
            'state' => $requestData['state'],
        ]);


        $responseData = [
            'success' => true,
            'message' => 'Subcategoria creada exitosamente',
            'data' => [
                'category' => $category,
            ]
        ];

        return $responseData;
    }
}
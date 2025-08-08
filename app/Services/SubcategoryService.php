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
            'category_id' => $requestData['categoryId'],
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

    public function show($id)
    {
        // Obtener todos los usuarios
        $subcategory = $this->subcategoryModel->findOrFail($id)->first();

        $responseData = [
            'success' => true,
            'message' => 'categoria obtenido exitosamente',
            'data' => [
                'subcategory' => $subcategory,
            ]
        ];

        return $responseData;
    }

    public function update($requestData, $id)
    {

        $subcategory = $this->subcategoryModel->findOrFail($id)->first();

        $subcategory->name = $requestData['name'];
        $subcategory->state = $requestData['state'];
        $subcategory->category_id = $requestData['categoryId'];

        $subcategory->save();

        $responseData = [
            'success' => true,
            'message' => 'Categoria actualizado exitosamente',
            'data' => [
                'subcategory' => $subcategory,
            ]
        ];

        return $responseData;
    }

    public function delete($id)
    {
        $subcategory = $this->subcategoryModel->findOrFail($id)->delete();

        $responseData = [
            'success' => true,
            'message' => 'Subategoria eliminada exitosamente',
            'data' => [
            ]
        ];

        return $responseData;
    }
}
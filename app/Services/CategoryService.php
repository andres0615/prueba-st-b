<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    /**
     * El modelo que maneja este servicio
     * @var Builder|Category
     */
    protected $categoryModel;

    /**
     * Constructor del servicio
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        // Obtener todos los usuarios
        $categories = $this->categoryModel->all();

        $responseData = [
            'success' => true,
            'message' => 'Categorias obtenidos exitosamente',
            'data' => [
                'categories' => $categories,
            ]
        ];

        return $responseData;
    }

    public function store($requestData)
    {

        // Crear un nuevo usuario
        $category = $this->categoryModel->create([
            'name' => $requestData['name'],
            'state' => $requestData['state'],
        ]);


        $responseData = [
            'success' => true,
            'message' => 'Categoria creada exitosamente',
            'data' => [
                'category' => $category,
            ]
        ];

        return $responseData;
    }

    public function show($id)
    {
        // Obtener todos los usuarios
        $category = $this->categoryModel->findOrFail($id)->first();

        $responseData = [
            'success' => true,
            'message' => 'categoria obtenido exitosamente',
            'data' => [
                'category' => $category,
            ]
        ];

        return $responseData;
    }

    public function update($requestData, $id)
    {

        $category = $this->categoryModel->findOrFail($id)->first();

        $category->name = $requestData['name'];
        $category->state = $requestData['state'];

        $category->save();

        if(!$requestData['state']){
            $subcategories = $category->subcategories()->update(['state' => false]);
            // hacer un log de $subcategories
            Log::info('$subcategories: ');
            Log::info($subcategories);
        }
        
        $responseData = [
            'success' => true,
            'message' => 'Categoria actualizado exitosamente',
            'data' => [
                'category' => $category,
            ]
        ];

        return $responseData;
    }

    public function delete($id)
    {

        $category = $this->categoryModel->findOrFail($id)->delete();

        $responseData = [
            'success' => true,
            'message' => 'Categoria eliminada exitosamente',
            'data' => [
            ]
        ];

        return $responseData;
    }
}
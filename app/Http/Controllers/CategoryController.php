<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * El servicio user
     * @var CategoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        try {
            $responseData = $this->categoryService->index();

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al listar categorias',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $responseData = $this->categoryService->store($request->all());

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la categoria',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $responseData = $this->categoryService->show($id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener categoria',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $responseData = $this->categoryService->update($request->all(), $id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el categoria',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $responseData = $this->categoryService->delete($id);

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar categoria',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }
}

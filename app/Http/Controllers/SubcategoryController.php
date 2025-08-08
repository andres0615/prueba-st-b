<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubcategoryService;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * El servicio user
     * @var SubcategoryService
     */
    protected $subcategoryService;

    public function __construct(SubcategoryService $subcategoryService)
    {
        $this->subcategoryService = $subcategoryService;
    }

    public function index(Request $request)
    {
        try {
            $responseData = $this->subcategoryService->index();

            return response()->json($responseData, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al listar categorias',
                'error' => config('app.debug') ? $th->getMessage() : 'Error interno del servidor',
            ], 500);
        }
    }
}

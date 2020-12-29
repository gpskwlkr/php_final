<?php
namespace App\Abstractions;

use Illuminate\Http\Request;

interface iCategoryController {
    public function index();
    public function createCategory(Request $request);
    public function editCategory($id);
    public function updateCategory($id, Request $request);
    public function deleteCategory(Request $request);
}

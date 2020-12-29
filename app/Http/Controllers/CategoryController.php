<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Abstractions\iCategoryController;

class CategoryController extends Controller implements  iCategoryController
{
    public function index() {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function createCategory(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->get('name');
        $category->save();

        return redirect('categories.main');
    }

    public function editCategory($id) {
        $category = Category::findOrFail($id);

        return view('categories.edit', ['category' => $category]);
    }

    public function updateCategory($id, Request $request) {
        $request->validate([
           'name' => 'required'
        ]);

        $category = Category::findOrFail($id);

        if ($category != null) {
            $category->name = $request->get('name');
            $category->save();

            return redirect('categories.index', ['msg' => 'Successfully updated category']);
        }

        return redirect('error', ['msg' => 'Category not found']);
    }

    public function deleteCategory(Request $request)
    {
        // TODO: Implement deleteCategory() method.
    }
}

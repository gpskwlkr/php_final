<?php
namespace App\Abstractions;

use Illuminate\Http\Request;

interface iArticleController {
    public function index();
    public function getFullArticle($id);
    public function createArticle(Request $request);
    public function editArticle($id, Request $request);
    public function updateArticle($id, Request $request);
    public function deleteArticle($id);
}

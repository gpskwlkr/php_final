<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Abstractions\iArticleController;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller implements iArticleController
{
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', ['articles' => $articles]);
    }

    public function getFullArticle($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.single', ['article' => $article]);
    }

    public function createArticle(Request $request)
    {
        $request->validate([
            'small_description' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

        $article = new Article();
        $article->small_description = $request->get('small_description');
        $article->body = $request->get('body');
        $article->category = $request->get('category');

        $article->save();

        return redirect('articles.index');
    }

    public function editArticle($id, Request $request)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', ['article' => $article]);
    }

    public function updateArticle($id, Request $request)
    {
        $request->validate([
            'small_description' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

        $article = Article::findOrFail($id);

        if ($article != null && (Auth::user()->id == $article->author || Auth::user()->is_admin)) {
            $article->small_description = $request->get('small_description');
            $article->body = $request->get('body');

            if(Category::where('id', '=', $request->get('category'))->exists())
            {
                $article->category = $request->get('category');
                $article->save();
            }

            return redirect('articles.index', ['msg' => 'Successfully updated article']);
        }

        return redirect('articles.index', ['msg' => 'Error while updating article']);
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);

        if ($article->author == Auth::user() || Auth::user()->is_admin) {
            Article::destroy($id);

            return redirect('articles.index', ['msg' => 'Successfully deleted article.']);
        }

        return redirect('articles.index', ['msg' => "You can't delete this article."]);
    }
}

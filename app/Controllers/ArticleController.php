<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Story;

class ArticleController extends BaseController
{
    public function index()
{
    $model = new Story();

    // Fetch only articles belonging to the logged-in user
    $userId = session()->get('user_id');
    $data['articles'] = $model->where('author_id', $userId)->where('status', 'published')->findAll();

    return view('article_list', $data);
}

    public function show($id)
    {
        $model = new Story();

        // Fetch the article by its ID and ensure it's published
        $article = $model->where('status', 'published')->find($id);

        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Article not found.");
        }

        return view('article_detail', ['article' => $article]);
    }
}

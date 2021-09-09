<?php

namespace App\Http\Controllers;

use Meta;

use App\Repositories\ArticleRepository;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->getForList(setting('razdely.articles_count',12));

        Meta::registerSeoMetaTagsForArticles($articles);

        return view('public.articles.index',compact('articles'));
    }
   
    /**
     * Show 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $article = $this->articleRepository->getForShow($slug);

        if(empty($article))
            abort(404);

        Meta::registerSeoMetaTagsForArticle($article);

        return view('public.articles.show',compact('article'));
    }
}

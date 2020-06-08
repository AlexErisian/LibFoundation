<?php

namespace App\Http\Controllers\Foundation;

use App\Repositories\PostRepository;
use App\Repositories\PrintingRepository;
use Illuminate\Http\Request;

class SitePageController extends BaseController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var PrintingRepository
     */
    private $printingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = app(PostRepository::class);
        $this->printingRepository = app(PrintingRepository::class);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function mainPage()
    {
        $posts = $this->postRepository->getForMainPage(3);

        $printings = $this->printingRepository->getForMainPage(6);

        return view('main',
            compact('posts', 'printings'));
    }
}
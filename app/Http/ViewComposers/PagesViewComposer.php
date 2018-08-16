<?php

namespace App\Http\ViewComposers;

use App\Page;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class PagesViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $page;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $data = Page::where('url', Request::path())->first();
        $this->page = $data;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('page_info', $this->page);
    }
}
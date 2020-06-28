<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }



    // Top menu for users
    public function topMenu() {
      View::composer('layouts.header', function ($view) {
        $view->with('categories', \App\Category::where('parent_id', 0)->where('published', 1)->get());
      });
    }


     public function footerMenu() {
          View::composer('layouts.app', function ($view) {
            $view->with('systems', \App\System::table('systems')->first());
          });
        }  


    public function admin_dashboard() {
      View::composer('layouts.dashboard_block', function ($view) {
        $view->with('categories', Article::lastArticles(5));
        $view->with('articles', User::lastUsers(5)); 
        $view->with('users_today', User::LastUsersToday(5)); 
        $view->with('count_categories', Category::count());
        $view->with('count_articles', Article::count()); 
        $view->with('count_users', User::count()); 
        $view->with('count_users_today', User::whereDay('created_at','=',date('d'))->count());
      });
    }


}

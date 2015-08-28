<?php namespace App\Http\Middleware;

use Closure;
use Menu;
use App\Http;

class MenuMiddleware
{
    /**
     * Run the request filter.
     * https://github.com/caffeinated/menus/wiki/Active-Link-Detection
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('ecommerce', function($menu) {

            $menu->add('categories', (['class' => 'treeview', 'itemprop' => 'url']), '/Category');



$menu->add('Users', 'admin/users')
    ->prepend('<i class="fa fa-users"></i>')
    ->append('<b class="caret"></b>');

        });

        return $next($request);
    }
}

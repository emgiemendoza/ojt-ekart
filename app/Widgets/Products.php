<?php

namespace App\Widgets;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;

class Products extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //$count = Voyager::model('Product')->count();
        $count = Product::count();
        $string = trans_choice('Products', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-shop',
            'title'  => "{$count} {$string}",
            //'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'text'   => 'You have ' . $count . ' ' . Str::lower($string) . ' in your database. Click on button below to view all ' . Str::lower($string) . '.', 
            'button' => [
                'text' => "Products",
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}

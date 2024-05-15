<?php

namespace App\Widgets;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;

class Users extends AbstractWidget
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
        //$count = Voyager::model('User')->count();
        $count = Voyager::model('User')->where("role_id", "=", "2")->count();
        $countNon = Voyager::model('User')->where("role_id", "=", "5")->count();
        $countNew = Voyager::model('User')->where("role_id", "=", "6")->count();
        //$string = trans_choice('voyager::dimmer.user', $count);
        $string = trans_choice('Active Members', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string} <br> {$countNon} Non Members <br> {$countNew} For Verification",
            //'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'text'   => 'You have ' . $count . ' ' . Str::lower($string) . ' in your database. Click on button below to view all ' . Str::lower($string) . '.', 
            'button' => [
                'text' => __('voyager::dimmer.user_link_text'),
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
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

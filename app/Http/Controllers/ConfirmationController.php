<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyou');
    }

    public function nonmember()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyounon');
    }

    public function newmember()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyounew');
    }
}

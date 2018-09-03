<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.show');
    }

    public function getList(Request $request)
    {
        if( $request->ajax() )
        {


        }else{
            $this->redirect('');
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/28/2016
 * Time: 2:19 PM
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function index()
    {
        return view('welcome');
    }

    public function showInfo()
    {
        return view('welcome.info');
    }

    public function testDinhDanh()
    {
        return redirect()->route('sg');
    }
}
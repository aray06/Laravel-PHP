<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $studentInfo = 'Aray Yessengeldiyeva 25B032092';


        return view('welcome', [
            'footerNote' => 'Это сообщение пришло из контроллера!']);
    }
}

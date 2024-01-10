<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormValidationController extends Controller
{
    public function contactUsSubmit	(){
    

    	return view('contact-us');
    }
    public function validationPost(Request $request){


    }
}

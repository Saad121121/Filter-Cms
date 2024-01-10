<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use App\Product;
use App\Banner;
use App\orders;
use Auth;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;


class AccountController extends Controller
{	
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;
	 

	public function orders()
    {
		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.orders',['ORDERS'=>$orders]); 
		
	}

	public function signin()
    {
		return view('account.signin'); 
	}

	public function signup()
    {
		return view('account.signup'); 
	}

	
}	
	
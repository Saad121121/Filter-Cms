<?php
namespace App\Http\Controllers;
use Helper;
use View;
use Illuminate\Http\Request;
use Cache;
use Session;
use App\products;
use App\wishlists;
use App\imagetable;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class WishlistController extends Controller
{
	 public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
		$favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();	

        //$profile = Profile::where('user_id', Auth::user()->id)->first();

		View()->share('logo',$logo);
		View()->share('favicon',$favicon);

    }
    public function index(){
    	if(Auth::check())
    	{
    		$wishlist = DB::select("SELECT * FROM wishlists where user_id = ".Auth::user()->id);
			return view('wishlist')->with('header',true)->with('title','wishlist')->with(compact('wishlist'));
		}else
			return redirect()->route('home')->with('notify_error','Login first to see wishlist');
	}
	public function add()
    {
		if(Auth::check()){
			//$data = array();
			if($_POST['status'] == 'checked' ){
				$wishlistRemove=$this->remove($_POST['productId']);
				$wish = json_decode($wishlistRemove);
				if($wish->status == 1)
					$data=['message'=>'product remove from wishlist','status'=>'unchecked'];
				/*else
					$data=['message'=>'Login Before removing to wishlist','status'=>'error'];*/
			}
			else{
				$wishlist =	new wishlists;
				$wishlist->product_id = $_POST['productId'];
				$wishlist->user_id = Auth::user()->id;
				$wishlist->save();
				$data=['message'=>'Product Added to wishlist','status'=>'checked'];	
			}
		}
		else
			$data=['message'=>'Login Before adding/removing to wishlist','status'=>'error'];	
		
		return json_encode($data);		
	}
	
	public function remove($product_id=''){
		if(Auth::check())
		{
			if(isset($_POST['product_id']) and !empty($_POST['product_id']))
				$product_id = $_POST['product_id'];
			if($product_id != "")
			{
				wishlists::where(['product_id'=>$product_id,'user_id'=>Auth::user()->id])->delete();
				return json_encode(array("status"=>1,"data"=>'success'));
			}
		}
		else
			return;
	}


	    public function addwishlist(Request $req){
    	// dd($_POST);
    	if(Auth::user()->id){		
	        if(!empty($req->id)){
				$wishlist=wishlists::where('product_id',$req->id)->where('user_id',Auth::user()->id)->first();
				if(!$wishlist){
					$data= new wishlists;
					$data->product_id=$req->id;
					$data->user_id=Auth::user()->id;
					$data->save();

	                Session::flash('message', 'Wishlist Added!'); 
	                Session::flash('alert-class', 'alert-success');
					return back();
					
				}else{
					$wishlist->delete();
	                Session::flash('flash_message', 'Wishlist Removed!'); 
	                Session::flash('alert-class', 'alert-success');
					return back();
				}
			}
    	}
		return;
    }
    public function index2(){
		
        $wishlist=wishlist::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(12);
		return view('customer.wishlist')->with('title','Wishlist')->with('wishlistActive',true)->with(compact('wishlist'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use Illuminate\Support\Facades\Redirect;
use App\newsletter;
use App\Program;
use App\imagetable;
use App\Product;
use App\Banner;
use App\orders;
use App\orders_products;
use App\Http\Requests\OrderRequest;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;
use Auth;
use Hash;
use Stripe;
use Stripe\Customer;
use Stripe\Charge;

class OrderController extends Controller
{

	use HelperTrait;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// use Helper;

	public function __construct()
	{
		// $this->middleware('guest');
		$logo = imagetable::select('img_path')
			->where('table_name', '=', 'logo')
			->first();

		$favicon = imagetable::select('img_path')
			->where('table_name', '=', 'favicon')
			->first();

		View()->share('logo', $logo);
		View()->share('favicon', $favicon);
		//View()->share('config',$config);
	}



	public function checkout()
	{

		$language = Session::get('language');
		$product_detail = DB::table('products')->first();

		if (Session::get('cart') && count(Session::get('cart')) > 0) {

			$countries = DB::table('countries')->get();
			return view('shop.checkout', ['cart' => Session::get('cart'), 'countries' => $countries, 'language' => $language, 'product_detail' => $product_detail]);
		} else {
			Session::flash('flash_message', 'No Product found');
			Session::flash('alert-class', 'alert-success');
			return redirect('/');
		}
	}


	public function getStates(Request $request)
	{

		$states = DB::table('states')->where('country_id', $request->country_id)->get();
		echo json_encode(array("states" => $states));
	}
	

	public function getCities(Request $request)
	{

		$cities = DB::table('cities')->where('state_id', $request->state_id)->get();
		echo json_encode(array("cities" => $cities));
	}

	public function newOrder(Request $request)
	{

		define("ENV", "demo"); //demo OR pro

		if (ENV == 'demo') {
			$endpoint = 'https://apidemo.myfatoorah.com';
			$username = "apiaccount@myfatoorah.com";
			$password = "api12345*";
		} else {
			$endpoint = 'https://apikw.myfatoorah.com/swagger/ui/index';
			$username = "Ndeumens@ninolife.com";
			$password = "Noah&0306";
		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "{$endpoint}/Token");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'grant_type' => 'password',
			'username' => $username,
			'password' => $password
		)));
		$result = curl_exec($curl);
		$info = curl_getinfo($curl);
		curl_close($curl);
		$json = json_decode($result, true);

		if (isset($json['access_token']) && !empty($json['access_token'])) {
			$access_token = $json['access_token'];
		} else {
			$access_token = '';
		}

		$cart = Session::get('cart');
		$product_detail = DB::table('products')->first();



		if (Session::get('language') == 'ksa') {
			$price = $product_detail->sar_price;
		} elseif (Session::get('language') == 'uae') {
			$price = $product_detail->price;
		} elseif (Session::get('language') == 'qatar') {
			$price = $product_detail->qar_price;
		} elseif (Session::get('language') == 'bahrain') {
			$price = $product_detail->bhr_price;
		} elseif (Session::get('language') == 'oman') {
			$price = $product_detail->omr_price;
		} elseif (Session::get('language') == 'jordan') {
			$price = $product_detail->jod_price;
		} elseif (Session::get('language') == 'egypt') {
			$price = $product_detail->egp_price;
		} elseif (Session::get('language') == 'kuwait') {
			$price = $product_detail->kwd_price;
		} else {
			$price = $product_detail->price;
		}

		$t = time();

		if (Session::get('language') == 'ksa') {
			$currency = 'SAR';
		} elseif (Session::get('language') == 'uae') {
			$currency = 'AED';
		} elseif (Session::get('language') == 'qatar') {
			$currency = 'QAR';
		} elseif (Session::get('language') == 'bahrain') {
			$currency = 'BHD';
		} elseif (Session::get('language') == 'oman') {
			$currency = 'OMR';
		} elseif (Session::get('language') == 'jordan') {
			$currency = 'JOD';
		} elseif (Session::get('language') == 'egypt') {
			$currency = 'EGP';
		} elseif (Session::get('language') == 'kuwait') {
			$currency = 'KWD';
		} else {
			$currency = 'AED';
		}


		// dd($currency);

		//dd($price);
		//return;
		$name = $_POST['first_name'] . " " . $_POST['last_name'];
		$post_string = array();
		$post_string['InvoiceValue'] = 10;
		$post_string['CustomerName'] = $name;
		$post_string['CustomerBlock'] = $_POST['area'];
		$post_string['CustomerStreet'] = "Street";
		$post_string['CustomerHouseBuildingNo'] = $_POST['building'];
		$post_string['CustomerCivilId'] = "123456789124";
		$post_string['CustomerAddress'] = $_POST['address_line_1'];
		$post_string['CustomerReference'] = $t;
		$post_string['DisplayCurrencyIsoAlpha'] = $currency;
		$post_string['CountryCodeId'] = $_POST['country_code'];
		$post_string['CustomerMobile'] = $_POST['phone_no'];
		$post_string['CustomerEmail'] = $_POST['email'];
		$post_string['DisplayCurrencyId'] = 3;
		$post_string['SendInvoiceOption'] = 1;
		$post_string['payment_method'] = $_POST['payment_method'];
		$post_string['company_name'] = $_POST['company_name'];
		$post_string['city'] = $_POST['city'];
		$post_string['landmark'] = $_POST['landmark'];
		$post_string['floor_num'] = $_POST['floor_num'];
		$post_string['InvoiceItemsCreate'][] = array(
			"ProductId" => null,
			"ProductName" => $cart[1]['name'],
			"Quantity" => $cart[1]['qty'],
			"UnitPrice" => $price
		);
		$post_string['CallBackUrl'] =  "https://www.ninolife.com/payment";
		$post_string['Language'] = 2;
		$post_string['ExpireDate'] = "2022-12-31T13:30:17.812Z";
		$post_string['ApiCustomFileds'] = "weight=10,size=L,lenght=170";
		$post_string['ErrorUrl'] = "https://www.ninolife.com?error=payment";
		$post_string = json_encode($post_string);

		$soap_do     = curl_init();
		curl_setopt($soap_do, CURLOPT_URL, "{$endpoint}/ApiInvoices/CreateInvoiceIso");
		curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
		curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($soap_do, CURLOPT_POST, true);
		curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Content-Length: ' . strlen($post_string),  'Accept: application/json', 'Authorization: Bearer ' . $access_token));
		$result1 = curl_exec($soap_do);
		// echo "<pre>";print_r($result1);die;
		$err    = curl_error($soap_do);
		$json1 = json_decode($result1, true);

		$RedirectUrl = $json1['RedirectUrl'];

		//echo $RedirectUrl;
		//return;

		//redirect::to($RedirectUrl);
		//dd($RedirectUrl);
		$ref_Ex = explode('/', $RedirectUrl);
		//echo "<pre>";
		//print_r($ref_Ex);
		//return;
		$referenceId =  $ref_Ex[4];
		//echo $referenceId;
		//return;
		curl_close($soap_do);

		$orders = new orders();
		$orders->payment_method = $_POST['payment_method'];
		$orders->delivery_country = $_POST['country'];
		$orders->country_code = $_POST['country_code'];
		$orders->delivery_first_name = $_POST['first_name'];
		$orders->delivery_last_name = $_POST['last_name'];
		$orders->order_company = $_POST['company_name'];
		$orders->delivery_address_1 = $_POST['address_line_1'];
		$orders->delivery_city = $_POST['city'];
		$orders->area = $_POST['area'];
		$orders->landmark = $_POST['landmark'];
		$orders->floor_num = $_POST['floor_num'];
		$orders->building = $_POST['building'];
		$orders->order_email = $_POST['email'];
		$orders->delivery_phone_no = $_POST['phone_no'];
		$orders->payment_id = '';
		$orders->order_id = '';
		$orders->track_id = '';
		$orders->ref_id = $referenceId;
		$orders->order_items = count(Session::get('cart'));
		$orders->order_item_total = $_POST['subtotal'];
		$orders->order_total = $_POST['subtotal'];
		//dd($orders,$cart);

		if (isset($_POST['payment_method']) && $_POST['payment_method'] == 'paypal') {
			$orders->transaction_id = $_POST['payment_id'];
			$orders->order_status = $_POST['payment_status'];
			$orders->card_token = $_POST['payer_id'];
		}

		$orders->save();

		$orders = orders::orderBy('id', 'desc')
			->first();

		foreach ($cart as $key => $value) {

			if ($value['name'] != '') {

				$order_products = new orders_products;
				$order_products->order_products_product_id = $value['id'];
				$order_products->order_products_name = $value['name'];
				$order_products->order_products_price = $value['baseprice'];
				$order_products->orders_id = $orders->id;
				$order_products->order_products_qty = $value['qty'];
				$order_products->mat_language = $value['mat_language'];
				$order_products->order_products_subtotal = $value['baseprice'] * $value['qty'];
				$order_products->ref_id = $referenceId;
				$order_products->save();
			}
		}
		//$orders->user_id= $id;




		//echo '<br><a href="'.$RedirectUrl.'" id="paymentRedirect"  class="btn btn-success">Click here to Payment Link</a>';
		Session::forget('cart');
		return view('shop.checkout2', ['cart' => Session::get('cart'), 'RedirectUrl' => $RedirectUrl]);
	}

	public function success()
	{
		return view('account.success');
	}

	public function placeOrder(Request $request)
	{

		$validateArr = array();
		$messageArr = array();
		$validateArr['country'] = 'required|max:50';
		$validateArr['first_name'] = 'required|max:255';
		$validateArr['address_line_1'] = 'required|max:255';
		$validateArr['city'] = 'required|max:50';
		$validateArr['email'] = 'required|max:20';
		$validateArr['phone_no'] = 'required|max:20';
		$messageArr['first_name.required'] = 'The first name field is required.';

		$id = 0;
		if (isset($_POST['create_account'])) {


			if ($_POST['password'] == '') {

				$validateArr['password'] = 'min:6|required_with:confirm_password|same:confirm_password';
				$validateArr['confirm_password'] = 'min:6';
			} else {

				$validateArr['email'] = 'required|max:255|email|unique:users';
				$this->validate($request, $validateArr, $messageArr);

				$pw = Hash::make($_POST['password']);
				$fullName = $request->first_name . " " . $request->last_name;

				DB::insert("INSERT INTO users(email,name,password) values('" . $_POST['email'] . "','" . $fullName . "','" . $pw . "')");


				$user = DB::table('users')->orderBy('id', 'desc')->first();
				$id = $user->id;
			}
		}

		$validateArr['email'] = 'required|max:255|email';
		$this->validate($request, $validateArr, $messageArr);

		if (Auth::check()) {
			$id = Auth::user()->id;
		}

		$cart = Session::get('cart');

		$subtotal = 0;
		foreach ($cart as $key => $value) {
			$subtotal +=	$value['baseprice'] * $value['qty'];
		}

		$order = new orders();

		$order->delivery_country = $request->country;
		$order->country_code = $request->country_code;
		$order->delivery_first_name = $request->first_name;
		$order->delivery_last_name = $request->last_name;
		$order->order_company = $request->company_name;
		$order->delivery_address_1 = $request->address_line_1;
		$order->delivery_address_2 = $request->address_line_2;
		$order->delivery_city = $request->city;
		$order->delivery_state = $request->state;
		$order->delivery_zip_code = $request->zip_code;
		$order->area = $request->area;
		$order->landmark = $request->landmark;
		$order->floor_num = $request->floor_num;
		$order->building = $request->building;
		$order->order_shipping = $cart['shipping'];
		$order->country_code = $request->country_code;

		$order->order_email = $request->email;
		$order->delivery_phone_no = $request->phone_no;
		$order->order_notes = $request->order_notes;
		$order->order_company = $request->company_name;
		$order->payment_method = $request->payment_method;

		$order->order_items = count(Session::get('cart'));

		$order->order_item_total = $subtotal;


		$total +=	$subtotal + $cart['shipping'];

		$order->order_total = $total;

		$order->user_id = $id;

		if (isset($_POST['payment_method']) && $_POST['payment_method'] == 'paypal') {
			$order->transaction_id = $_POST['payment_id'];
			$order->order_status = $_POST['payment_status'];
			$order->card_token = $_POST['payer_id'];
		} elseif (isset($_POST['payment_method']) && $_POST['payment_method'] == 'cash') {
			$order->order_status = "succeeded";
		} else {

			try {



				try {
					Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

					$customer = \Stripe\Customer::create(array(
						'email' => $request->email,
						'name' => $request->first_name,
						'phone' => $request->phone_no,
						'description' => "Client Created From Website",
						'source'  => $request->stripeToken,
					));
				} catch (Exception $e) {
					return redirect()->back()->with('stripe_error', $e->getMessage());
				}

				try {
					$charge = \Stripe\Charge::create(array(
						'customer' => $customer->id,
						'amount'   => $total * 100,
						'currency' => 'USD',
						'description' => "Payment From Website",
						'metadata' => array("name" => $request->first_name, "email" => $request->email),
					));
				} catch (Exception $e) {
					return redirect()->back()->with('stripe_error', $e->getMessage());
				}
			} catch (Exception $e) {
				return redirect()->back()->with('stripe_error', $e->getMessage());
			}
			$chargeJson = $charge->jsonSerialize();
			// Check whether the charge is successful 
			if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
				$transactionID = $chargeJson['balance_transaction'];
				$payment_status = $chargeJson['status'];
				$order->transaction_id = $transactionID;
				$order->order_status = $payment_status;
			}
		}

		$record = orders::latest()->first();
		$expNum = explode('-', $record->invoice_number);
		$order->invoice_number = rand(0, 999999999999999);

		if ($order->save()) {

			$orders = orders::orderBy('id', 'desc')
				->first();
			$subtotal = 0;
			foreach ($cart as $key => $value) {
				if ($value['name'] != '') {
					$order_products = new orders_products;
					$order_products->order_products_product_id = $value['id'];
					$order_products->user_id = Auth::user()->id;
					$order_products->order_products_name = $value['name'];
					$order_products->order_products_price = $value['baseprice'];
					$order_products->orders_id = $orders->id;
					$order_products->order_products_qty = $value['qty'];
					$order_products->mat_language = $value['mat_language'];
					$order_products->shipping = $cart['shipping'];
					$order_products->order_products_subtotal = $value['baseprice'] * $value['qty'] + $value['variant_price'];

					$order_products->variants = json_encode($value['variation']);
					$order_products->save();
				}
			}

			Session::forget('cart');

			Session::flash('message', 'Your Order has been placed Successfully');
			Session::flash('alert-class', 'alert-success');
			//echo "data saved";
			//return;
			if (Auth::check()) {
				return redirect('/');
			} else {
				return redirect('/');
			}
		}
	}

	public function payment()
	{

		if (isset($_GET['paymentId'])) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, 'https://apidemo.myfatoorah.com/Token');
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password', 'username' => 'apiaccount@myfatoorah.com', 'password' => 'api12345*')));
			$result = curl_exec($curl);
			$error = curl_error($curl);
			$info = curl_getinfo($curl);
			curl_close($curl);
			$json = json_decode($result, true);
			$access_token = $json['access_token'];
			$token_type = $json['token_type'];
			if (isset($_GET['paymentId'])) {
				$id = $_GET['paymentId'];
			}
			$password = 'api12345*';
			$url = 'https://apidemo.myfatoorah.com/ApiInvoices/Transaction/' . $id;
			$soap_do1 = curl_init();
			curl_setopt($soap_do1, CURLOPT_URL, $url);
			curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
			curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($soap_do1, CURLOPT_POST, false);
			curl_setopt($soap_do1, CURLOPT_POST, 0);
			curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
			curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json', 'Authorization: Bearer ' . $access_token));
			$result_in = curl_exec($soap_do1);
			$err_in = curl_error($soap_do1);
			$file_contents = htmlspecialchars(curl_exec($soap_do1));
			curl_close($soap_do1);
			$getRecorById = json_decode($result_in, true);

			//dd($getRecorById,$getRecorById['InvoiceItems'][0]['ProductName']);


			DB::table('orders')
				->where('ref_id', $getRecorById['InvoiceId'])
				->update([
					'transaction_id' => $getRecorById['TransactionId'], 'payment_id' => $getRecorById['PaymentId'], 'payment_method' => $getRecorById['PaymentGateway']
				]);
			DB::table('orders_products')
				->where('ref_id', $getRecorById['InvoiceId'])
				->update([
					'order_products_name' => $getRecorById['InvoiceItems'][0]['ProductName'], 'order_products_price' => $getRecorById['InvoiceItems'][0]['UnitPrice'], 'order_products_qty' => $getRecorById['InvoiceItems'][0]['Quantity'], 'order_products_subtotal' => $getRecorById['InvoiceItems'][0]['ExtendedAmount']
				]);
		}
		return view('account.success');
	}
}

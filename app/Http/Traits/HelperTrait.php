<?php 

namespace App\Http\Traits;
use DB;
use Auth;
trait HelperTrait
{
	//if (!function_exists('testMe')) {
		  public static function returnFlag($id=false) {
			  
			  // return "it works";
			  $result = DB::table('m_flag')->where('id', $id)->first();
			  return $result->flag_value;
			  
			  
		  }

	//}	

	public static function getServicesList()
	{
		$list = DB::table('services')->select('id','page_title')->get();
		return $list;
	}

	   public static function IsPackageExpired() {
		   
		   
			$flag = false;	
			
			if(Auth::check()) {
			
				$pacakge =	DB::table('user_membership')
								->where('user_id', Auth::user()->id)
								->where('is_active', 1)
								->select('created_at')
								->first();
							
				if(count($pacakge) > 0) {
					
					$date1 = date('Y-m-d');
					$date2 = date('Y-m-d',strtotime('+30 days',strtotime($pacakge->created_at))) . PHP_EOL; 
					
					if ($date1 > $date2)  {
						 DB::table('user_membership')
								->where('user_id', Auth::user()->id)
								->update(['is_active'=>'0']);
								
						$flag = false;
						
					} else {
						$flag = true;
					}
					
				}

			}	
			return $flag;	
	
	
	}
	
}	


?>
<?php

/**
 *
 */
namespace App\Http\Helpers;
use Session;
class UserSystemInfoHelper
{
  private static function get_user_agent(){
  		return $_SERVER['HTTP_USER_AGENT'];
  	}

  	public static function get_ip(){

         $ipaddress = '';
         if (isset($_SERVER['HTTP_CLIENT_IP']))
             $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
         else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_X_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
         else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_FORWARDED'];
         else if(isset($_SERVER['REMOTE_ADDR']))
             $ipaddress = $_SERVER['REMOTE_ADDR'];
         else
             $ipaddress = 'UNKNOWN';
             
             
         
             
         return $ipaddress;

  	}
  	
  	public static function ip_visitor_country()
    {
    
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        $country  = "Unknown";
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);
    
        $ip_data = json_decode($ip_data_in,true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/
    
        if($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }
        
        // return $country;
         $getip =  $country;
         
         if ($getip == 'United Arab Emirates') {
            
            Session::put('language','uae');
            
        } else if($getip == 'Saudi Arabia') {
            
             Session::put('language','ksa');
             
        } else if($getip == 'Kuwait') {
            
             Session::put('language','uae');
             
        } else if($getip == 'Bahrain') {
            
             Session::put('language','bahrain');
             
        } else if($getip == 'Qatar') {
            
             Session::put('language','qatar');
             
        } else if($getip == 'Oman') {
            
             Session::put('language','oman');
             
        } else if($getip == 'Jordan') {
            
             Session::put('language','jordan');
             
        } else if($getip == 'Egypt') {
            
             Session::put('language','egypt');
             
        } else {
            
             Session::forget('language');
             
        }  
        
        
        
        
    
        // return 'IP: '.$ip.' # Country: '.$country;
    }
  	
  	
  	

  	public static function get_os(){

  		$user_agent = self::get_user_agent();
  		$os_platform = "Unknown OS Platform";
  		$os_array = array(
  			'/windows nt 10/i'  => 'Windows 10',
  			'/windows nt 6.3/i'  => 'Windows 8.1',
  			'/windows nt 6.2/i'  => 'Windows 8',
  			'/windows nt 6.1/i'  => 'Windows 7',
  			'/windows nt 6.0/i'  => 'Windows Vista',
  			'/windows nt 5.2/i'  => 'Windows Server 2003/XP x64',
  			'/windows nt 5.1/i'  => 'Windows XP',
  			'/windows xp/i'  => 'Windows XP',
  			'/windows nt 5.0/i'  => 'Windows 2000',
  			'/windows me/i'  => 'Windows ME',
  			'/win98/i'  => 'Windows 98',
  			'/win95/i'  => 'Windows 95',
  			'/win16/i'  => 'Windows 3.11',
  			'/macintosh|mac os x/i' => 'Mac OS X',
  			'/mac_powerpc/i'  => 'Mac OS 9',
  			'/linux/i'  => 'Linux',
  			'/ubuntu/i'  => 'Ubuntu',
  			'/iphone/i'  => 'iPhone',
  			'/ipod/i'  => 'iPod',
  			'/ipad/i'  => 'iPad',
  			'/android/i'  => 'Android',
  			'/blackberry/i'  => 'BlackBerry',
  			'/webos/i'  => 'Mobile',
  		);

  		foreach ($os_array as $regex => $value){
  			if(preg_match($regex, $user_agent)){
  				$os_platform = $value;
  			}
  		}
  		return $os_platform;
  	}

  	public static function get_browsers(){

  		$user_agent= self::get_user_agent();

  		$browser = "Unknown Browser";

  		$browser_array = array(
  			'/msie/i'  => 'Internet Explorer',
  			'/Trident/i'  => 'Internet Explorer',
  			'/firefox/i'  => 'Firefox',
  			'/safari/i'  => 'Safari',
  			'/chrome/i'  => 'Chrome',
  			'/edge/i'  => 'Edge',
  			'/opera/i'  => 'Opera',
  			'/netscape/'  => 'Netscape',
  			'/maxthon/i'  => 'Maxthon',
  			'/knoqueror/i'  => 'Konqueror',
  			'/ubrowser/i'  => 'UC Browser',
  			'/mobile/i'  => 'Safari Browser',
  		);

  		foreach($browser_array as $regex => $value){
  			if(preg_match($regex, $user_agent)){
  				$browser = $value;
  			}
  		}
  		return $browser;
  	}

  	public static function get_device(){

  		$tablet_browser = 0;
  		$mobile_browser = 0;

  		if(preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
  			$tablet_browser++;
  		}

  		if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
  			$mobile_browser++;
  		}

  		if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),
  		'application/vnd.wap.xhtml+xml')> 0) or
  			((isset($_SERVER['HTTP_X_WAP_PROFILE']) or
  				isset($_SERVER['HTTP_PROFILE'])))){
  					$mobile_browser++;
  		}

  			$mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
  			$mobile_agents = array(
  				'w3c','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
  				'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',

  				'newt','noki','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',

  				'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
  				'wapr','webc','winw','winw','xda','xda-');

  				if(in_array($mobile_ua,$mobile_agents)){
  					$mobile_browser++;
  				}

  				if(strpos(strtolower(self::get_user_agent()),'opera mini') > 0){
  					$mobile_browser++;

  					//Check for tables on opera mini alternative headers

  					$stock_ua =
  					strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?
  					$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:
  					(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?
  					$_SERVER['HTTP_DEVICE_STOCK_UA']:''));

  					if(preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)){
  						$tablet_browser++;
  					}
  				}

  				if($tablet_browser > 0){
  					//do something for tablet devices

  					return 'Tablet';
  				}
  				else if($mobile_browser > 0){
  					//do something for mobile devices

  					return 'Mobile';
  				}
  				else{
  					//do something for everything else
  						return 'Computer';
  				}

  	}

    public static function getusersysteminfo()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        
        $ipdat = @json_decode(file_get_contents( 
            "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
           
        echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
        echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
        echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
        echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
        echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
        echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
        echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
        echo 'Timezone: ' . $ipdat->geoplugin_timezone; 

    }
}
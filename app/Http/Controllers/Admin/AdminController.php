<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\imagetable;
use Auth;
use App\inquiry;
use DB;
use Image;
use File;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */

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

		View()->share('logo',$logo);
		View()->share('favicon',$favicon);
		
	}
	
    public function index()
    {
        return view('auth.login')->with('title','Josue Francois');;
    } 
	
	public function dashboard()
    {
        return view('admin.dashboard.index');
    } 
	

    public function configSettingUpdate()
    {
	
        if(isset($_POST)) {

            foreach($_POST as $key=>$value) {
                if($key=='_token') {
                    continue;
                }

                DB::UPDATE("UPDATE m_flag set flag_value = '".$value."',flag_additionalText = '".$value."' where flag_type = '".$key."'");	

               
            }
        }
		session()->flash('message', 'Successfully Updated');
        return redirect('admin/config/setting');
        
    }
	
	public function faviconEdit() {
		
		$user = Auth::user();
		$favicon = DB::table('imagetable')->where('table_name', 'favicon')->first();
		
		return view('admin.dashboard.index-favicon')->with(compact('favicon'))->with('title',$user->name.' Edit Favicon');
		
    }

	public function faviconUpload(Request $request) {
			
			$validArr = array();
			if($request->file('image')) {
				$validArr['image'] = 'required|mimes:jpeg,jpg,png,gif|required|max:10000';
			}	
		
			$this->validate($request, $validArr);
		
			$requestData = $request->all();
			$imagetable = imagetable::where('table_name', 'favicon')->first();
			
			if(count($imagetable) == 0) {
				
				$file = $request->file('image');
			
                $destination_path = public_path('uploads/imagetable/');
                $profileImage = date("Ymd").".".$file->getClientOriginalExtension();

                Image::make($file)->resize(16, 16)->save($destination_path . DIRECTORY_SEPARATOR. $profileImage);

				$image = new imagetable;				
                $image->img_path = 'uploads/imagetable/'.$profileImage;
				$image->table_name = 'favicon';
                $image->save();
				
				
			} else {
				
				if ($request->hasFile('image')) {
					$image_path = public_path($imagetable->img_path);
					
					if(File::exists($image_path)) {
						File::delete($image_path);
					}
				
					$file = $request->file('image');
					$fileNameExt = $request->file('image')->getClientOriginalName();
					$fileNameForm = str_replace(' ', '_', $fileNameExt);
					$fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
					$fileExt = $request->file('image')->getClientOriginalExtension();
					$fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
					
					
					$pathToStore = public_path('uploads/imagetable/');
					Image::make($file)->resize(16, 16)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

				
					imagetable::where('table_name', 'favicon')
							->update(['img_path' => 'uploads/imagetable/'.$fileNameToStore]);
					
				}
				
			}

			session()->flash('message', 'Successfully updated the favicon');
			return redirect('admin/favicon/edit');
       
	}
	

	public function logoEdit() {
		
		$user = Auth::user();
		
		return view('admin.dashboard.index-logo')->with('title',$user->name.'  Edit Logo');
		
    }

	public function logoUpload(Request $request) {
		
			$validArr = array();
			if($request->file('image')) {
				$validArr['image'] = 'required|mimes:jpeg,jpg,png,gif|required|max:10000';
			}	
		
			$this->validate($request, $validArr);
			
			$requestData = $request->all();
			$imagetable = imagetable::where('table_name', 'logo')->first();
			
			if(count($imagetable) == 0) {
				
				$file = $request->file('image');
			
                $destination_path = public_path('uploads/imagetable/');
                $profileImage = date("Ymd").".".$file->getClientOriginalExtension();

                Image::make($file)->save($destination_path . DIRECTORY_SEPARATOR. $profileImage);

				$image = new imagetable;				
                $image->img_path = 'uploads/imagetable/'.$profileImage;
				$image->table_name = 'logo';
                $image->save();
				
				
			} else {
				
				if ($request->hasFile('image')) {
					
					$image_path = public_path($imagetable->img_path);
					
					if(File::exists($image_path)) {
						File::delete($image_path);
					}
				
					$file = $request->file('image');
					$fileNameExt = $request->file('image')->getClientOriginalName();
					$fileNameForm = str_replace(' ', '_', $fileNameExt);
					$fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
					$fileExt = $request->file('image')->getClientOriginalExtension();
					$fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
					
					
					$pathToStore = public_path('uploads/imagetable/');
					Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

				
					imagetable::where('table_name', 'logo')
							->update(['img_path' => 'uploads/imagetable/'.$fileNameToStore]);
					
				}

			}

			session()->flash('message', 'Successfully updated the logo');
			return redirect('admin/logo/edit');
	}


	public function contactSubmissions() {
	 	$contact_inquiries = DB::table('inquiry')->get();

	 	return view('admin.inquires.contact_inquiries', compact('contact_inquiries'));

	}
	
	public function contactSubmissionsDelete($id) {

		  $del = DB::table('inquiry')->where('id',$id)->delete();
		  
		  if($del) { 
			  return redirect('admin/contact/inquiries')->with('flash_message', 'Contact deleted!');
		  }
			
	}	

    public function inquiryshow($id)
    {
            $inquiry = inquiry::findOrFail($id);
            return view('admin.inquires.inquirydetail', compact('inquiry'));
    }
    
	public function newsletterInquiries() {
		
	 	$newsletter_inquiries = DB::table('newsletter')->get();

	 	return view('admin.inquires.newsletter_inquiries', compact('newsletter_inquiries'));

	}
	
	public function newsletterInquiriesDelete($id) {
		  $del = DB::table('newsletter')->where('id',$id)->delete();
		  
		  if($del) { 
			  return redirect('admin/newsletter/inquiries')->with('flash_message', 'Contact deleted!');
		  }
			
	}	

	public function configSetting(){
		return view('admin.dashboard.index-config');
	}

}

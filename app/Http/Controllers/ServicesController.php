<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use File;

class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $services = Service::where('page_title', 'LIKE', "%$keyword%")
                ->orWhere('banner_image', 'LIKE', "%$keyword%")
                ->orWhere('main_image', 'LIKE', "%$keyword%")
                ->orWhere('right_image', 'LIKE', "%$keyword%")
                ->orWhere('bottom_content', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $services = Service::paginate($perPage);
            }

            return view('services.services.index', compact('services'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('services.services.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $services = new Service($request->all());

            if ($request->hasFile('banner_image')) {

                $file = $request->file('banner_image');
                
                //make sure yo have image folder inside your public
                $services_path = 'uploads/servicess/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($services_path) . DIRECTORY_SEPARATOR. $profileImage);

                $services->banner_image = $services_path.$profileImage;
            }
            
            if ($request->hasFile('main_image')) {

                $file = $request->file('main_image');
                
                //make sure yo have image folder inside your public
                $services_path = 'uploads/servicess/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();
    
                Image::make($file)->save(public_path($services_path) . DIRECTORY_SEPARATOR. $profileImage);
    
                $services->main_image = $services_path.$profileImage;
            }

            $services->save();
            return redirect()->back()->with('message', 'Service added!');
        }      

        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $service = Service::findOrFail($id);
            return view('services.services.show', compact('service'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $service = Service::findOrFail($id);
            return view('services.services.edit', compact('service'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $services = services::where('id', $id)->first();
            $image_path = public_path($services->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/servicess/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/servicess/'.$fileNameToStore;               
        }


            $service = Service::findOrFail($id);
            $service->update($requestData);
            return redirect()->back()->with('message', 'Service updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('services','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Service::destroy($id);
            return redirect()->back()->with('message', 'Service deleted!');
        }
        return response(view('403'), 403);

    }
}

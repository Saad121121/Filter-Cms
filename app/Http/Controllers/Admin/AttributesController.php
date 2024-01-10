<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\imagetable;
use App\Attributes;
use App\AttributesValue;
use Illuminate\Http\Request;
use Image;
use File;

class AttributesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

            $attributes = Attributes::all();

            return view('admin.attributes.index', compact('attributes'));
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
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            

            return view('admin.attributes.create');
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
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'code' => 'required',
            'name' => 'required'
		]);
            // $requestData = $request->all();
            $attributes = new attributes;

            $attributes['code'] = $request->input('code');
            $attributes['name'] = $request->input('name');
            
            $attributes->save();
            return redirect('admin/attributes')->with('message', 'Banner added!');
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
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $attributes = Attributes::findOrFail($id);
            return view('admin.attributes.show', compact('attributes'));
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
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $attributes = Attributes::findOrFail($id);


            return view('admin.attributes.edit', compact('attributes'));
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
        $model = str_slug('attributes','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
            
        ]);


        $requestData['code'] = $request->input('code');
        $requestData['name'] = $request->input('name');
       
        if ($request->hasFile('image')) {
			
				
			$banner = attributes::where('id', $id)->first();
			$image_path = public_path($banner->image);	
			
			if(File::exists($image_path)) {
				
				File::delete($image_path);
			} 

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/banner/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);
			$requestData['image'] = 'uploads/banner/'.$fileNameToStore;        
			
        }

        attributes::where('id', $id)
                  ->update($requestData);

       
        session()->flash('message', 'Successfully updated the Banner');
        return redirect('admin/attributes');
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
       // $model = str_slug('banner','-');
       // if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
        attributes::destroy($id);

            return redirect('admin/attributes')->with('flash_message', 'Banner deleted!');
       // }
       // return response(view('403'), 403);

    }
}

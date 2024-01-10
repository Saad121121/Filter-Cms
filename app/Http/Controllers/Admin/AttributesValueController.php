<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\imagetable;
use App\AttributeValue;
use App\Attributes;
use Illuminate\Http\Request;
use Image;
use File;
use DB;

class AttributesValueController extends Controller
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

            $attributes = AttributeValue::all();

            return view('admin.attributesvalue.index', compact('attributes'));
        }
        return response(view('403'), 403);

    }

    public function getdata(request $request )
    {
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

            $value = $request->value;

            $attributes = AttributeValue::where('attribute_id' , $value)->get();

            if($attributes){
                return response()->json(['message'=> $attributes, 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }
        return response(view('403'), 403);

    }

    public function img_delete(request $request )
    {
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

            $id = $request->id;
            // dump($id);
            // die();
            $product_images = DB::table('product_imagess')
                          ->where('id', $id)
                          ->delete();

            // $attributes = AttributeValue::where('attribute_id' , $value)->get();

            if($product_images){
                return response()->json(['message'=> "Update", 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }
        return response(view('403'), 403);

    }

    public function deleteProVariant(request $request )
    {
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

            $id = $request->id;
            $product_variant = DB::table('product_attributes')
                                ->where('id', $id)
                                ->delete();

            if($product_variant){
                return response()->json(['message'=> "Update", 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $attributeall = Attributes::all();

            return view('admin.attributesvalue.create', compact('attributeall'));
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'attribute_id' => 'required',
            'value' => 'required'
		]);
            // $requestData = $request->all();
            $attributes = new AttributeValue;

            $attributes['attribute_id'] = $request->input('attribute_id');
            $attributes['value'] = $request->input('value');
            
            $attributes->save();
            return redirect('admin/attributes-value')->with('message', 'Value added!');
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $attributes = AttributeValue::findOrFail($id);
            return view('admin.attributesvalue.show', compact('attributes'));
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $attributes = AttributeValue::findOrFail($id);
            $attributeall = Attributes::all();

            return view('admin.attributesvalue.edit', compact('attributes', 'attributeall'));
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
        $model = str_slug('attributesvalue','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
            
        ]);


        $requestData['attribute_id'] = $request->input('attribute_id');
        $requestData['value'] = $request->input('value');
       
        if ($request->hasFile('image')) {
			
				
			$banner = AttributeValue::where('id', $id)->first();
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

        AttributeValue::where('id', $id)
                  ->update($requestData);

       
        session()->flash('message', 'Successfully updated');
        return redirect('admin/attributes-value');
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
        attributevalue::destroy($id);

            return redirect('admin/attributes-value')->with('flash_message', 'Value deleted!');
       // }
       // return response(view('403'), 403);

    }
}

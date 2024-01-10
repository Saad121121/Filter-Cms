<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Image;
use File;

class SocialMediaController extends Controller
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('se
            3arch');
            $perPage = 25;

            if (!empty($keyword)) {
                $socialmedia = SocialMedia::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $socialmedia = SocialMedia::paginate($perPage);
            }
           
            return view('admin.social-media.index', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.social-media.create');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'image' => 'required'
		]);

            $socialmedia = new SocialMedia($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $socialmedia_path = 'uploads/socialmedias/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($socialmedia_path) . DIRECTORY_SEPARATOR. $profileImage);

                $socialmedia->image = $socialmedia_path.$profileImage;
            }
            
            $socialmedia->save();
            return redirect()->back()->with('message', 'SocialMedia added!');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $socialmedia = SocialMedia::findOrFail($id);
            return view('admin.social-media.show', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $socialmedia = SocialMedia::findOrFail($id);
            return view('admin.social-media.edit', compact('socialmedia'));
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'image' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $socialmedia = SocialMedia::where('id', $id)->first();
            $image_path = public_path($socialmedia->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/socialmedias/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/socialmedias/'.$fileNameToStore;               
        }


            $socialmedia = SocialMedia::findOrFail($id);
            $socialmedia->update($requestData);
            return redirect()->back()->with('message', 'SocialMedia updated!');
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
        $model = str_slug('socialmedia','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SocialMedia::destroy($id);
            return redirect()->back()->with('message', 'SocialMedia deleted!');
        }
        return response(view('403'), 403);

    }
}

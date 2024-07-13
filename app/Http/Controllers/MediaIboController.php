<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaIboDomainUrl;
use App\Models\MediaIboContactDetail;
use App\Models\MediaIboVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MediaIboController extends Controller
{   
    public function apiMediaIboSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = MediaIboDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiMediaIboSubContact()
   {
     $ContactDetail = MediaIboContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apiMediaIboApkVersion($version)
   {
     $ver = MediaIboVersion::first();
     
     if($ver->version > $version)
     {
       return response()->json($ver);
     }
      else
     {
        $ver = [];
        return response()->json($ver);
     }
   }
   
   	public function update_Media_Ibo_version_store(Request $request){
  
    if ($request->file('file') == null) {
    $file = "";
    }
    else
    {
       $version = MediaIboVersion::where($request->id)->update([
          'file'         => $request->file('file')->store('docs'),
      ]);
    }
      $version = MediaIboVersion::where($request->id)->update([
          'version'       => $request->input('version') ? $request->input('version') : "",
          'description'   => $request->input('description') ? $request->input('description') : "",
      ]);
  
      return redirect('/mediaIbo-update-version')->with('message','Update Version Successfully');
        
	}

    function getMediaIboSubAdmin()
    {

        $subAdmin = MediaIboDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.MediaIboDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getMediaIboVersion()
    {

        $versions = MediaIboVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.MediaIboVersion', compact('versions'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }
    
     function getMediaUploadFile(Request $request)
      {

        $upload = UploadFile::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.UploadFile', compact('upload'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }
    
    function storeMediaUploadFile(Request $request)
    {
        $request->validate([
         'file' => 'required|mimes:png,jpg,apk,pdf,svg,jpeg|max:2048'
       ]);
        if ($request->file('file') == null) {
    $file = "";
    }
    else
    {
        $file = $request->file('file');
        $file = time().'.'.$file->getClientOriginalExtension();
       $file = UploadFile::where($request->id)->update([
          'file'         => $request->file('file')->store('docs'),
      ]);
    }
    return redirect('upload-file')->with('message','Update File Successfully');
    }


    function getMediaIboContact()
    {

        $ContactDetail = MediaIboContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.MediaIboContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeMediaIboSubAdmin(Request $request)
    {   
        $subAdmin = MediaIboDomainUrl::where($request->id)->update([
            'url'=>$request->input('url') ? $request->input('url') : "",
        ]);
        return redirect('/mediaIbo-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeMediaIboContact(Request $request)
    {   
        $ContactDetail = MediaIboContactDetail::where($request->id)->update([
            'email'=>$request->input('email') ? $request->input('email') : "",
            'phone'=>$request->input('phone') ? $request->input('phone') : "",
            'info'=>$request->input('info') ? $request->input('info') : "",
        ]);
        return redirect('/mediaIbo-contact-detail')->with('message','Update Contact Successfully');     
    }
}

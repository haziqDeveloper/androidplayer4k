<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRDomainUrl;
use App\Models\CRContactDetail;
use App\Models\CRVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CRKPlayerController extends Controller
{   
    public function apifourkPlayerSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = CRDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function fourkPlayerSubContact()
   {
     $ContactDetail = CRContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apifourkPlayerApkVersion($version)
   {
     $ver = CRVersion::first();
     
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
   
   	public function update_4kplayer_version_store(Request $request){
  
    if ($request->file('file') == null) {
    $file = "";
    }
    else
    {
       $version = CRVersion::where($request->id)->update([
          'file'         => $request->file('file')->store('docs'),
      ]);
    }
      $version = CRVersion::where($request->id)->update([
          'version'       => $request->input('version') ? $request->input('version') : "",
          'description'   => $request->input('description') ? $request->input('description') : "",
      ]);
  
      return redirect('/cr-update-version')->with('message','Update Version Successfully');
        
	}

    function getkplayerSubAdmin()
    {
        $subAdmin = CRDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.CRDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function get4kplayerVersion()
    {

        $versions = CRVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.CRVersion', compact('versions'));    
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


    function get4kplayerContact()
    {

        $ContactDetail = CRContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.CRContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function store4kplayerSubAdmin(Request $request)
    {   
        $subAdmin = CRDomainUrl::where($request->id)->update([
            'url'=>$request->input('url') ? $request->input('url') : "",
        ]);
        return redirect('/cr-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storekplayerContact(Request $request)
    {   
        $ContactDetail = CRContactDetail::where($request->id)->update([
            'email'=>$request->input('email') ? $request->input('email') : "",
            'phone'=>$request->input('phone') ? $request->input('phone') : "",
            'info'=>$request->input('info') ? $request->input('info') : "",
        ]);
        return redirect('/cr-contact-detail')->with('message','Update Contact Successfully');     
    }
}

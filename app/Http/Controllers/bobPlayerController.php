<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bobPlayerDomainUrl;
use App\Models\bobPlayerContactDetail;
use App\Models\bobPlayerVersion;
use App\Models\UploadFile;
use App\Models\MediaIboFourVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class bobPlayerController extends Controller
{   
    public function apiBobPlayerSubAdmin(Request $request)
   {
     $subAdmin = bobPlayerDomainUrl::first();
     return response($subAdmin);
   }
   
    public function apiBobPlayerSubContact()
   {
     $ContactDetail = bobPlayerContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apiBobPlayerApkVersion($version)
   {
     $ver = bobPlayerVersion::first();
     
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

   
   	public function update_bob_player_version_store(Request $request){
  
      $version = bobPlayerVersion::where($request->id)->update([
          'version'       => $request->input('version') ? $request->input('version') : "",
          'description'   => $request->input('description') ? $request->input('description') : "",
          'file' => $request->input('file') ? $request->input('file') : "", 
      ]);
  
      return redirect('/bobplayer-update-version')->with('message','Update Version Successfully');
        
	}

    function getBobPlayerSubAdmin()
    {
        $subAdmin = bobPlayerDomainUrl::all();
        if(Auth::check()) {
        return view('Dashboard.Admin.bobPlayerDomainUrl', compact('subAdmin'));  
       }
        return redirect::to("/")->withSuccess('Oopps! You do not have access');  
    }

    function getBobPlayerVersion()
    {

        $versions = bobPlayerVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.bobPlayerUpdateVersion', compact('versions'));    
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


    function getBobPlayerContact()
    {

        $ContactDetail = bobPlayerContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.bobPlayerContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeBobPlayerSubAdmin(Request $request)
    {   
        $subAdmin = bobPlayerDomainUrl::where($request->id)->update([
            'url'=>$request->input('url') ? $request->input('url') : "",
        ]);
        return redirect('/bobplayer-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeBobPlayerContact(Request $request)
    {   
        $ContactDetail = bobPlayerContactDetail::where($request->id)->update([
            'email'=>$request->input('email') ? $request->input('email') : "",
            'phone'=>$request->input('phone') ? $request->input('phone') : "",
            'info'=>$request->input('info') ? $request->input('info') : "",
        ]);
        return redirect('/bobplayer-contact-detail')->with('message','Update Contact Successfully');     
    }
}

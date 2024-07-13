<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IboTvProDomainUrl;
use App\Models\IboTvProContact;
use App\Models\IboTvProUpdateVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IboTvProController extends Controller
{   
    public function apiIboTvProSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = IboTvProDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiIboTvProSubContact()
   {
     $ContactDetail = IboTvProContact::first();
     return response()->json($ContactDetail);
   }
   
    public function apiIboTvProApkVersion($version)
   {
     $ver = IboTvProUpdateVersion::first();
     
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
   
   	public function update_Ibo_pro_version_store(Request $request){
  
    if ($request->file('file') == null) {
    $file = "";
    }
    else
    {
       $version = IboTvProUpdateVersion::where($request->id)->update([
          'file'         => $request->file('file')->store('docs'),
      ]);
    }
      $version = IboTvProUpdateVersion::where($request->id)->update([
          'version'       => $request->input('version') ? $request->input('version') : "",
          'description'   => $request->input('description') ? $request->input('description') : "",
      ]);
  
      return redirect('/Ibo-pro-update-version')->with('message','Update Version Successfully');
        
	}

    function getIboTvProSubAdmin()
    {

        $subAdmin = IboTvProDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboTvPro.IboTvProDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getIboTvProVersion()
    {

        $versions = IboTvProUpdateVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboTvPro.IboTvProVersion', compact('versions'));    
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


    function getIboTvProContact()
    {

        $ContactDetail = IboTvProContact::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboTvPro.IboTvProContact', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeIboTvProSubAdmin(Request $request)
    {   
        $subAdmin = IboTvProDomainUrl::where($request->id)->update([
            'url'=>$request->input('url') ? $request->input('url') : "",
        ]);
        return redirect('/Ibo-pro-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeIboTvProContact(Request $request)
    {   
        $ContactDetail = IboTvProContact::where($request->id)->update([
            'email'=>$request->input('email') ? $request->input('email') : "",
            'phone'=>$request->input('phone') ? $request->input('phone') : "",
            'info'=>$request->input('info') ? $request->input('info') : "",
        ]);
        return redirect('/Ibo-pro-contact-detail')->with('message','Update Contact Successfully');     
    }
}

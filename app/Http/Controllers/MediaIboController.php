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
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(MediaIboVersion::class, $request, $attributes);
  
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
        $this->validateUploadPayload($request);
        $this->updateRequestedOrFirst(UploadFile::class, $request, [
            'file' => $request->file('file')->store('docs'),
        ]);
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
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(MediaIboDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/mediaIbo-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeMediaIboContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(MediaIboContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/mediaIbo-contact-detail')->with('message','Update Contact Successfully');     
    }
}

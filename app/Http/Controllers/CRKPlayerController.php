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
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(CRVersion::class, $request, $attributes);
  
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
        $this->validateUploadPayload($request);
        $this->updateRequestedOrFirst(UploadFile::class, $request, [
            'file' => $request->file('file')->store('docs'),
        ]);
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
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(CRDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/cr-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storekplayerContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(CRContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/cr-contact-detail')->with('message','Update Contact Successfully');     
    }
}

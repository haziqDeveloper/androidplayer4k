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
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(bobPlayerVersion::class, $request, $attributes);
  
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
        $this->validateUploadPayload($request);
        $this->updateRequestedOrFirst(UploadFile::class, $request, [
            'file' => $request->file('file')->store('docs'),
        ]);
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
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(bobPlayerDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/bobplayer-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeBobPlayerContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(bobPlayerContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/bobplayer-contact-detail')->with('message','Update Contact Successfully');     
    }
}

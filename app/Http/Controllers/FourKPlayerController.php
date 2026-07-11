<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FourKPlayerDomainUrl;
use App\Models\FourKPlayerContactDetail;
use App\Models\FourKPlayerVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FourKPlayerController extends Controller
{   
    public function apifourkPlayerSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = FourKPlayerDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function fourkPlayerSubContact()
   {
     $ContactDetail = FourKPlayerContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apifourkPlayerApkVersion($version)
   {
     $ver = FourKPlayerVersion::first();
     
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

      $this->updateRequestedOrFirst(FourKPlayerVersion::class, $request, $attributes);
  
      return redirect('/4kplayer-update-version')->with('message','Update Version Successfully');
        
	}

    function getkplayerSubAdmin()
    {
        $subAdmin = FourKPlayerDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.FourPlayerDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function get4kplayerVersion()
    {

        $versions = FourKPlayerVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.FourKPlayerVersion', compact('versions'));    
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

        $ContactDetail = FourKPlayerContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.FourKPlayerContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function store4kplayerSubAdmin(Request $request)
    {   
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(FourKPlayerDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/4kplayer-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storekplayerContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(FourKPlayerContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/4kplayer-contact-detail')->with('message','Update Contact Successfully');     
    }
}

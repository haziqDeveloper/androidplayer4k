<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IboDomainUrl;
use App\Models\IboContactDetail;
use App\Models\IboVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IboController extends Controller
{   
    public function apiIboSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = IboDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiIboSubContact()
   {
     $ContactDetail = IboContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apiIboApkVersion($version)
   {
     $ver = IboVersion::first();
     
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
   
   	public function update_Ibo_version_store(Request $request){
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(IboVersion::class, $request, $attributes);
  
      return redirect('/ibo-update-version')->with('message','Update Version Successfully');
        
	}

    function getIboSubAdmin()
    {

        $subAdmin = IboDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getIboVersion()
    {

        $versions = IboVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboUpdateVersion', compact('versions'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }
    
     function getUploadFile(Request $request)
      {

        $upload = UploadFile::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.UploadFile', compact('upload'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }
    
    function storeUploadFile(Request $request)
    {
        $this->validateUploadPayload($request);
        $this->updateRequestedOrFirst(UploadFile::class, $request, [
            'file' => $request->file('file')->store('docs'),
        ]);
    return redirect('upload-file')->with('message','Update File Successfully');
    }


    function getIboContact()
    {

        $ContactDetail = IboContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeIboSubAdmin(Request $request)
    {   
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(IboDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/ibo-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeIboContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(IboContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/ibo-contact-detail')->with('message','Update Contact Successfully');     
    }
}

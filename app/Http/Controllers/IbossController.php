<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbossDomainUrl;
use App\Models\IbossContactDetail;
use App\Models\IbossVersion;
use App\Models\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IbossController extends Controller
{   
    public function apiIbossSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = IbossDomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiIbossSubContact()
   {
     $ContactDetail = IbossContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apiIbossApkVersion($version)
   {
     $ver = IbossVersion::first();
     
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
   
   	public function update_Iboss_version_store(Request $request){
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(IbossVersion::class, $request, $attributes);
  
      return redirect('/Iboss-update-version')->with('message','Update Version Successfully');
        
	}

    function getIbossSubAdmin()
    {

        $subAdmin = IbossDomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IbossDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getIbossVersion()
    {

        $versions = IbossVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IbossVersion', compact('versions'));    
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


    function getIbossContact()
    {

        $ContactDetail = IbossContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IbossContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeIbossSubAdmin(Request $request)
    {   
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(IbossDomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/Iboss-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeIbossContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(IbossContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/Iboss-contact-detail')->with('message','Update Contact Successfully');     
    }
}

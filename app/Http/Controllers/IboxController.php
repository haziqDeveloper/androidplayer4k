<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DomainUrl;
use App\Models\ContactDetail;
use App\Models\IboxVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IboxController extends Controller
{   
    public function apiSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = DomainUrl::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiSubContact()
   {
     $ContactDetail = ContactDetail::first();
     return response()->json($ContactDetail);
   }
   
    public function apiApkVersion($version)
   {
     $ver = IboxVersion::first();
     
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
   
   	public function update_version_store(Request $request){
      $validated = $this->validateVersionPayload($request);
      $attributes = [
          'version' => $validated['version'] ?? "",
          'description' => $validated['description'] ?? "",
      ];

      if ($request->hasFile('file')) {
          $attributes['file'] = $request->file('file')->store('docs');
      }

      $this->updateRequestedOrFirst(IboxVersion::class, $request, $attributes);
  
      return redirect('/ibox-update-version')->with('message','Update Version Successfully');
        
	}

    function getSubAdmin()
    {

        $subAdmin = DomainUrl::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboxDomainUrl', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getIboxVersion()
    {

        $versions = IboxVersion::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboxUpdateVersion', compact('versions'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }


    function getIboxContact()
    {

        $ContactDetail = ContactDetail::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.IboxContactDetail', compact('ContactDetail'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeSubAdmin(Request $request)
    {   
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(DomainUrl::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/ibox-domain-url')->with('message','Update Domain Url Successfully');      
    }

    function storeContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(ContactDetail::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/ibox-contact-detail')->with('message','Update Contact Successfully');     
    }
}

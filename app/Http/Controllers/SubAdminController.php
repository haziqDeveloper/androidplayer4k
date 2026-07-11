<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubAdmin;
use App\Models\Contact;
use App\Models\Version;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubAdminController extends Controller
{   
    public function apiSubAdmin(Request $request)
   {
       
    //  $subAdmin = SubAdmin::all();
          $subAdmin = SubAdmin::first();
    //  dd($subAdmin->toJson());
    //  return response()->json($subAdmin);
     return response($subAdmin);
   }
   
      public function apiSubContact()
   {
     $contact = Contact::first();
     return response()->json($contact);
   }
   
    public function apiApkVersion($version)
   {
     $ver = Version::first();
     
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

      $this->updateRequestedOrFirst(Version::class, $request, $attributes);
      return redirect('/update-version')->with('message','Update Version Successfully');
        
	}

    function getSubAdmin()
    {
        $subAdmin = SubAdmin::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.AddSubAdmin', compact('subAdmin'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function getVersion()
    {

        $version = Version::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.AddUpdateVersion', compact('version'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }


    function getContact()
    {

        $contact = Contact::all();
        if(Auth::check()) {
            return view('Dashboard.Admin.AddContactDetail', compact('contact'));    
     }

     return redirect::to("/")->withSuccess('Oopps! You do not have access');
        
    }

    function storeSubAdmin(Request $request)
    {   
        $validated = $this->validateDomainPayload($request);
        $this->updateRequestedOrFirst(SubAdmin::class, $request, [
            'url' => $validated['url'] ?? "",
        ]);
        return redirect('/add-domain-url')->with('message','Update Domain Url Successfully');
    }

    function storeContact(Request $request)
    {   
        $validated = $this->validateContactPayload($request);
        $this->updateRequestedOrFirst(Contact::class, $request, [
            'email' => $validated['email'] ?? "",
            'phone' => $validated['phone'] ?? "",
            'info' => $validated['info'] ?? "",
        ]);
        return redirect('/contact-detail')->with('message','Update Contact Successfully');      
    }
}

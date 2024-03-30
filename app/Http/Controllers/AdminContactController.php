<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(){
        $contacts = contact::all();
        $data = [
            'contacts'      =>      $contacts
        ];
        return view('admin.contactsIndex', $data);
    }
    public function show($id){
        $contact = contact::find($id);
        $data = [
            'contact'       =>      $contact
        ];
        return view('admin.contactShow', $data);
    }
    public function destroy($id){
        $contact = contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }
}

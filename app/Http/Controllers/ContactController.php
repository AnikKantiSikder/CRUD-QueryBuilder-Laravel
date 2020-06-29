<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AllContact(){

        $contact=DB::table('contacts')->get();

        return view('Pages.allContact')->with('contactpass', $contact);
    }



    public function InsertData(){

        return view('Pages.insertData');
    }

    public function DataAdded(Request $request){

        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['description']= $request->description;

        $insData= DB::table('contacts')->insert($data);

        return redirect()->route('all.contacts');
    }

    public function DeleteContact($id){

        $del= DB::table('contacts')->where('id', $id)->delete();
        return redirect()->route('all.contacts');

    }

    public function EditContact($id){

        $edt= DB::table('contacts')->where('id', $id)->first();
        return view('Pages.editContact', compact('edt'));
    }

    public function UpdateContact(Request $request, $id){

        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['description']= $request->description;

        $updateCont= DB::table('contacts')->where('id', $id)->update($data);
        return redirect()->route('all.contacts');

    }


    public function ViewContact($id){

        $view= DB::table('contacts')->where('id' ,$id)->first();
        return view('Pages.viewDetails', compact('view'));
    }
}

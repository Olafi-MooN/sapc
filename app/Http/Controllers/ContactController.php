<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{   
    public function back(Request $request){
        return redirect("/contact/show/$request->cookie('id')");  
    }

    public function index(){
        return view('home');    
    }

    public function show(Request $request){
        $id = $request->cookie('id');


        $contacts = Contact::select('*')
            ->where('contacts.user_id', '=', $id)
            ->get();

        return view('contacts.contact',['contacts'=> $contacts]);    
    }

    public function store(Request $request){
        $contacts = new Contact();
        $contacts->nome = $request->nome;
        $contacts->number = $request->number;
        $contacts->favorite = $request->favorite;
        $contacts->description = $request->description;
        $contacts->user_id = $request->cookie('id');
        $contacts->save();

        return back();
    }

    public function up(Request $request){
        $contacts = new Contact();

        $contacts::where('id', $request->cookie('id'))
            ->update([
                'nome' => $request->nome,
                'number' => $request->number,
                'favorite' => $request->favorite,
                'description' => $request->description,
            ]);

            return back();
    }

    public function delete(Request $request){
        $contacts = new Contact();

        $contacts::where('id', $request->id)->delete();

        return back();
    }

}

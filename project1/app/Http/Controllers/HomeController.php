<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        // $data['title'] = "Home page";
        // $data['welcome'] = "Welcome to Laravel";
        // $data['fruits'] = ["Apple", "Orange", "Mango", "Grape"];
        
        return view('home');
    }

    public function about(){
        // $data['title'] = "About page";
        return view('about');
    }

    public function contact(){
       
        return view('contact');
    }
       
    public function store(Request $req){
      $contact = new Contact();
      
     $messages =  [
        'name.required' => 'You have put your name',
        'email.required' => 'Please put your email',   
        'email.email' => 'Please valid Email', 
     ];   
      
      $validate = $req->validate([
            'name' => 'required|min:4',
            'email' => 'required | email'
      ], $messages);
      
      if($validate){
        $data = [
            'email' => $req->email,
            'subject' => $req->subject,
            'message' => $req->message,
            'name' => $req->name,
          ] ;  
          
          $contact->insert($data);
          return redirect('contact')->with('msg', 'We received your message');

      } 
     
    }

    public function contactList(){
        $contacts = Contact::all();
        $data['messages'] = $contacts;
        return view('contactList', $data);
    }

    public function delete($mid){
        // //echo $request->id;
        // echo $mid;

        $contact = Contact::find($mid);
       if( $contact->delete()){
        return redirect('contact/list')->with('msg', 'Deleted successfully');
       }

    }

    public function edit($mid){
        $contact = Contact::find($mid);
        $data['single'] = $contact;
        return view('edit', $data);
    }

    public function update(Request $req, $id){
        $contact = Contact::find($id);
      
     $messages =  [
        'name.required' => 'You have put your name',
        'email.required' => 'Please put your email',   
        'email.email' => 'Please valid Email', 
     ];   
        $validate = $req->validate([
            'name' => 'required|min:4',
            'email' => 'required|email'
      ], $messages);
      
      if($validate){
        $data = [
            'email' => $req->email,
            'subject' => $req->subject,
            'message' => $req->message,
            'name' => $req->name,
          ] ;   
          $contact->update($data);
          return redirect('contact/list')->with('msg', 'Updated your message');
    } 
}
}
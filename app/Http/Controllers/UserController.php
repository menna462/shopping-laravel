<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        return view("User.show",["result"=>$user]);
     }
     public function delete($id){
        $products = User::findOrFail($id);
        $products->delete();
        return redirect()->route("users")->with("message1","Deleted successfuly");
     }

     public function edit ($id){
        $user = User::findOrFail($id);
        return view("User.edit",["result"=>$user]);
     }
    //  use Illuminate\Validation\Rule;

     public function update(Request $request)
     {
         $old_id = $request->old_id;
         $user = User::findOrFail($old_id);

         $request->validate([

             'name' => 'required|min:3|max:255',
             'email' => [
             'required',
             'email',
                 Rule::unique('users', 'email')->ignore($old_id), // استثناء الـ email الحالي
             ],
             'role' => ['required', Rule::in(['admin', 'user'])], // التأكد أن القيمة إما "admin" أو "user"
             'password' => 'required|min:8',
         ]);

         $user->update([
             "name" => $request->name,
             "email" => $request->email,
             'role' => ['required', Rule::in(['admin', 'user'])], // التأكد أن القيمة إما "admin" أو "user"
             "password" => bcrypt($request->password), // تشفير كلمة المرور
         ]);

         return redirect()->route("users")->with("message", "Updated successfully");
     }

     public function index()
     {
         $users = User::all();
         return view('backend.users', compact('users'));
     }

}

<?php

namespace App\Http\Controllers;

use App\Models\Model\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::all();
        return view("backend.location", compact('locations'));
    }

    public function show($id){
        $locations = Location::findOrFail($id);
        return view("Locations.show",["location"=>$locations]);
     }
     public function delete($id){
        $locations = Location::findOrFail($id);
        if ($locations->loc_img && file_exists(public_path("img/location/" . $locations->loc_img))) {
            unlink(public_path("img/location/" . $locations->loc_img));
        }
        $locations->delete();
        return redirect()->route("locations")->with("message2", "Deleted successfully");
    }
     public function create(){
        return view("Locations.create");
     }

     public function store(Request $request){
        $request->validate([
            'description' => 'required',
        ],
    );
    $imageName = null;
    if($request->hasFile("loc_img")){
        $image =$request->loc_img;
        $imageName = time() . "_" . rand(1,1000) . "." . $image->extension();
        $image->move(public_path("img/location"),$imageName);
    }
    Location::create([
            "loc_img" =>$imageName,
            "description" =>$request->description,

        ]);
        return redirect()->route("locations")->with("message","Created successfuly");
     }


     public function edit ($id){
        $locations = Location::findOrFail($id);
        return view("Locations.edit",["result"=>$locations]);
     }

     public function update(Request $request){
        $old_id =$request->old_id;
        $locations = Location::findOrFail($old_id);

        $request->validate([
            'description' => 'required',

        ]);
        if($request -> hasFile("loc_img")){
            $image =$request->loc_img;
            $imageName = time() . "_" . rand(1,1000) . "." . $image->extension();
            $image->move(public_path("img/location"),$imageName );
        } else{
            $imageName = $locations->loc_img;
         }

         $locations->update([
            "loc_img" => $imageName,
            "description" => $request->description,
        ]);
        return redirect()->route("locations")->with("message","updated successfuly");
}
public function shop()
{
    $locations = Location::all(); // جلب كل المنتجات
    return view('include.location', compact('locations')); // إرسال المنتجات إلى صفحة المتجر
}



}

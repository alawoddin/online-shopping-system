<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function AllHome() {
        $allhomedata  = Home::get();

        return view('admin.frontend.home.all_home' , compact('allhomedata'));
    }

    public function AddHome() {
        return view('admin.frontend.home.add_home');
    }

    public function StoreHome(Request $request) {

    if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(635, 380)->save(public_path('upload/home/' . $name_gen));
            $save_url = 'upload/home/' . $name_gen;

          
        }

          Home::create([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $save_url,
            ]);



        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.home')->with($notification);
    }

    public function EditHome ($id) {
        $alldata = Home::find($id);

        return view('admin.frontend.home.edit_home' , compact('alldata'));
    }



    

}

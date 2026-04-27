<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Home;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function AllHome()
    {
        $allhomedata  = Home::get();

        return view('admin.frontend.home.all_home', compact('allhomedata'));
    }

    public function AddHome()
    {
        return view('admin.frontend.home.add_home');
    }

    public function StoreHome(Request $request)
    {

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

    public function EditHome($id)
    {
        $alldata = Home::find($id);

        return view('admin.frontend.home.edit_home', compact('alldata'));
    }

    public function UpdateHome(Request $request, $id)
    {
        $home = Home::findOrFail($id);

        // validate (VERY IMPORTANT)
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $save_url = $home->image; // keep old image

        if ($request->hasFile('image')) {

            // delete old image safely
            if (!empty($home->image) && file_exists(public_path($home->image))) {
                unlink(public_path($home->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $img = $manager->read($image);
            $img->resize(635, 380)->save(public_path('upload/home/' . $name_gen));

            $save_url = 'upload/home/' . $name_gen;
        }

        $home->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $save_url,
        ]);

        $notification = [
            'message' => 'Home Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.home')->with($notification);
    }

    public function DeleteHome($id)
{
    $home = Home::findOrFail($id);

    // delete image file
    if (!empty($home->image) && file_exists(public_path($home->image))) {
        unlink(public_path($home->image));
    }

    // delete record
    $home->delete();

    $notification = [
        'message' => 'Home Deleted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.home')->with($notification);
}

// the feature section is start in home controller 

    public function AllFeature() {
        $alldata = Feature::all();

        return view('admin.frontend.feature.all_feature' , compact('alldata'));
    }


}

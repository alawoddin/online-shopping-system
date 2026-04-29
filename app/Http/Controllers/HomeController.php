<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Feature;
use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function AllHome()
    {
        $allhomedata  = home::all();

        return view('admin.frontend.home.all_home', compact('allhomedata'));
    }

    public function AddHome()
    {
        return view('admin.frontend.home.add_home');
    }

    public function StoreHome(Request $request)
    {

    $save_url = null; 

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
        $alldata = Home::findOrFail($id);

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

    public function AddFeature() {
        return view('admin.frontend.feature.add_feature');
    }

    public function StoreFeature(Request $request) {

    $save_url = null; 


           if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(32, 26)->save(public_path('upload/feature/' . $name_gen));
            $save_url = 'upload/feature/' . $name_gen;
        }

        Feature::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
        ]);



        $notification = array(
            'message' => 'Feature Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }

    public function EditFeature($id) {
        $editdata = Feature::findOrFail($id);

        return view('admin.frontend.feature.edit_feature' , compact('editdata'));
    }

    public function UpdateFeature(Request $request , $id) {
        $features = Feature::findOrFail($id);

        // validate (VERY IMPORTANT)
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $save_url = $features->image; // keep old image

        if ($request->hasFile('image')) {

            // delete old image safely
            if (!empty($features->image) && file_exists(public_path($features->image))) {
                unlink(public_path($features->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $img = $manager->read($image);
            $img->resize(32, 26)->save(public_path('upload/feature/' . $name_gen));

            $save_url = 'upload/feature/' . $name_gen;
        }

        $features->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
        ]);

        $notification = [
            'message' => 'Feature Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.feature')->with($notification);
    }

    public function DeleteFeature($id) {
        $features = Feature::findOrFail($id);

    // delete image file
    if (!empty($features->image) && file_exists(public_path($features->image))) {
        unlink(public_path($features->image));
    }

    // delete record
    $features->delete();

    $notification = [
        'message' => 'Feature Deleted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.feature')->with($notification);
    }

    // end method 

    public function AllBrand() {
        $brands = Cache::remember('brand_list' , 60 , function () {
            return Brand::all();
        });

        return view("admin.frontend.brand.all_brand" , compact("brands"));
    }

    public function AddBrand() {
        return view("admin.frontend.brand.add_brand");
    }

    public function StoreBrand(Request $request) {

    $save_url = null; 


            if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(200, 200)->save(public_path('upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;
        }

        Brand::create([
            'link' => $request->link,
            'image' => $save_url,
        ]);



        $notification = array(
            'message' => 'Feature Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }

    public function EditBrand(int $id) {
        $brands = Brand::findOrFail($id);

        return view("admin.frontend.brand.edit_brand" , compact('brands'));
    }

    // the product section is start 

    public function AllProduct() {
        $allproduct = Product::all();

        return view('admin.frontend.product.all_product' , compact('allproduct'));
    }

    public function AddProduct() {
        return view('admin.frontend.product.add_product');
    }

    public function StoreProduct(Request $request) {
        $save_url = null; 


           if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(255, 271)->save(public_path('upload/product/' . $name_gen));
            $save_url = 'upload/product/' . $name_gen;
        }

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $request->discount,
            'image' => $save_url,
        ]);



        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function EditProduct(int $id) {
        $alldata = Product::findOrFail($id);

        return view('admin.frontend.product.edit_product' , compact('alldata'));
    }

public function UpdateProduct(Request $request,$id) {

    $products = Product::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $save_url = $products->image;

    if ($request->hasFile('image')) {

        if ($products->image && file_exists(public_path($products->image))) {
            unlink(public_path($products->image));
        }

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $img = $manager->read($image);
        $img->resize(255, 271)->save(public_path('upload/product/' . $name_gen));

        $save_url = 'upload/product/' . $name_gen;
    }

    $products->update([
        'title' => $request->title,
        'price' => $request->price,
        'discount' => $request->discount,
        'image' => $save_url,
    ]);

    return redirect()->route('all.product')->with([
        'message' => 'Product Updated Successfully',
        'alert-type' => 'success'
    ]);
}


}

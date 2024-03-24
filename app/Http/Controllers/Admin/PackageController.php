<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric|min:0',
            'time' => 'min:0',
            'description' => 'required|min:7',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $package = new Package;
        $package->title = $request->title;
        $package->price = $request->price;
        $package->time = $request->time;
        $package->description = $request->description;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/packages/'), $fileName);
            $package->image = $fileName;
        }

        $package->save();

        return redirect()->route('packages')
                    ->with('message', 'Package Added Successfully...');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::find($id);
        if($package){
            return view('admin.packages.edit', compact('package'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric|min:0',
            'time' => 'min:0',
            'description' => 'required|min:7',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $package = Package::find($id);

        if($package)
        {
            $package->title = $request->title;
            $package->price = $request->price;
            $package->time = $request->time;
            $package->description = $request->description;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/packages/' .$package->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/packages/'), $fileName);
                $package->image = $fileName;
            }
    
            $package->update();
    
            return redirect()->route('packages')
                        ->with('message', 'Package Updated Successfully...');
        }
        else
        {
            return redirect()->route('packages')
                        ->with('status', 'No Such a Package Found...'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $package = Package::find($id);

        if (!$package) {
            return redirect()->route('packages')->with('status', 'package not found.');
        }

        $destination = 'uploads/packages/' . $package->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $package->delete();

        return redirect()->route('packages')->with('status', 'Package Deleted Successfully...');
    }
}

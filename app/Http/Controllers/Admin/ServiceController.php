<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'service_slug' => 'required',
            'description' => 'required|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'price1' => 'min:0',
            'price2' => 'min:0',
            'price3' => 'min:0',
            'price4' => 'min:0'
        ]);

        $service = new Service;
        $service->title = $request->title;
        $service->service_slug = Str::slug($request->service_slug);
        $service->description = $request->description;
        $service->price1 = $request->price1;
        $service->price2 = $request->price2;
        $service->price3 = $request->price3;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' . $file->getClientOriginalExtension();
            $file-> move(public_path('uploads/services/'), $fileName);
            $service->image = $fileName;
        }

        $service->save();

        return redirect()->route('services')
                    ->with('message', 'Service Added Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        if($service)
        {
            return view('admin.services.edit', compact('service'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'service_slug' => 'required',
            'description' => 'required|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'price1' => 'min:0',
            'price2' => 'min:0',
            'price3' => 'min:0',
        ]);

        $service = Service::find($id);
        if($service)
        {
            $service->title = $request->title;
            $service->service_slug = Str::slug($request->service_slug);
            $service->description = $request->description;
            $service->price1 = $request->price1;
            $service->price2 = $request->price2;
            $service->price3 = $request->price3;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/services/' .$service->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' . $file->getClientOriginalExtension();
                $file-> move(public_path('uploads/services/'), $fileName);
                $service->image = $fileName;
            }
    
            $service->update();

            return redirect()->route('services')
                    ->with('message', 'Service Updated Successfully...');
        }
        else
        {
            return redirect()->route('services')
                        ->with('status', 'No Such a Service Found...');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return redirect()->route('services')->with('status', 'Service not found.');
        }

        $destination = 'uploads/services/' . $service->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $service->delete();

        return redirect()->route('services')->with('status', 'Service Deleted Successfully...');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $testimonial = new Testimonial;
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimonials/'), $fileName);
            $testimonial->image = $fileName;
        }

        $testimonial->save();

        return redirect()->route('testimonials')
                    ->with('message', 'Testimonial Added Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial)
        {
            return view('admin.testimonials.edit',compact('testimonial'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $testimonial = Testimonial::find($id);
        if($testimonial)
        {
            $testimonial->title = $request->title;
            $testimonial->description = $request->description;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/testimonials/' .$testimonial->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/testimonials/'), $fileName);
                $testimonial->image = $fileName;
            }
    
            $testimonial->update();
    
            return redirect()->route('testimonials')
                        ->with('message', 'Testimonial Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return redirect()->route('testimonials')->with('status', 'Testimonial not found.');
        }

        $destination = 'uploads/members/' . $testimonial->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $testimonial->delete();

        return redirect()->route('testimonials')->with('status', 'Testimonial Deleted Successfully...');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'blog_slug' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->meta_title = $request->meta_title;
        $blog->blog_slug = Str::Slug($request->title);
        $blog->description = $request->description;
        $blog->meta_description = $request->meta_description;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs/'), $fileName);
            $blog->image = $fileName;
        }

        $blog->save();

        return redirect()->route('blogs')
                    ->with('message', 'Blog Added Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        if($blog)
        {
            return view('admin.blogs.edit', compact('blog'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'blog_slug' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $blog = Blog::find($id);

        if($blog)
        {
            $blog->title = $request->title;
            $blog->meta_title = $request->meta_title;
            $blog->blog_slug = Str::Slug($request->title);
            $blog->description = $request->description;
            $blog->meta_description = $request->meta_description;
            $blog->created_at = $request->created_at;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/blogs/' .$blog->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blogs/'), $fileName);
                $blog->image = $fileName;
            }
    
            $blog->update();
    
            return redirect()->route('blogs')
                        ->with('message', 'Blog Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs')->with('status', 'Blog not found.');
        }

        $destination = 'uploads/blogs/' . $blog->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $blog->delete();

        return redirect()->route('blogs')->with('status', 'Blog Deleted Successfully...');
        }
}

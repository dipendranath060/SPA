<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(10);
        return view('admin.members.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'post' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->post = $request->post;
        $team->description = $request->description;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' . $file->getClientOriginalExtension();
            $file -> move(public_path('uploads/members/'), $fileName);
            $team->image = $fileName;
        }
        $team->save();

        return redirect()->route('members')
                    ->with('message', 'Team Member Added Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if($team)
        {
            return view('admin.members.edit', compact('team'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'post' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,gif|max:2048'
        ]);

        $team = Team::find($id);
        if($team)
        {
            $team->name = $request->name;
            $team->post = $request->post;
            $team->description = $request->description;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/members/' .$team->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' . $file->getClientOriginalExtension();
                $file -> move(public_path('uploads/members/'), $fileName);
                $team->image = $fileName;
            }
            $team->update();
    
            return redirect()->route('members')
                        ->with('message', 'Team Member Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return redirect()->route('members')->with('status', 'Team member not found.');
        }

        $destination = 'uploads/members/' . $team->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $team->delete();

        return redirect()->route('members')->with('status', 'Team Member Deleted Successfully...');
    }
}

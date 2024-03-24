<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::paginate(10);
        return view('admin.milestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.milestones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //check the validation
        $request->validate([
            'title' => 'required|max:30',
            'achievement' => 'required'
        ]);

        //store data
        $milestone = new Milestone;
        $milestone->title = $request->title;
        $milestone->achievement = $request->achievement;
        $milestone->save();

        return redirect()->route('milestones')
                ->with('message', 'Milestone Added Successfully...');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $milestone = Milestone::find($id);
        if($milestone)
        {
            return view('admin.milestones.edit', compact('milestone'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //check the validation
         $request->validate([
            'title' => 'required|max:30',
            'achievement' => 'required'
        ]);

        //update data
        $milestone = Milestone::find($id);
        if($milestone)
        {
            $milestone->title = $request->title;
            $milestone->achievement = $request->achievement;
            $milestone->update();
    
            return redirect()->route('milestones')
                    ->with('message', 'Milestone Updated Successfully...');
        }
        else
        {
            return redirect()->route('milestones')
                    ->with('status', 'No such a Milestone Found...'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $milestone = Milestone::find($id);

        if (!$milestone) {
            return redirect()->route('milestones')->with('status', 'milestone not found.');
        }

        $milestone->delete();

        return redirect()->route('milestones')->with('status', 'Milestone Deleted Successfully...');
    }
}

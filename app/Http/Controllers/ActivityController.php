<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Category;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all activities for the authenticated user
        $activities = Activity::where('user_id', auth()->id())->get();

        // Return the view with the books data
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all(); 
        return view('activities.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        // Create a new activity in the database
        Activity::create($validated);

        // Redirect to the activities index with a success message
        return redirect()->route('activities.index')->with('success', 'Aktivnost uspješno kreirana!');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the activity to edit
        $activity = Activity::findOrFail($id);

        if ($activity->user_id != auth()->id()) {
        abort(403);
    }

        $categories = Category::all();

        // Return the view to edit the activity
        return view('activities.edit', compact('activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Fetch the activity to update
        $activity = Activity::findOrFail($id);

        if ($activity->user_id != auth()->id()) {
        abort(403);
    }    

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $activity->update($validated);

        // Redirect to the activities index with a success message
        return redirect()->route('activities.index')->with('success', 'Aktivnost uspješno ažurirana!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the activity and delete it
        $activity = Activity::findOrFail($id);

       if ($activity->user_id != auth()->id()) {
        abort(403);
    }

        $activity->delete();

        // Redirect to the activities index with a success message
        return redirect()->route('activities.index')->with('success', 'Aktivnost uspješno obrisana!');
    }
}

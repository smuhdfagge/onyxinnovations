<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::withTrashed()->ordered()->paginate(20);
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:team_members',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'is_leadership' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $member = TeamMember::create($validated);

        ActivityLog::log('created', $member, 'Created team member: ' . $member->name);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:team_members,slug,' . $team->id,
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'is_leadership' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team->update($validated);

        ActivityLog::log('updated', $team, 'Updated team member: ' . $team->name);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        ActivityLog::log('deleted', $team, 'Deleted team member: ' . $team->name);
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }

    public function restore($id)
    {
        $member = TeamMember::withTrashed()->findOrFail($id);
        $member->restore();

        ActivityLog::log('restored', $member, 'Restored team member: ' . $member->name);

        return redirect()->route('admin.team.index')->with('success', 'Team member restored successfully.');
    }

    public function forceDelete($id)
    {
        $member = TeamMember::withTrashed()->findOrFail($id);
        
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        ActivityLog::log('force_deleted', $member, 'Permanently deleted team member: ' . $member->name);
        
        $member->forceDelete();

        return redirect()->route('admin.team.index')->with('success', 'Team member permanently deleted.');
    }
}

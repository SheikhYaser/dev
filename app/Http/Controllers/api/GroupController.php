<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function group()
    {
        $group = Group::get();

        return response()->json($group, 200);
    }
    public function addGroup(Request $request)
    {
        $group = Group::create([
            "name" => $request->name,
            "course_id" => $request->course_id,
        ]);

        return response()->json($group, 200);
        
    }
    public function updateGroup(Request $request, $id)
    {
        $group = Group::find($id);

        $group->update([
            "name" => $request->name,
            "course_id" => $request->course_id,
        ]);

        return response()->json(null, 200);
    }
    public function deleteGroup($id)
    {
        $group = Group::find($id);

        $group->delete();

        return response()->json(null, 200);
    }
}

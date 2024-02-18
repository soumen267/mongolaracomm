<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $getProjects = Project::all();
        return view('projects.index', compact('getProjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'client' => 'required',
            'startdate' => 'required|before:duedate',
            'duedate' => 'required',
            'tag' => 'required',
            'progress' => 'required',
        ]);
        $createData = new Project();
        $createData->title = $request->title;
        $createData->client = $request->client;
        $createData->startdate = $request->startdate;
        $createData->duedate = $request->duedate;
        $createData->tag = $request->tag;
        $createData->progress = $request->progress;
        $createData->save();
        $getProjectsData = Project::all();
        return response()->json([
            'getUsersData' => $getProjectsData,
            'status'=> 200,
            'message'=>'Project created successfully!',
        ]);
    }

    public function edit(Request $request){
        $editProject = Project::findOrFail($request->id);
        return response()->json($editProject);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'client' => 'required',
            'startdate' => 'required|before:duedate',
            'duedate' => 'required',
            'tag' => 'required',
            'progress' => 'required',
        ]);
        $savedata = Project::findOrFail($request->userid);
        $savedata->title = $request->title;
        $savedata->client = $request->client;
        $savedata->startdate = $request->startdate;
        $savedata->duedate = $request->duedate;
        $savedata->tag = $request->tag;
        $savedata->progress = $request->progress;
        $savedata->save();
        $getProjectsData = Project::all();
        return response()->json([
            'getProjectsData' => $getProjectsData,
            'status'=> 200,
            'message'=>'Project updated successfully!',
        ]);
    }

    public function delete(Request $request)
    {
        $deleteProject = Project::findOrFail($request->ids);
        if($deleteProject){
            $deleteProject->delete();
            $getProjectsData = Project::all();
            return response()->json([
                'getProjectsData' => $getProjectsData,
                'status'=> 200,
                'message'=>'Project deleted successfully!',
            ]);
        }else{
            return response()->json([
                'status'=> 400,
                'message'=>'Something went wrong!',
            ]);
        }
    }

    public function deleteAll(Request $request){
        $ids = $request->ids;
        DB::table("projects")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

    public function copy(Request $request){
        $copyData = Project::findOrFail($request->ids);
        $newPost = $copyData->replicate();
        $newPost->created_at = Carbon::now();
        $newPost->save();
        $getProjects = Project::all();
        return response()->json([
            'getProjects' => $getProjects,
            'status'=> 200,
            'message'=>'Project copyied successfully!',
        ]);

    }

    public function assign(Request $request){
        $getUserByProject = ProjectStatus::where('project_id', '=', $request->projectId)->get();
        $getUserName = User::where("_id", "=", $getUserByProject[0]->user_id)->first();
        $getUsers = User::get();
        return response()->json([
            'getUsers' => $getUsers,
            'getUserName' => $getUserName->name,
            'status'=> 200,
        ]);
    }

    public function assignproject(Request $request){
        $request->validate([
            'user' => 'required',
            'projectid' => 'required',
        ]);
        $saveassign = new ProjectStatus();
        foreach($request->user as $key => $val){
            $saveassign->user_id = $val;
            $saveassign->project_id = $request->projectid;
            $saveassign->save();
        }
        
    }

}

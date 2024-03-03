<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectStatus;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $getProjects = Project::all();
        return view('projects.index', compact('getProjects'));
    }

    public function view($id){
        $getProject = Project::where('_id',$id)->first();
        return view('projects.show', compact('getProject'));
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
            'message'=>'Project copied successfully!',
        ]);

    }

    public function assign(Request $request){
        $getUserByProject = ProjectStatus::where('project_id', '=', $request->projectId)->get();
        $getUserName = User::where("_id", "=", $getUserByProject->user_id)->first();
        //dd($getUserName);
        $getUsers = User::get();
        return response()->json([
            'getUsers' => $getUsers,
            //'getUserName' => $getUserName->name,
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

    public function taskAssign(Request $request){
        $projID = $request->projID;
        $getUsers = User::get();
        return response()->json([
            'getUsers' => $getUsers,
            'projID' => $projID,
            'status'=> 200,
        ]);
    }

    public function addtask(Request $request){
        $request->validate([
            'projectid' => 'required',
            'title' => 'required',
            'milestone' => 'required',
            'priority' => 'nullable',
            'user' => 'required',
            'description' => 'nullable',
            'duedate' => 'required',
            'tag' => 'required',
            'order' => 'nullable',
            'status' => 'nullable',
        ]);
        $createData = new Task();
        $createData->projectid = $request->projectid;
        $createData->title = $request->title;
        $createData->milestone = $request->milestone;
        $createData->priority = $request->priority;
        $createData->assignuser = json_encode($request->user);
        $createData->tag = $request->tag;
        $createData->description = $request->description;
        $createData->duedate = $request->duedate;
        $createData->order = 1;
        $createData->status = 1;
        $createData->save();
        $getTaskData = Task::all();
        return response()->json([
            'getTaskData' => $getTaskData,
            'status'=> 200,
            'message'=>'Task created successfully!',
        ]);
    }

    public function taskShow()
    {
        $newItem = Task::where('status',0)
		                    ->orderBy('order')
							->get();
        $newItemCount = $newItem->count();
        $pendingItem = Task::where('status',1)
		                    ->orderBy('order')
							->get();
        $pendingItemCount = $pendingItem->count();
        $qcItem = Task::where('status',2)
		                    ->orderBy('order')
							->get();
        $qcItemCount = $qcItem->count();
        $completeItem = Task::where('status',3)
		                    ->orderBy('order')
							->get();
        $completeItemCount = $completeItem->count();
    	return view('tasks.index',compact('newItem','newItemCount','pendingItem','pendingItemCount','qcItem','qcItemCount','completeItem','completeItemCount'));
    }

    public function updateItems(Request $request)
    {
    	$input = $request->all();
        //dd($input);
        if(!empty($input['newItem'])){
			foreach ($input['newItem'] as $key => $value) {
				$key = $key + 1;
				Task::where('_id',$value)
						->update([
							'status'=> 0,
							'order'=>$key
						]);
			}
		}

		if(!empty($input['pending'])){
			foreach ($input['pending'] as $key => $value) {
				$key = $key + 1;
				Task::where('_id',$value)
						->update([
							'status'=> 1,
							'order'=>$key
						]);
			}
		}

        if(!empty($input['qc'])){
			foreach ($input['qc'] as $key => $value) {
				$key = $key + 1;
				Task::where('_id',$value)
						->update([
							'status'=> 2,
							'order'=>$key
						]);
			}
		}
        
		if(!empty($input['accept'])){
			foreach ($input['accept'] as $key => $value) {
				$key = $key + 1;
				Task::where('_id',$value)
						->update([
							'status'=> 3,
							'order'=>$key
						]);
			}
		}
    	return response()->json(['status'=>'success']);
    }

}

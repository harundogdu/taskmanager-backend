<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')
            ->join('types', 'type_id', '=', 'types.id')
            ->join('statuses', 'status_id', '=', 'statuses.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('tasks.*', 'types.slug as types_title', 'statuses.slug as status_title', 'users.name as user_name')
            ->get();

        if ($tasks) {

            foreach ($tasks as $task => $value) {
                $tasks[$task]->created_at = Carbon::parse($value->created_at)->locale("tr_TR")->diffForHumans();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Task fetching successfully',
                "data" => $tasks
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not fetching',
                "data" => []
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Tasks::create([
            "type_id" => $request->type_id,
            "status_id" => $request->status_id,
            "user_id" => 1,
            'title' => $request->title,
            "attachment" => $request->attachment,
            'description' => $request->description,
        ]);

        $task = $task->save();

        if ($task) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task created successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not created'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $task = Tasks::findOrFail($request->id);
        if ($task) {
            $task['time'] = Carbon::parse($task->created_at)->locale('tr_TR')->diffForHumans();
            return response()->json([
                'status' => 'success',
                'message' => 'Task found successfully',
                'data' => $task,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}

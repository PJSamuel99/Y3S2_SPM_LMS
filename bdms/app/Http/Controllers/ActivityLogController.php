<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activityLogs = DB::table('activity_logs')
                         ->leftJoin('users','activity_logs.user_id','=','users.id')
                         ->paginate(10);

        return view('pages.logs.activity-logs',['activityLogs'=>$activityLogs]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteLogs(){

        $respose = DB::table('activity_logs')->truncate();
        $ActivityLog =  new ActivityLog();
        $ActivityLog->user_id = Auth::user()->id;
        $ActivityLog->date = Carbon::now();
        $ActivityLog->effected_on = 'Activity logs';
        $ActivityLog->action = 3;
        $ActivityLog->save();
        return response()->json(['success'=>'deleted'],200);
    }
}

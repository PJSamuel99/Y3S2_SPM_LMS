<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\ActivityLog;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(Request $request)
    {

        $currentDate = Carbon::now();
        $startDate = Carbon::now()->format('Y-m-d'); //returns current day

        $firstWeekFirstDay = Carbon::now()->startOfWeek()->format('Y-m-d');
        $minusSevenFromUp = Carbon::now()->startOfWeek()->subDay(6)->format('Y-m-d');

        $minusTenFromNow = Carbon::now()->subDay(10)->format('Y-m-d');

        $firstWeekLastDay = Carbon::now()->endOfWeek()->format('Y-m-d');

        $lastWeekLastDay = $currentDate->subDays($currentDate->dayOfWeek)->subWeek()->format('Y-m-d');
        $lastWeekFirstDay = $currentDate->subDays($currentDate->dayOfWeek + 6)->format('Y-m-d');

        $lastMonthCurrentDate = Carbon::now()->subMonth()->format('Y-m-d');
        $start = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');


        return view('pages.master.index');
               
    }

    public function  index(Request $request)
    {

        $query = "";
        if($request->get('query')){

            $user = DB::table('users')
                ->select('users.*','roles.role as rle')
                ->leftJoin('roles', 'users.role', '=', 'roles.id')
                ->where('name', 'like', '%' . $request->get('query') . '%')
                ->orWhere('email', 'like', '%' . $request->get('query') . '%')
                ->orWhere('mobile', 'like', '%' . $request->get('query') . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('pages.user.index')
                    ->with('user', $user)
                    ->with('query', $request->get('query'))
                    ->with('key', 1);

        }

        else {

            $user = DB::table('users')
                ->leftJoin('roles', 'users.role', '=', 'roles.id')
                ->where('users.role', '!=', 1)
                ->select('users.*', 'roles.role as rle')
                ->paginate(10);

            return view('pages.user.index')
                ->with('user', $user)
                ->with('query', $query)
                ->with('key', 1);

        }
    }

    public function  create()
    {

        $role = DB::table('roles')->where('id','>',1)->get();
        return view('pages.user.create',['role'=>$role]);
    }

    public function  store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:50|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'mobile' => 'required|numeric|digits_between:10,10|unique:users',
            'role' => 'required',
        );

        $customMessages = [

            'name.unique'  => 'This username already taken',
            'name.required' => 'username cannot be empty',
            'email.unique'  => 'This email already taken',
            'email.required' => 'email address cannot be empty',
            'mobile.required' => 'Mobile cannot be empty',
            'mobile.unique' => 'This mobile already taken',
            'role.required' => 'Role cannot be empty',

        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());

        } else {

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->mobile = $request->input('mobile');
            $user->role = $request->input('role');
            $image = $request->file('dp');

            if($image){

                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $user->dp = $new_name;

            }
            $user->save();

         
            return redirect()->route('user.index')->with('msgs', 'User Added Successfully');
        }
    }

    public function show($id)
    {

    }

    public function  edit($id)
    {

        $user = User::find($id);
        $role = DB::table('roles')->where('id','>',1)->get();
        return view('pages.user.edit')
            ->with('user', $user)
            ->with('role', $role);
    }

    public function  update(Request $request, $id)
    {

        $rules = array(

            'name' => 'required|string|max:50|unique:users,name,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required',
            'mobile' => 'required|numeric|digits_between:10,10|unique:users,mobile,'.$id,
            'role' => 'required',
        );

        $customMessages = [

            'name.unique'  => 'This username already taken',
            'name.required' => 'username cannot be empty',
            'email.unique'  => 'This email already taken',
            'email.required' => 'email address cannot be empty',
            'mobile.required' => 'Mobile cannot be empty',
            'mobile.unique' => 'This mobile already taken',
            'role.required' => 'Role cannot be empty',

        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {


            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if (!empty($request->input('password'))) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->mobile = $request->input('mobile');
            $user->role = $request->input('role');

            $image = $request->file('dp');
            if($image){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);

                $user->dp = $new_name;
            }

            $user->save();
            return redirect()->route('user.index')->with('msg-info', 'User Updated Successfully');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    public function loginLogs(){

        $loginLogs = DB::table('login_logs')->paginate(10);
        return view('pages.logs.login-logs',['loginLogs'=>$loginLogs]);
    }

    public function deleteLogs(){

        $respose = DB::table('login_logs')->truncate();
        return response()->json(['success'=>'deleted'],200);
    }

    public function  profile($id)
    {

        $user = User::find($id);
        $role = DB::table('roles')->where('id',$user->role)->get();
        return view('pages.user.update-password-index')
                    ->with('user', $user)
                    ->with('role', $role);

    }

    public function profileUpdate(Request $request, $id){


        $rules = array(

            'name' => 'required|string|max:50|unique:users,name,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'mobile' => 'required|numeric|digits_between:10,10|unique:users,mobile,'.$id,
        );

        $customMessages = [

            'name.unique'  => 'This username already taken',
            'name.required' => 'username cannot be empty',
            'email.unique'  => 'This email already taken',
            'email.required' => 'email address cannot be empty',
            'mobile.required' => 'Mobile cannot be empty',
            'mobile.unique' => 'This mobile already taken',

        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {


            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->mobile = $request->input('mobile');


            $image = $request->file('dp');
            if($image){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);

                $user->dp = $new_name;
            }

            $user->save();
            return redirect()->back()->with('msg', 'Profile Updated Successfully');
        }
    }

    public function updatePassword(){

            return view('pages.user.update-password');

    }

    public function passwordUpdate(Request $request){


        $rules = array(
            'oldPass' => 'required',
            'new_password' => 'min:8|required|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        );

        $customMessages = [
            'oldPass.required' => 'Previous password cannot be empty',
            'new_password.required' => 'New password cannot be empty',
            'password_confirmation.required' => 'Password confimation cannot be empty',
            'new_password.same' => 'New password and confirm password must same',
            'new_password.min' => 'Password minimum 8 character',
            'password_confirmation.min' => 'Confirm password minimum 8 character',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        else{

            $user = User::find(Auth::guard()->user()->id);

            $currentPassword = $user -> password;
            $currentPasswordByUser = $request->input('oldPass');

            if (Hash::check($currentPasswordByUser,$currentPassword)) {

                $user -> password = Hash::make($request->input('new_password'));
                $user -> save();
                session()->flush();
                Auth::logout();
                Session::flash('message', 'Password updated, Please login again!');
                return redirect()->route('login');
            }

            else{

                Session::flash('error', 'Password mismatch please try again.');
                return redirect()->back()->withInput($request->all());

            }
        }



    }


}

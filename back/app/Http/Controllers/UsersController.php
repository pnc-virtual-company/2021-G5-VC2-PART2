<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use App\Models\User_detail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with(['user_details','company'])->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'], 
            'last_name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            
        ]);
        
        
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();
        
        
        return response()->json([
            'user' => $user,
        ]); 
    }
    public function signin(Request $request)
    {
        // singin function
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => "Email or password in valid. Please contact to Admin!!"], 401);
        }

        return response()->json([
            'user' => $user,
        ]);
        //signout function
    }
    public function signout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'signout']);
    }

    // Explore alumni
    public function search()
    {
        $users = DB::table('users')
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('companies.*', 'users.first_name', 'users.last_name', 'users.role', 'users.email', 'user_details.*')
            ->get();
        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        
        
        // $token = $user->createToken('mytoken')->plainTextToken;
        return response()->json(
            $user,
        ); 
    }
}
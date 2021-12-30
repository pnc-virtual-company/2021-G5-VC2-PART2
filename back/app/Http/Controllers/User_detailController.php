<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_detail;

class User_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User_detail::with('user')->get();
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
        $request->validate([
            'phone' => "required",
            'date_of_birth' => "required",
            'province' => "required",
            'batch' => "required",
            'major' => "required",
            'current_position' => "required",
            'gender' => "required"  
        ]);


        $User_detail = new User_detail();
        $User_detail->user_id = $request->user_id;
        $User_detail->phone = $request->phone;
        $User_detail->date_of_birth = $request->date_of_birth;
        $User_detail->province = $request->province;
          
            $User_detail->batch = $request->batch;
            $User_detail->major = $request->major;
            $User_detail->current_position = $request->current_position;
            $User_detail->gender = $request->gender;
            $User_detail->save();

        return response()->json(['message' => 'create','data'=>$User_detail], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return User_detail::where('user_id','like','%'.$id.'%')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'phone' => "required",
            'date_of_birth' => "required",
            'province' => "required",
            'batch' => "required",
<<<<<<< HEAD
<<<<<<< HEAD
            'picture' => "nullable",
=======
>>>>>>> 1b995ee2c362280b95f25d8fd49dd4a653f8990e
=======
>>>>>>> admin
            'major' => "required",
            'gender' => "required"
            
              
        ]);
<<<<<<< HEAD
<<<<<<< HEAD
                        //move image to storage
        // $request->file('profile')->store('public/profiles');
=======
        
>>>>>>> 1b995ee2c362280b95f25d8fd49dd4a653f8990e
=======
        
>>>>>>> admin
        $User_detail = User_detail::findOrFail($id);
        $User_detail->user_id = $request->user_id;
        $User_detail->phone = $request->phone;
        $User_detail->date_of_birth = $request->date_of_birth;
        $User_detail->province = $request->province;
<<<<<<< HEAD
<<<<<<< HEAD
        // $User_detail->picture = $request->file('picture')->hashName();
=======
>>>>>>> 1b995ee2c362280b95f25d8fd49dd4a653f8990e
=======
>>>>>>> admin
        $User_detail->batch = $request->batch;
        $User_detail->major = $request->major;

        $User_detail->gender = $request->gender;
       
        
        $User_detail->save();
<<<<<<< HEAD
<<<<<<< HEAD
        return response()->json($User_detail, 200);
=======

        return response()->json(['message' => 'updated'], 200);
>>>>>>> 1b995ee2c362280b95f25d8fd49dd4a653f8990e
=======

        return response()->json(['message' => 'updated'], 200);
>>>>>>> admin
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'picture' => 'image|mimes:jpg,jpeg,png,gif,webp|max:1999',
        ]);



                //move image to storage
                //     $User_detail->picture = $request->file('picture')->hashName();
                //     User_detail::where('id', $id)->get()->first('picture')->store('public/profiles');
    
    $request->file('picture')->store('public/profiles');
    $img = User_detail::findOrFail($id);
    if($img) {
        $img->picture = $request->file('picture')->hashName();
        $img->save();
    }
    
    // $edit = User_detail::where('user_id',$id)->get();
        return response()->json(['message' => 'Successs','img'=>$img,'id'=>$id], 200);
    }
}

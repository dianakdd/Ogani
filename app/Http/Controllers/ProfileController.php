<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use DB;
class ProfileController extends Controller
{
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $profile = DB::table('profile')->where('user_id', $id)->first();
        
        return view('pages.profile', compact('user','profile'));
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $profile = DB::table('profile')->where('user_id', $id)->first();
        return view('pages.editProfile', compact('user','profile'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
            'umur' => 'required|integer',
            'telepon' => 'required',
            'gender'=>'required'
        ]);
        $user = User::find($id);
        $profile = Profile::firstWhere('user_id', $id);
        if($request->foto){
            $filename = time().'.'.$request->foto->extension(); 
            $request->foto->move(public_path('img/profile'), $filename);
            unlink(public_path('img/profile/'.$profile->foto));
        }else{
            $filename = null;
        }
       
        
      
        $user->name=$request->name;
        $profile->alamat=$request->alamat;
        $profile->telepon=$request->telepon;
        $profile->umur=$request->umur;
        $profile->gender=$request->gender;
        $profile->foto = $filename;
        $profile->update();
        $user->update();
        return redirect('/profile'.'/'.$id);
    }


}

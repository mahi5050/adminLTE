<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UsertableController extends Controller
{
    public function show(){
        $user= DB::select('select * from users');
        return view('user_data.usertable',['user'=>$user]);
    }

    public function destroy($id){
		$user = DB::table('users')->where('id',$id)->delete();
		return redirect('user_data.usertable')->with('success','user successfull');

   }

   public function edit($id){
       $user=DB::select('select * from users where id=?',[$id]);
        return view('user_data.usertable_edit',['user'=>$user]);
   }

   public function update(Request $request, $id){
    $name = $request->input('name');
	$email = $request->input('email');
    $role = $request->input('role');
    
    $data=DB::table('users')->where('id',$id)->update(['name'=>$name, 'email'=>$email, 'role'=>$role]);
    return redirect('/user_data.usertable');
   }
}

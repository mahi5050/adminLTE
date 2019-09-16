<?php

namespace App\Http\Controllers;
use App\Leader;
use Illuminate\Http\Request;
use DB;
class UsertableController extends Controller
{
// public function index()
// {
//      $leader =Leader::latest()->paginate(5);
//      return view('leader.emp_index',compact('leader'))->with('i', (request()->input('page', 1) - 1) * 5);
// }

// /**
//  * Show the form for creating a new resource.
//  *
//  * @return \Illuminate\Http\Response
//  */
// public function create()
// {
//     $user =User::all();
//     // dd($user);
//     return view('leader.emp_create',['user'=>$user]);
// }

// /**
//  * Store a newly created resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\Response
//  */
// public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required',
//         'email'=> 'required',
      
//     ]);
    
//    Leader::create($request->all());
   
//     return redirect('/leader');

// }
  
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

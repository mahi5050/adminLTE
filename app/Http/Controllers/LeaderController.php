<?php

namespace App\Http\Controllers;

use App\Leader;
use App\User;
use Illuminate\Http\Request;
use Auth;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $id = Auth::user()->id;
        $user  = User::where('id','=',$id)->first();
        $user->employe()->where('p_id','=',$id)->get();
        // re turn $user;
         $leader =Leader::where('p_id','=',$id)->latest()->paginate(5);
         return view('leader.emp_index',compact('leader','user'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =User::all();
        // dd($user);
        return view('leader.emp_create',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email'=> 'required',
          
        ]);
        $id = Auth::user()->id;
        
          $user  = User::where('id','=',$id)->first();
          $user->employe()->create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone]);
        //   $r = $user->employe()->where('p_id','=',$id)->get();
    //        return $r;
    //    Leader::create($request->all()); 
       
        return redirect('/leader');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Leader $leader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Leader $leader, user $user)
    {
        $user =User::all();
        return view('/leader/emp_edit',compact('leader','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leader $leader)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            
        ]);
        // $leader->name = $request->name;
        // $leader->email = $request->email;
        // $leader->password = $request->password;
        // $leader->active = $request->active;
        // $leader->department = $request->department;
        // $leader->save();
        $leader->update($request->all());
        return redirect('/leader');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leader $leader)
    {
        $leader->delete();
        return redirect('/leader');
    }
    public function createemp(Request $request)
    {
        return $request;
    //    User::where('id','=',Auth::user()->id)->create_employe()->create(['name'=>$request]);
    }
}

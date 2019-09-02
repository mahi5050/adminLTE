<?php

namespace App\Http\Controllers;

use App\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $leader =Leader::all();
         return view('leader.leader_index',['leader'=>$leader]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leader.leader_create');
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
            'password'=> 'required',
            'department'=>'required',
        ]);
        $leader = Leader::create(['name'=>$request->name, 'email'=>$request->email, 'password'=>$request->password, 'department'=>$request->department]);
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
    public function edit(Leader $leader)
    {
        return view('leader.leader_edit');
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
            'password'=> 'required',
            'department'=>'required',
        ]);
        $leader->name = $request->name;
        $leader->email = $request->email;
        $leader->password = $request->password;
        $leader->active = $request->active;
        $leader->department = $request->department;
        $leader->same();
        return redirect('leader');
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
}

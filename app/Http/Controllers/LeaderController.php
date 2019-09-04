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
         $leader =Leader::latest()->paginate(5);
         return view('leader.emp_index',compact('leader'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leader.emp_create');
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
       Leader::create($request->all());
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
        return view('leader.leader_edit',compact('leader'));
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
}

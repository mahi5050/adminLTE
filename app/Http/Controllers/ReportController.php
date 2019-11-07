<?php

namespace App\Http\Controllers;
use App\Leader;
use App\Report;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->name;
        $user  = User::where('name','=',$id)->first();
        $user->employe()->where('p_id','=',$id)->get();
        $report = Report::all();
        return view('report.report_index',compact('report','user'));
        // $report = Report::where('p_id','=',$id)->latest()->paginate(5);
        // return view ('report.report_index',compact('report','user'))->with('i', (request()->input('page', 1) -1 ) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =User::all();
        return view('report.report_create',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data=[];        

        foreach($request->sale as $index=>$d)
        {
            $ar['date']=$request->date[0];
            $ar['sale']=$d;
            $ar['employee']=$request->employee[$index];
            $ar['p_id']=Auth::id();
            array_push($data,$ar);
        }
        
       $ar=[];
        
        Report::insert($data);
        return redirect('/report');
        }
       
     /**
     * Display the specified resource.
     *
     * @param  \App\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $user = User::all();
        return view('report/report_edit',compact('report','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
      
        $report->update($request->all());
        return redirect('report');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report -> delete();
        return redirect('report');
    }
}

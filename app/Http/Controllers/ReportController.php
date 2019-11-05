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
        $id = Auth::user()->id;
        $user  = User::where('id','=',$id)->first();
        $user->employe()->where('p_id','=',$id)->get();
        $report = Report::where('p_id','=',$id)->latest()->paginate(5);
        return view ('report.report_index',compact('report','user'))->with('i',(request()->input('page',1) -1 ) *5);
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

    //         $id = Auth::user()->id;
    //         $user = User::where('id','=',$id)->first();
    //         $report =new report;
    //         $report->date=$request->date;
    //         // if($id != 0){
    //         //     foreach($request->sale as $key => $value){
    //         //         $data = array('sale'=>$value, 'employee'=>$value);
    //         //         dump($data);
    //         //     }
    //         // }
    //         // ---------------------------------------------------------------------
    //         $rules = [];
    //         foreach($request as $key => $value) {
                
    //      $rules["sale.{$key}"] = 'required';
    //    $rules["employee.{$key}"] = 'required';
    //         }
    //         $validator = report::make($request->all(), $rules);
    //     //   $user->create(['sale'=>$request->sale,'employee'=>$request->employee]);
    //         dump($validator);
    //   //  foreach($request->input('employee') as $key => $value)
    // {
    //         report::create(['date'=>$report->date,'sale'=>$report->value, 'employee'=>$value]);
    //     }    
    //         dump($value);
            
        //    return response()->json(['success'=>'done']);
        //   }
    //   return redirect('/report');
    //  $id = Auth::user()->id;
    //     $user = User::where('id','=',$id)->first();
        // $user->report()->create(['date'=>$request->date, 'sale'=>$request->sale,'employee'=>$request->employee]);
        return redirect('/report');
        }
       
     /**
     * Display the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        //
    }
}

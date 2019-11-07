@include('leader.sidebar')
<div class="content-wrapper">
<section class="content-header">
<h1>Report
<small>Home</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-home active">employee_Home</i></a></li>
</ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
            <h3 class="box-title">All Reports</h3>
            </div>
            <div class="col-sm-12 m-auto">
           <a class="btn lg btn-primary fa fa-user-plus" href="/report/create"><b> Add New Report </b></a>
           </div>
           <br>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover text-center h3">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Sale</th>
                                <th>Employee</th>
                                <th>Leader Name</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        @foreach($reports as $report)
                        <tbody> 
                            <tr>
                                <td>{{$report->date}}</td>
                                <td>{{$report->sale}}</td>
                                <td>{{$report->employee}}</td>
                                <td>{{$report->p_id}}</td>
                                <td>
                                <form action="{{url('report',[$report->id])}}" method="post">
                                <a class="fa fa-edit btn btn-primary" href="{{route('report.edit',[$report->id])}}"></a>
                                @csrf
                                @method('Delete')
                                <button type="submit" class="fa fa-trash btn btn-danger"></button>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>
                {!! $reports->links() !!}
            </div>
            </div>
            </div>
        </div>
    </section>
</div>
@include('leader.footer')
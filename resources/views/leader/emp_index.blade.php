@include('leader.sidebar')
    <div class="content-wrapper">
    <section class="content-header">
    <h1>Employee
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
            <h3 class="box-title">All Employee</h3>
            </div>
           <div class="col-sm-12 m-auto">
           <a class="btn lg btn-primary fa fa-user-plus" href="/leader/create"><b> Add employee</b></a>
            <a class="btn lg btn-success fa fa-vcard pull-right" href="/report"><b> Add Report</b></a>
           </div>
           <br>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover text-center h3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Leader id</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        @foreach($leader as $emp)
                        <tbody> 
                            <tr>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->phone}}</td>
                                <td>{{$emp->p_id}}</td>
                                <td>
                                <form action="{{url('leader',[$emp->id])}}" method="post">
                                <a class="fa fa-edit btn btn-primary" href="{{route('leader.edit',[$emp->id])}}"></a>
                                @csrf
                                @method('Delete')
                                <button type="submit" class="fa fa-trash btn btn-danger"></button>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>
                {!! $leader->links() !!}
            </div>
            </div>
            </div>
        </div>
    </section>
    </div>
    
@include('leader.footer')


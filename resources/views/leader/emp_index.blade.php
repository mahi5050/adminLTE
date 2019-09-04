@include('leader.sidebar')
    <div class="content-wrapper">
    <section class="content-header">
    <h1>Leader
    <small>Home</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home active">Leader_Home</i></a></li>
    </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
            <h3 class="box-title">All Employee</h3>
            </div>
            <a class="btn btn-warning" href="/employee/create">Add employee</a>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover text-center h3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        @foreach($employee as $emp)
                        <tbody> 
                            <tr>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->phone}}</td>
                                <td>
                                <form action="{{url('employee',[$emp->id])}}" method="post">
                                <a class="fa fa-edit btn btn-primary" href="#"></a>

                                @csrf
                                @method('PUT')
                                <button type="submit" class="fa fa-trash btn btn-danger"></button>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>
            </div>
            </div>
            </div>
        </div>
    </section>
    </div>
    
@include('leader.footer')


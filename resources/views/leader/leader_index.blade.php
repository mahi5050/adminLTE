@include('layouts.sidebar')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Leader
            <small>Data Table</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Leader-table</li>
          </ol>
        </section>
       
        <section class="content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">All user</h3>
                      </div>
                      <!-- /.box-header -->
                      <a class="float-left btn btn-warning" href="/leader/create">Add Leader</a>
                      <div class="box-body">

                        <table id="example2" class="table table-bordered table-hover text-center h3">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active</th>
                            <th>Department</th>
                            <th>Actions</th>
                          </tr>
                          </thead>
                          @foreach($leader as $lead )
                          <tbody>
                          <tr>
                          <td>{{$lead->name}}</td>
                          <td>{{$lead->email}}</td>
                          <td>{{$lead->active}}</td>
                          <td>{{$lead->department}}</td>
                          <td>
                                <table class="table">
                                        <tr>
                                              <td> <a class="fa  fa-edit btn btn-primary" href="{{route('leader.edit',[$lead->id])}}"></a>
                                              </td>
                                              <td>
                                              <form action="{{url('leader',[$lead->id])}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="fa  fa-trash btn btn-danger"></button>                               
                                </form>
                                              </td>
                                        </tr>
                                </table>
                           </td>
                          </tr>
                          </tbody>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
          
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </section>
        </div>

@include('layouts.footer')

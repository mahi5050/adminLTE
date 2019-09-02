@include('layouts.sidebar')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Data Table
            <small>Data base</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User-table</li>
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
                      <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                          </tr>
                          </thead>
                          @foreach($user as $usr )
                          <tbody>
                          <tr>
                          <td>{{$usr->name}}</td>
                          <td>{{$usr->email}}</td>
                          <td>{{$usr->role}}</td>
                          <td><a class="fa fa-lg fa-edit btn btn-primary" href="/edit/{{$usr->id}}"></a>
                           <a class="fa fa-lg fa-trash btn btn-danger" href ="/destroy/{{$usr->id}}"></a></td>
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
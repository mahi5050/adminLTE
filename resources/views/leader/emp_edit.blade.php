@include('leader.sidebar')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Leader
            <small>Add leader</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/leader"><i class="fa fa-table"></i> Leader-table</a></li>
            <li class="phone">Add Leader</li>
          </ol>
        </section>
       
       <section class="content">
       <div class="card">


                <div class="card-body">
                    <form method="POST" action="{{route('leader.update',$leader->id)}}">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control" name="name" value="{{$leader->name}}"  required>

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $leader->email }}" required autocomplete="email" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>

         
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $leader->phone}}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('update') }}
                                </button>
                            </div>
                        </div>
          
                    </form>

                </div>
            </div>
</div>
       </section>
        </div>

@include('leader.footer')

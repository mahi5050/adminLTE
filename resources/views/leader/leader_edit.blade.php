 @include('layouts.sidebar')
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
            <li class="active">Add Leader</li>
          </ol>
        </section>
       
       <section class="content">
       <div class="card">


                <div class="card-body">
                    <form method="POST" action="{{ url('leader',[$leader->id])}}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                             
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>

                            <div class="col-md-6">
                                <input id="active" type="text" class="form-control @error('active') is-invalid @enderror" name="active" value="{{ old('active') }}" required autocomplete="active" autofocus>

                                @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('department') }}</label>

                            <div class="col-md-6">
                                   
                                <select name="department" class="form-control" id="department" required>
                                    <option value="CS">CS</option>
                                    <option value="IT">IT</option>
                                    <option value="EEE">EEE</option>
                                    <option value="Mech">Mech</option>
                                    <option value="Civil">Civil</option>
                                </select>
                               
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

@include('layouts.footer')

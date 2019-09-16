@include('leader.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
        <h1> Report <small>Create Report</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home">Report table</i></a></li>
            <li><a href="/report"><i class="fa fa-table">Report table</i></a></li>
            <li class="active">Add report</li>
        </ol>
        </section>
        <section class="content">
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ url('/report') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sale" class="col-md-4 col-form-label text-md-right">{{ __('Sale') }}</label>

                            <div class="col-md-6">
                                <input id="sale" type="text" class="form-control @error('sale') is-invalid @enderror" name="sale" value="{{ old('sale') }}" required autocomplete="sale">

                                @error('sale')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>  
                        
                        <div class="form-group row">
                            <label for="employee" class="col-md-4 col-form-label text-md-right">{{ __('employee') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="employee" type="employee" class="form-control @error('employee') is-invalid @enderror" date="employee" value="{{ old('sale') }}" required autocomplete="employee"> -->
                                <select name="employeee" id="employeee">
                              @foreach($user as $us)
                               <option value="{{$us->id}}">{{$us->name}}</option>
                              @endforeach
                                </select>
                               
                            </div>
                        </div> 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary fa fa-user-plus">
                                    {{ __('Add Report') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        </section>
    </div>
@include('leader.footer')
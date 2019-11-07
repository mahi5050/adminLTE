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
            <form method="POST" action="{{ route('report.update',$report->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $report->date }}" required autocomplete="date" autofocus>

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
                                <input id="sale" type="text" class="form-control @error('sale') is-invalid @enderror" name="sale" value="{{ $report->sale }}" required autocomplete="sale">

                                @error('sale')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>  
                        
                        <div class="form-group row">
                            <label for="employe" class="col-md-4 col-form-label text-md-right">{{ __('employe') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="employe" type="employe" class="form-control @error('employee') is-invalid @enderror" date="employe" value="{{ old('sale') }}" required autocomplete="employe"> -->
                                <!-- <select class="form-control @error('employee') is-invalid @enderror" name="employee" id="employee" required> -->
                              <!-- @foreach($user as $lead)
                              <option value="{{$lead->name}}" {{ ( $lead->name == 'lead') ? 'selected':''}}>{{$lead->name}}</option>
                              @endforeach -->
                              <input id="employee" type="text" class="form-control @error('employee') is-invalid @enderror" name="employee" value="{{ $report->employee }}" required >

                                <!-- </select> -->
                                
                                @error('employee')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                               @enderror
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
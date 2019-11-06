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
        <div class="container">
    <div class="form-group">
         <form name="add_sale" id="" method="POST" action="{{ url('report') }}">  
         @csrf
    
            <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date[]" value="{{ old('date') }}">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                <thead>
                            <tr>
                                
                                <th>Sale</th>
                                <th>Employee</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                    <tr>  
                    <td>
                             
                             <input id="sale" type="text" class="form-control @error('sale') is-invalid @enderror" name="sale[]" value="{{ old('sale') }}" required autocomplete="sale">
                             @error('sale')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                             </span>
                            @enderror
                         </td> 
                         <td >
                            <select id="employee" class="form-control" name="employee[]" id="employee">
                          @foreach($user as $us)
                           <option value="{{$us->name}}">{{$us->name}}</option>
                          @endforeach
                            </select>
          
                        </td>                      
                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary fa fa-user-plus">
                                    {{ __('Add Report') }}
                                </button>
                            </div>
                        </div>            
                </div>


         </form>  
    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('report'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td> <input id="sale" type="text" class="form-control" name="sale[]" value="{{ old('sale') }}"></td><td><select class="form-control" id="employee" name="employee[]" id="employee">@foreach($user as $us)<option value="{{$us->name}}">{{$us->name}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_sale').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_sale')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
        </section>
    </div>

@include('leader.footer')
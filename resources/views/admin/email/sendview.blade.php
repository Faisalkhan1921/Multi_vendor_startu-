@extends('admin.index_master')

@section('admin_content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="card">
          
            <div class="card-header">
                <h1 class="text-center">Send Email
                    <a href="{{route('vendor.seller.send')}}" class="float-end btn btn-primary">Send Email</a>    
                    
                </h1>   
                @if(Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
            </div>    

            <div class="card-body">
              

                <form action="{{route('vendor.send.email')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Sender Email</label>
                        
                        <input type="email" name="sender_email" id="" class="form-control" value="{{$user->email}}" >
                    </div>

                    <div class="form-group">
                        <label for="">Recipent Email</label>
                        <input type="email" name="recipent_email" id="" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">Recept</label>
                        <input type="file" name="receipt" id="" class="form-control" >
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" value="Send Email" class="form-control btn btn-success">
                    </div>
                </form>
               
            </div>

        
        </div>  
        </div>
    </div>
</div>

@endsection
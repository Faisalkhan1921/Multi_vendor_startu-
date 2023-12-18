@extends('admin.index_master')

@section('admin_content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="card">
            @if(isset($user))
            <div class="card-header">
                <h1 class="text-center">Update Email
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
              

                <form action="{{route('vendor.email.update',$user->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Seller Email</label>
                        
                        <input type="email" name="email" id="" class="form-control" value="{{$user->email}}">
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" value="Update Email" class="form-control btn btn-success">
                    </div>
                </form>
               
            </div>

            @else 
            <div class="card-header">
                <h1 class="text-center">Add Email
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
              

                <form action="{{route('vendor.email.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Seller Email</label>
                        
                        <input type="email" name="email" id="" class="form-control" >
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" value="Add Email" class="form-control btn btn-success">
                    </div>
                </form>
               
            </div>
            @endif
        </div>  
        </div>
    </div>
</div>

@endsection
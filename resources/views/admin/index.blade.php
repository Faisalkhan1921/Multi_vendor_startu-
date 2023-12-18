@extends('admin.index_master')

@section('admin_content')
@if(Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<h1>user : {{Auth::guard('admin')->user()->uname}}</h1>
<h3>user : {{Auth::guard('admin')->user()->email}}</h3>



@endsection
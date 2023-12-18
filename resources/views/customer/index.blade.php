@extends('customer.index_master')
@section('customer_content')

@php 
$email = Auth::guard('customer')->user()->email;
$data = App\Models\EmailReceive::where('recipent_email',$email)->get();
// dd($data);
@endphp 
<div class="row">
    <div class="col-md-10 m-auto">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">
            All Receipts
          </h1>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Sender Email</th>
                <th scope="col">Receipt</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $data)
              <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->sender_email}}</td>
                <td>
                  <img src="{{asset($data->receipt)}}" alt="" style="width: 300px; height:200px;">
                </td>
                <td>
                  <a href="" class="btn btn-success">Action</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
@endsection
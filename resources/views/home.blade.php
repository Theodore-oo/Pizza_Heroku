@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your Orders</div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th scope="col">User</th>
                               <th scope="col">Phone/Email</th>
                               <th scope="col">Date/Time</th>
                               <th scope="col">Pizza</th>
                               <th scope="col">Small Pizza</th>
                               <th scope="col">Medium Pizza</th>
                               <th scope="col">Large Pizza</th>
                               <th scope="col">Total ($)</th>
                               <th scope="col">Message</th>
                               <th scope="col">Status</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($orders as $order)
                           <tr>
                               <th>{{$order->user->name}}</th>
                               <th>{{$order->user->email}}<br>{{$order->phone}}</th>
                               <th>{{$order->date}}/{{$order->time}}</th>
                               <th>{{$order->pizza->name}}</th>
                               <th>{{$order->small_pizza}}</th>
                               <th>{{$order->medium_pizza}}</th>
                               <th>{{$order->large_pizza}}</th>
                               <th>$ {{ ($order->pizza->small_pizza_price * $order->small_pizza) +
                                ($order->pizza->medium_pizza_price * $order->medium_pizza) +
                                ($order->pizza->large_pizza_price * $order->large_pizza) 
                                   }}</th>
                               <th>{{$order->body}}</th>
                               <th>{{$order->status}}</th>

                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: red;
        color: #fff;
    }
    .card-header{
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
</style>

@endsection

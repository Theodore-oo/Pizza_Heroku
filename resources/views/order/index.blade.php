@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Orders
                    <a href="{{route('pizza.create')}}" style="float:right;">Create Pizza</a>
                    <a href="{{route('pizza.index')}}" style="float:right; margin-right:30px;">View Pizza</a>
                </div>
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
                               <th scope="col">Accept</th>
                               <th scope="col">Reject</th>
                               <th scope="col">Completed</th>
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

                               <form action="{{route('order.status',$order->id)}}" method="post">@csrf
                               <th>
                                   <input name="status" type="submit" value="accepted" class="btn btn-primary btn-sm">
                                </th>
                               <th>
                                    <input name="status" type="submit" value="rejected" class="btn btn-danger btn-sm">
                                </th>
                               <th>
                                    <input name="status" type="submit" value="completed" class="btn btn-success btn-sm">
                                </th>
                               </form>

                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--Menu-->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>

            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                    <div>
                        <div class="alert alert-danger">
                            @foreach ( $errors->all() as $error)
                            <p> {{ $error }} </p> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!--Pizza-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="form-control">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of Pizza">
                        </div>
                        <div class="form-control">
                            <label for="description">Description of Pizza</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza Price ($)</label>
                            <input type="number" name="small_pizza_price" class="form-control" placeholder="small pizza size">
                            <input type="number" name="medium_pizza_price" class="form-control" placeholder="medium pizza size">
                            <input type="number" name="large_pizza_price" class="form-control" placeholder="large pizza size">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option value=""></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

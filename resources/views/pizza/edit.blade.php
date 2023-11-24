@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!--Pizza-->
        <div class="col-md-8">

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

            <div class="card">
                <div class="card-header">Edit Pizza</div>
                <form action="{{route('pizza.update',$pizza->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-control">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of Pizza" value="{{$pizza->name}}">
                        </div>
                        <div class="form-control">
                            <label for="description">Description of Pizza</label>
                            <textarea name="description" class="form-control">{{$pizza->description}}</textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza Price ($)</label>
                            <input type="text" name="small_pizza_price" class="form-control" placeholder="small pizza size" value="{{$pizza->small_pizza_price}}">
                            <input type="text" name="medium_pizza_price" class="form-control" placeholder="medium pizza size" value="{{$pizza->medium_pizza_price}}">
                            <input type="text" name="large_pizza_price" class="form-control" placeholder="large pizza size" value="{{$pizza->large_pizza_price}}">
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
                            <img src="{{ Storage::url($pizza->image) }}" width="80">
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

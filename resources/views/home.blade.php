@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            <div class="row">
            @foreach ($categories as $item)
           
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                    <img class="card-img-top" src="{{$item['imageUrl'] }}" width="70">
                        <h5 class="card-title">{{$item['name']}}</h5>
                    </div>
                    </div>
                </div>           
            @endforeach

            <div class="card-deck">
            @foreach ($products as $produk)
                <div class="card">
                    <img src="{{$produk['imageUrl'] }}" class="card-img-top" width="400">
                    <div class="card-body">
                    <h5 class="card-title">{{ $produk['title']}}</h5>
                    <p class="card-text">{{ $produk['description']}}.</p>
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-primary mb-5">Go somewhere</a>

                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection



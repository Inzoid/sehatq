@extends('layouts.home')
@section('content')

	<nav class="navbar navbar-expand navbar-light">
    <div class="collapse navbar-collapse">
      <a href="{{ url()->previous() }}" class="btn-back text-dark">
        <i class="mdi mdi-arrow-left mdi-24px"></i>
      </a>
      <h3 class="mb-0 ml-3">Purchased Products</h3>
        <div class="pull-left mt-3 ml-2 mb-2">
          <a href="{{route('home')}}" class="btn btn-dark btn-sm">
            <i class="fa fa-undo "> Back</i>
           </a>
        </div>
      </div>
  </nav>
  <div class="container">
                @if(session('notice'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats</strong> {!!session('notice') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span class="fa fa-times"></span>
                        </button>
                    </div>
                @endif
  	<div class="container">
	    @forelse ($history as $product)
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$product['title']}}</div>
	        <a href="{{ route('product.detail', $product['id']) }}" class="text-decoration-none">
            <img class="card-img" src="{{$product['imageUrl'] }}" 
                width="100">
          </a>
            <div class="card-body text-primary">
                <h5 class="card-title">{{$product['price']}}</h5>
            </div>
        </div>
	    @empty
	      <div class="col-8">
	        <h5 class="text-center my-3">You never buy any item.</h6>
	        <h4 class="text-center my-5">If you want buy product  <a href="{{route('home')}}">click here</a></h4>          
	      </div>
	    @endforelse
	    <div class="col-8">
	    	<a class="btn btn-block btn-danger" href="{{ route('logout') }}" 
	    		 onclick="event.preventDefault(); 
	    		 document.getElementById('logout-form').submit();">
	        {{ __('Logout') }}
	      </a>

	      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	      </form>
	    </div>
	  </div>
  </div>


@endsection
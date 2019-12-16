@extends('layouts.home')
@section('content')
    <!-- Page content -->
<div class="container mt-2">
  <div class="main-content">
      <div class="container">

          <!-- page title area end -->
          <div class="main-content-inner">
            <div class="row">
                @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                <img src=" {{ $category['imageUrl'] }}" class="rounded float-left" alt="..." width="60">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <br>
                                        <h4 class="header-title mb-0">{{$category['name']}}</h4>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    </div>
                </div>
        <br>
        
    @foreach($products as $item)
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img class="card-img" src="{{$item['imageUrl'] }}" 
                width="150">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <a href="{{ route('product.detail', $item['id']) }}" class="btn btn-info">Detail</a>
                </div>
            </div>
        @endforeach
        
@endsection
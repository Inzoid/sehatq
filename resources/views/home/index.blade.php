@extends('layouts.home')
@section('content')

<div class="container mt-2">
  <div class="main-content">
    <div class="container">
      <div class="row ml-1 mr-2">
        <div class="col-8 p-0">
          <div class="overflow-auto d-flex">
            @foreach ($categories as $category)
            <table>
              <tr>
                <td><span class="category-badge bg-white shadow-sm rounded text-nowrap d-flex align-items-center mb-1 mx-1 px-2 py-1">
                <img src="{{ $category['imageUrl'] }}" alt="{{ $category['name'] }}" width="70" class="mr-2" /></td>
              </span>
              </tr>
              <tr>
                <td><p class="text-center"> {{$category['name']}} </p></td>
              </tr>
              </table><br><br><br><br>
            @endforeach
          </div>
        </div>
      </div>
    
    <div class="list_product">
      @include('home.product')
    </div>
     
@endsection

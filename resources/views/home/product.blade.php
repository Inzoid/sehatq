@foreach($products as $item)
<table>
  <tbody id="myTable">
  <tr>
     <div class="card mb-3" style="max-width: 540px;" id="myTable">
     <td><div class="row no-gutters">
          <div class="col-md-3">
            <a href="{{ route('product.detail', $item['id']) }}" class="text-decoration-none">
              <img class="card-img" src="{{$item['imageUrl'] }}" 
              width="150">
            </a>
          </div>

              <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{$item['title']}}</h5>
            
                    <a href="{{ route('product.detail', $item['id']) }}" class="btn btn-info">Detail</a>
                      <?php
                        if ($item['loved']=='1') {
                          $class = 'danger';
                        } else {
                          $class = 'dark';
                        }
                      ?>
                    <button class="btn btn-{{$class}}">
                      <i class="fa fa-heart"></i>
                    </button>
                </div>
              </div>
            </td>
          </tr>
            <div class="mb-2">
            </div>
    @endforeach

@extends('layouts.admin')
@extends('layouts.bootstrap')
@section('title')
  <title>Trang Chủ</title>

@endsection
@section('content')
  <div class="content-wrapper">
    @include('warehouse.content-header', ['name' => 'product', 'key' => 'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 "> 
            <div class="search-container">
              <a href="{{ route('product.create') }}" class="butonn"><p>Thêm sản phẩm</p></a>
              <form action="{{ route('product.search') }}" class="seach" method="POST">
                @csrf
                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              
            </div>
          </div>
          <div class="col-md-12">
            @if (Session::has('thongbao'))
              <div class="butonn">
                {{Session::get('thongbao')}}
              </div>
            @endif
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">giá sản phẩm</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Mô tả</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $pr)
                  <tr>
                    <th>{{ $pr->id }}</th>
                    <td>{{ $pr->name }}</td>
                    <td>
                      <img style="width:80px;" src="{{ asset('gitignore/'.$pr->image) }}" alt="">
                    </td>
                    <td>{{ $pr->price }}</td>
                    <td>{{ $pr->quantity }}</td>
                    <td>{{ $pr->describe }}</td>
                    <td>
                      <form action="{{ route('product.destroy', $pr) }}" method="POST">
                          <a href="{{ route('product.edit',$pr) }}" class="btn btn-info">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Xoa</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
      {{$product->links()}}
    </div>
  </div>

@endsection


@extends('layouts.admin')
@extends('layouts.bootstrap')

@section('title')
  <title>Category</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('warehouse.content-header', ['name' => 'product', 'key' => 'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 "> 
            <div class="search-container">
                @csrf
                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              
            </div>
            @if (Session::has('thongbao'))
              <div class="butonn">
                {{Session::get('thongbao')}}
              </div>
            @endif
          </div>
          <div class="col-md-12">
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
            </table>
          </div>
          {{-- {{ $product->links() }} --}}
          <div class="col-md-12">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
 
@extends('layouts.admin')
@extends('layouts.bootstrap')
 
@section('title')
  <title>Trang ADMIN</title> 
@section('content')
  <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])
    <div class="content">
      <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm sản phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('product.index') }}" class="btn btn-primary float-end"> Danh sách sản phẩm</a>
                    </div>
    
                </div>
            </div>
            <div class="card-body">
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image">
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <input type="text" class="form-control" name="describe" placeholder="Nhập mô tả">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID category</label>
                      <input type="id" class="form-control" name="category_id" placeholder="Nhập">
                    </div>
                    <div class="form-group">
                      <label>Giá sản phẩm</label>
                      <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                      <label>Số lượng</label>
                      <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng">
                    </div>
                  </div>
                  <div class="submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
    
    </div>
  </div>

@endsection
  

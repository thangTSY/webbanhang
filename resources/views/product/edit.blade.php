
<!-- Stored in resources/views/child.blade.php -->
 
@extends('layouts.admin')
@extends('layouts.bootstrap')
 
@section('title')
  <title>Trang Chủ</title>
@endsection
@section('content')
  <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'product', 'key' => 'Edit'])
    <div class="content">
      <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Sua SP</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('product.index') }} " class="btn btn-primary fload-end"> Danh sach SP</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Ten SP</strong>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhap ten sp">
                            </div>
                            <div class="form-group">
                                <label>Anh</label>
                                <input type="file" name="image" value="{{ $product->image }}">
                            </div>
                            <div class="form-group">
                                <strong>Gía sản phẩm</strong>
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Nhap mô tả ">
                            </div>
                            <div class="form-group">
                                <strong>Số lượng</strong>
                                <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="Nhap mô tả ">
                            </div>
                            <div class="form-group">
                                <strong>Mô tả</strong>
                                <input type="text" name="describe" value="{{ $product->describe }}" class="form-control" placeholder="Nhap mô tả ">
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Cap Nhat</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  

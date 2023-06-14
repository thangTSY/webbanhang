
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
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mật khẩu</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($client as $client)
                <tr>
                  <th scope="row">{{ $client->id }}</th>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->password }}</td>
                  <td>
                    <form action="{{ route('client.destroy', $client) }}" method="POST">
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

    </div>
  </div>

@endsection


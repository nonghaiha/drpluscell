@extends('backend.layout.master')
@section('title','Trang quản trị')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
       
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$pr}}</h3>
            <p>Product</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
  
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$cat}}</h3>

            <p>Category</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$user}}</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('account.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$cu}}</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{route('customer.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><h4>Đơn hàng mới</h3></div>
          <div class="panel-body">
            <form action="" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input type="date" class="form-control"name="date_from" placeholder="Input field">
              </div>
            <div class="form-group">
                <input type="date" class="form-control" name="date_to" placeholder="Input field">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        
          <table class="table">
            <thead>
            <tr>
              <th>STT</th>
              <th>Tên khách hàng</th>
              <th>Ngày Đặt</th>
              <th></th>
            </tr>
          </thead>
          @foreach($or as $key=>$model)
          <tbody>
            <tr>
              <td>{{$key+=1}}</td>
              <td>{{$model->name}}</td>
              <td>{{$model->created_at}}</td>
              <td><a href="{{route('orders.index')}}" class="btn btn-danger">Xem đơn</a></td>
            </tr>
          </tbody>
          @endforeach
          </table>
        </div>
    
@stop()
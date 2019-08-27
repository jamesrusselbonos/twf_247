@extends('layouts.admin_dashboard')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!--  -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$products->where("deleted", 0)->count()}}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
  
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ count($agents)}}</h3>

                <p>Agents</p>
              </div>
              <div class="icon">
               <i class="fas fa-users"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
 
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

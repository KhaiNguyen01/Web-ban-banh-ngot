@extends('master')
@section('title','Tất cả sản phẩm')
@section('content')
  <div class="inner-header">
    <div class="container">
      <div class="pull-left">
        <h6 class="inner-title">Sản phẩm</h6>
      </div>
      <div class="pull-right">
        <div class="beta-breadcrumb font-large">
          <a href="index">Home</a> / <span>Sản phẩm</span>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="container">
    <div id="content" class="space-top-none">
      <div class="main-content">
        <div class="space60">&nbsp;</div>
        <div class="row">
          <div class="col-sm-3">
            <ul class="aside-menu">
              @foreach($all_type as $alltype)
                <li><a href="product_type/{{$alltype->id}}">{{$alltype->name}}</a></li>
              @endforeach

            </ul>
          </div>
          <div class="col-sm-9">
            <div class="beta-products-list">
              <h4>Tất cả sản phẩm</h4>
              <div class="beta-products-details">
                <p class="pull-left">{{count($all_products)}} sản phẩm</p>
                <div class="clearfix"></div>
              </div>

              <div class="row">
                @foreach($all_products as $allproducts)
                  <div class="col-sm-4">
                    <div class="single-item">
                      @if($allproducts->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                      @endif

                      <div class="single-item-header">
                        <a href="product/{{$allproducts->id}}"><img src="source/image/product/{{$allproducts->image}}" alt="" height="250px"></a>
                      </div>
                      <div class="single-item-body">
                        <p class="single-item-title">{{$allproducts->name}}</p>
                        <p class="single-item-price">
                          @if($allproducts->promotion_price==0)
                            <span class="flash-sale">{{number_format($allproducts->unit_price)}} đ</span>
                            @else
                              <span class="flash-del">{{number_format($allproducts->unit_price)}} đ</span>
                              <span class="flash-sale">{{number_format($allproducts->promotion_price)}} đ</span>
                          @endif
                        </p>
                      </div>
                      <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="add_to_cart/{{$allproducts->id}}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="product/{{$allproducts->id}}">Details <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                        <br>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="row">
                {{$all_products->links()}}
              </div>
            </div> <!-- .beta-products-list -->

            <div class="space50">&nbsp;</div>
          </div>
        </div> <!-- end section with sidebar and main content -->


      </div> <!-- .main-content -->
    </div> <!-- #content -->
  </div> <!-- .container -->
@endsection

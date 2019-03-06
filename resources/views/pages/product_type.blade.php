@extends('master')
@section('title','Sản phẩm theo loại')
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
              <h4>{{$type_of_product->name}}</h4>
              <div class="beta-products-details">
                <p class="pull-left">{{count($product_sorted_by_type)}} sản phẩm</p>
                <div class="clearfix"></div>
              </div>

              <div class="row">
                @foreach($product_sorted_by_type as $product)
                  <div class="col-sm-4">
                    <div class="single-item">
                      @if($product->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                      @endif

                      <div class="single-item-header">
                        <a href="product/{{$product->id}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
                      </div>
                      <div class="single-item-body">
                        <p class="single-item-title">{{$product->name}}</p>
                        <p class="single-item-price">
                          @if($product->promotion_price==0)
                            <span class="flash-sale">{{number_format($product->unit_price)}} đ</span>
                            @else
                              <span class="flash-del">{{number_format($product->unit_price)}} đ</span>
                              <span class="flash-sale">{{number_format($product->promotion_price)}} đ</span>
                          @endif
                        </p>
                      </div>
                      <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="add_to_cart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="product/{{$product->id}}">Details <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                        <br>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="row">
                {{$product_sorted_by_type->links()}}
              </div>
            </div> <!-- .beta-products-list -->

            <div class="space50">&nbsp;</div>

            <div class="beta-products-list">
              <h4>Sản phẩm khác</h4>
              <div class="beta-products-details">
                <div class="clearfix"></div>
              </div>
              <div class="row">
                @foreach($other_product as $otherproduct)
                  <div class="col-sm-4">
                    <div class="single-item">
                      @if($otherproduct->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                      @endif

                      <div class="single-item-header">
                        <a href="product/{{$otherproduct->id}}"><img src="source/image/product/{{$otherproduct->image}}" alt="" height="250px"></a>
                      </div>
                      <div class="single-item-body">
                        <p class="single-item-title">{{$otherproduct->name}}</p>
                        <p class="single-item-price">
                          @if($otherproduct->promotion_price==0)
                            <span class="flash-sale">{{number_format($otherproduct->unit_price)}} đ</span>
                            @else
                              <span class="flash-del">{{number_format($otherproduct->unit_price)}} đ</span>
                              <span class="flash-sale">{{number_format($otherproduct->promotion_price)}} đ</span>
                          @endif
                        </p>
                      </div>
                      <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="add_to_cart/{{$otherproduct->id}}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="product/{{$otherproduct->id}}">Details <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                        <br>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="space40">&nbsp;</div>

            </div> <!-- .beta-products-list -->
          </div>
        </div> <!-- end section with sidebar and main content -->


      </div> <!-- .main-content -->
    </div> <!-- #content -->
  </div> <!-- .container -->
@endsection

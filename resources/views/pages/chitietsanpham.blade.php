@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($ctsp->promotion_price!=0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="source/image/product/{{$ctsp->image}}" alt="">
						</div>
						<div class="col-sm-8">

							<div class="single-item-body">
								<p class="single-item-title"><h5>{{$ctsp->name}}</h5></p>
								<p class="single-item-price">
									@if($ctsp->promotion_price==0)
												<span class="flash-sale">{{number_format($ctsp->unit_price)}}</span>
									@else
									<span class="flash-del">{{number_format($ctsp->unit_price)}}</span>
									<span class="flash-sale">{{number_format($ctsp->promotion_price)}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$ctsp->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="addtocard/{{$ctsp->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Chi tiết</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$ctsp->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@foreach($newP as $np)
							<div class="col-sm-4">
								<div class="single-item">
									@if($np->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="chitietsanpham/{{$np->id}}"><img height="200px" src="source/image/product/{{$np->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$np->name}}</p>
										<p class="single-item-price">
											@if($np->promotion_price==0)
												<span class="flash-sale">{{number_format($np->unit_price)}}</span>
											@else
											<span class="flash-del">{{number_format($np->unit_price)}}</span>
											<span class="flash-sale">{{number_format($np->promotion_price)}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="addtocard/{{$np->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chitietsanpham/{{$np->id}}">Xem thêm <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div style="text-align: center;">{{ $newP->links() }}</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($newP as $n)
								<div class="media beta-sales-item">

									<a class="pull-left" href="chitietsanpham/{{$n->id}}"><img src="source/image/product/{{$n->image}}" alt=""></a>
									@if($n->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="media-body">
										{{$n->name}}
										@if($n->promotion_price==0)
												<span class="flash-sale">{{number_format($n->unit_price)}}</span>
											@else
											<span class="flash-del">{{number_format($n->unit_price)}}</span>
											<span class="flash-sale">{{number_format($n->promotion_price)}}</span>
											@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($newP as $n)
								<div class="media beta-sales-item">

									<a class="pull-left" href="chitietsanpham/{{$n->id}}"><img src="source/image/product/{{$n->image}}" alt=""></a>
									@if($n->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="media-body">
										{{$n->name}}
										@if($n->promotion_price==0)
												<span class="flash-sale">{{number_format($n->unit_price)}}</span>
											@else
											<span class="flash-del">{{number_format($n->unit_price)}}</span>
											<span class="flash-sale">{{number_format($n->promotion_price)}}</span>
											@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
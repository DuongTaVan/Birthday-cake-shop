	@extends('master')
	@section('content')
	</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
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
							@foreach($loaisp as $lsp)
							<li><a href="loaisanpham/{{$lsp->id}}">{{$lsp->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$namesp->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($id_loaisp)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($id_loaisp as $id)
								<div class="col-sm-4">
									<div class="single-item">
										@if($id->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="chitietsanpham/{{$id->id}}"><img height="250px" src="source/image/product/{{$id->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$id->name}}</p>
											<p class="single-item-price">
												@if($id->promotion_price==0)
												<span class="flash-sale">{{number_format($id->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($id->unit_price)}}</span>
												<span class="flash-sale">{{number_format($id->promotion_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsanpham/{{$id->id}}">Xem thêm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div style="text-align: center;">{{ $id_loaisp->links() }}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($newP)}}</p>
								<div class="clearfix"></div>
							</div>
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
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsanpham/{{$np->id}}">Xem thêm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div style="text-align: center;">{{ $newP->links() }}</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection
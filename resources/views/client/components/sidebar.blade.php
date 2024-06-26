<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach($categorys as $category)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									@if($category->categoryChildrent->count())
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
											<span class="badge pull-right">	
												<i class="fa fa-plus"></i>		
											</span>											
											{{$category->category_name}}
										</a>
										@else
										<a href="{{route('get_category',['id' => $category->id])}}">
											<span  class="badge pull-right"></span>
											{{$category->category_name}}
										</a>
										@endif
									</h4>
								</div>
								<div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($category->categoryChildrent as $categoryChilrent)
											<li><a href="{{route('get_category',['id' => $categoryChilrent->id])}}">{{$categoryChilrent->category_name}} </a></li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>		
							@endforeach
						</div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brandes as $brands)
									<li><a href="{{route('get_brand',['id' => $brands->id])}}"> <span class="pull-right"></span>{{$brands->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->

    </div>
</div>

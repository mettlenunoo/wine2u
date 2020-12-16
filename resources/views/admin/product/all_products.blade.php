@extends('admin.layout.app')
@section('content')
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Product(s)
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Product</li>
                                <li><a class="link-effect" href="/admin/product/create">Add New</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->
                @include('admin.message')
                

                <!-- Page Content -->
                <div class="content visibility-hidden" data-toggle="appear" data-timeout="100" data-class="animated fadeInLeft">
                   
                     <!-- Table Sections (.js-table-sections class is initialized in App() -> uiHelperTableToolsSections()) -->
                    <div class="block">
                        <div class="block-header">
                            {{-- <div class="block-options">
                                <code>.js-table-sections</code>
                            </div> --}}
                            {{-- <h3 class="block-title">Table Sections</h3> --}}
                        </div>
                        <div class="block-content">
                           
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th style="width: 15%;" >Image</th>
                                        <th style="width: 30%;">Name</th>
                                        {{-- <th style="width: 10%;">Sku</th>
                                        <th style="width: 10%;">Stock</th> --}}
                                        <th style="width: 25%;">Categories</th>
                                        <th style="width: 15%;">Date</th>
                                        <th style="width: 15%;"></th>
                                        {{-- <th class="hidden-xs" style="width: 15%;">Date</th> --}}
                                    </tr>
                                </thead>
                            
                                @forelse ($products as $key => $product)
                                    
                                    <tbody class="js-table-sections-header @if($key == 0) open @endif">
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-angle-right"></i>
                                            </td>

                                            <td class="font-w600"><img src="/product_images/{{ $product->img1 }}" style="width:30px"></td>
                                            <td class="font-w600">
                                                <em class="text-muted"> {{ ucwords($product->product_name)  }}</em>
                                                {{-- <span class="label label-danger">Disabled</span> --}}
                                            </td>
                                        
                                            <td class="font-w600">

                                                @forelse ($product->categories as $key => $category)
                                                    <em class="text-muted"> @if($key >= 1) , @endif {{ ucwords($category->title) }} </em>  
                                                @empty
                                                    <em class="text-muted">Uncategorized</em>
                                                @endforelse
                                                
                                            </td>
                                            <td class="">
                                                <em class="text-muted"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $product->created_at)->format('F j, Y') }}</em>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a  href="/admin/product/{{ $product->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit" ><i class="fa fa-pencil"></i></a>
                                                    <a  href="/admin/product/{{ $product->id }}/edit" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View" ><i class="fa fa-eye"></i></a>
                                                    
                                                    {!! Form::open(['action' => ['productController@destroy', $product->id ], 'method' => 'POST']) !!}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onClick ="return confirm('Are you sure You want to Delete')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
                                                    {!! Form::close() !!}
                                                    {{-- <a  href="javascript:void(0)" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove" onClick ="return deleteAlert('/admin/vendor/delete?del=')"><i class="fa fa-times"></i>
                                                    </a> --}}

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tbody>
                                     @forelse ($product->variableProductAttributes as $key => $vProduct)
                                     <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">

                                          @if($vProduct->sale_price > 0) 

                                            <span class="text-success"> {{  number_format($vProduct->sale_price,2)  }}</span> <br/>
                                            <span class="text-danger" style=" text-decoration: line-through "> {{ number_format( $vProduct->regular_price,2 ) }}</span>
                                          
                                           @else 

                                            <span class="text-success"> {{  number_format($vProduct->regular_price,2)  }}</span>

                                           @endif

                                        </td>

                                        <td class="font-w600">
                                            <small> <b> {{ $vProduct->attribute->parentAttribute->title }} </b> {{ $vProduct->attribute->title }} </small> 
                                        </td>

                                        <td class="font-w600">
                                            @if( $vProduct->stock == "In stock")
                                                <small class="text-muted text-success"> {{ $vProduct->stock }} </small>
                                            @else
                                                <small class="text-muted text-danger"> {{ $vProduct->stock }} </small>
                                            @endif
                                            
                                        </td>

                                        <td class="font-w600">
                                            <small class="text-muted"> {{ $vProduct->sku }} </small>
                                        </td>

                                        <td class="font-w600">
                                            <small class="text-muted"> <b>{{ $vProduct->quantity }}</b> item(s) </small>
                                        </td>

                                     </tr>

                                     @empty
                                         <tr>
                                            <td class="text-center"></td>
                                           <td style=""> No variable product </td> 
                                         </tr>
                                     @endforelse
                                      
                                    </tbody>

                                @empty
                                <tr>
                                  <td class="text-center" style=""></td>
                                    <td style=""> <p> No product. <a href="/product/create"> Please add a new product</a> </p> </td> 
                                 </tr>
                                    

                                @endforelse

                            </table>

                            <ul class="pagination pagination-md text-center">
                                {!! $products->render() !!}
                                {{-- <li class="disabled">
                                    <a href="javascript:void(0)"><i class="fa fa-angle-double-left"></i></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)">1</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">2</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">3</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">4</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">5</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-angle-double-right"></i></a>
                                </li> --}}
                            </ul>

                        </div>
                    </div>
                    <!-- END Table Sections -->

                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

      @endsection
@extends('admin.layout.app')
@section('content')


            <!-- Main Container -->
            <main id="main-container">

                
             <!-- Page Header -->
             <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                    Add Product <small>Fill the forms below</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Product</li>
                                <li><a class="link-effect" href="/admin/product/">All Products</a></li>
                            </ol>
                        </div>
                    </div>
            </div>
          <!-- END Page Header -->
          @include('admin.message')

                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row" >
                         <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                    <div class="block-content">
            {!! Form::open(['action' => ['productController@update', $product->id ], 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t']) !!}
                   
     {{-- {!! Form::open(['action' => 'productController@store', 'method' => 'POST','files' => true,'class'=> 'form-horizontal push-10-t'] ) !!} --}}
                                        
                         <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Name</label>
                        <div class="col-sm-12">
                        <input class="form-control" type="text" id="title" name="product_name" placeholder="Product  Name" value="{{ $product->product_name }}" required>
                                            </div>
                                        </div>
      
    <br>
    
      <!-- Block Tabs Animated Fade -->
<div class="form-group" id="inventoryDIV">
     <div class="block">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
                <a href="#btabs-animated-fade-short">Product Short Description</a>
            </li>
            <li>
                <a href="#btabs-animated-fade-ingredients">Extended Description </a>
            </li>
            <li>
                <a href="#btabs-animated-fade-more">More Info</a>
            </li>
        </ul>
     <div class="block-content tab-content">


        <div class="tab-pane fade in active" id="btabs-animated-fade-short">
             
                <div class="form-group">
                        <div class=" block-content-full">
                             <p class="" for="example-text-input">Short Product Description</p>
                             <p id="desc" style="color:red;"> </p>
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="short_description" id="desc">{!! $product->short_description !!}</textarea>
                                        
                        </div>
                  </div>
       
        </div>


        <div class="tab-pane fade" id="btabs-animated-fade-ingredients">

                <div class="form-group">
                        <div class=" block-content-full">
                            <p class="" for="example-text-input">Extended Description</p>
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="description">{!! $product->description !!}</textarea>
                                        
                        </div>
                </div>

        </div>



        <div class="tab-pane fade" id="btabs-animated-fade-more">
                <div class="form-group">
                        <div class=" block-content-full">
                             <p class="" for="example-text-input">More Details</p>
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="more_description">{!! $product->more_description !!}</textarea>
                                        
                        </div>
                  </div>
        </div>



    </div>
   </div>
</div>
                          
        <br>
         <!-- Block Tabs Animated Fade -->
         <div id="product">
          @foreach ($product->variableProduct as $vProduct)
            
            <div class="block product-row" >
                         
                <div class="block-content">
                   <div class="form-horizontal">

                                                   
                        <div class="form-group">
                                <label class="col-xs-3" for="example-select">Select Attribute(s) *</label>
                                <div class="col-sm-9">
                                    
                                  <select class="form-control" name="attrs[]" style="width: 100%;" required="">
                                        @foreach($attributes as $key => $parentAttr) 
                                            <option  disabled > {{ $parentAttr->title }} </option>
                                                @foreach ($parentAttr->subAttributes as $key => $subAttr) 
                                                        <option value="{{ $subAttr->id }}" @if($vProduct->attribute_id == $subAttr->id)  selected @endif> <span aria-hidden="true">—</span>{{ $subAttr->title }}</option>
                                                @endforeach
                                        @endforeach
                                    </select>

                                </div>
                        </div>
                            
                         <div class="form-group">
                            <label class="col-xs-3" for="example-text-input">Regular Price * </label>
                            <div class="col-sm-9">
                            <input class="form-control" type="number" step="any" value="{{ $vProduct->regular_price}}" placeholder="Reqular Price" id="example-text-input" name="regular[]" required>
                            </div>
                         </div>
               
                        <div class="form-group">
                            <label class="col-xs-3" for="example-text-input">Sale Price </label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" value="{{ $vProduct->sale_price}}"  placeholder="Sales Price" step="any" id="example-text-input" name="sales[]" >
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-xs-3" for="example-text-input">SKU</label>
                             <div class="col-sm-9">
                                <input class="form-control" type="text" placeholder="product SKU"  id="example-text-input" name="sku[]" value="{{ $vProduct->sku}}" >
                            </div>
                        </div>
                
                    <div class="form-group">
                        <label class="col-xs-3" for="example-text-input">Stock quantity *</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" placeholder="Stock Quantity" step="any" id="example-text-input" name="qty[]" value="{{ $vProduct->quantity }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-xs-3" for="example-select">Select Category *</label>
                        <div class="col-sm-9">
                        <select class="form-control" id="example-select" name="stock[]" size="1" required>
                                <option value="In stock" @if($vProduct->stock == "In stock") selected @endif>In stock</option>
                                <option value="Out of Stock" @if($vProduct->stock == "Out of Stock") selected @endif>Out of Stock </option>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label class="col-xs-3" for="example-text-input">Weight (kg)  </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" placeholder="Weight (kg)" id="example-text-input" name="wty[]" step="any" value="{{ $vProduct->weight }}" >
                        </div>
                     </div>
                  
                     <div class="form-group">
                         <label class="col-xs-3" for="example-text-input">Dimensions </label>
                         <div class="col-sm-3">
                            <input class="form-control" type="number" id="example-text-input" step="any" name="lengh[]" placeholder="Lengh" value="{{ $vProduct->product_lenght }}" >
                         </div>
                  
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="example-text-input" step="any" name="wth[]" placeholder="Width"  value="{{ $vProduct->product_width }}" >
                        </div>
                  
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="example-text-input" step="any" name="hty[]" placeholder="Height"  value="{{ $vProduct->product_height }}">
                        </div>
                     </div>

                    <input  type="hidden" name="ids[]" value="{{ $vProduct->id }}" required>
        
                    <div class="form-group">   
                        <div class="col-sm-12 text-right">
                            <div class="col-md-12">
                                <a href="#" class="new_product" title="Add new"> <i
                                        class="fa fa-plus mr-5"></i>
                                </a>
                                <a href="#" class="remove_product" data-toggle="tooltip"
                                    title="Remove ">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
               </div>
               
            </div>

          @endforeach


              
         </div>  
        
    </div>
</div>
<!-- END Default Elements -->
</div>
                     <div class="col-md-4">
                          <div class="block">
                          <!-- featured image here -->
                          <div class="block-content">
                            <div class="form-group">
                               <label class="" for="example-file-input">Front Image</label>
                                 <input type="file" id="imageupload" name="img1" >  
                           
                                <div id="preview-image" >

                                        <div class="thumbimage">

                                            <img src="{{ asset('product_images/'.$product->img1) }}"  width="100px" />

                                        </div>

                                </div>
                             </div>


                        </div>

                        <div class="block-content">
                                <div class="form-group">
                                   <label class="" for="example-file-input">Back Image</label>
                                     <input type="file" id="imageupload" name="img2"  >  

                                     <div id="preview-image" >
                                            <div class="thumbimage">
                                                 <img src="{{ asset('product_images/'.$product->img2) }}"  width="100px" />
                                             </div>
                                     </div>
         
                                </div>

                        </div>
                            <div class="block-content">
                            
                                <div class="form-group">
                                    <label class="col-xs-12" for="example-tags1">Video Link</label>
                                        <div class="col-xs-12">
                                            <textarea  class="input form-control" placeholder="Video Link "  id="video_link" name="video_link" >{!! $product->video !!}</textarea>
                                        </div>
                                </div>
                            </div>
 
                 <!-- select categoy here -->
                            </div>


        <div class="block">    
          <div class="block-content">
           <div class="form-horizontal">
                                        
                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Category</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="category[]"  required="">
                               <option disabled >None</option>

                               @foreach($categories as $key => $parentCat) 
                               
                               <option  disabled > {{ $parentCat->title }} </option>
                               @foreach ($parentCat->subCategories as $key => $subCat) 

                               @php $wasFound = false; @endphp
                                   @foreach ($product->categories as $selPair)
                                       @if($selPair->id == $subCat->id )
                                           <option value="{{ $subCat->id }}" selected > <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                           @php $wasFound = true @endphp
                                       @endif
                                   @endforeach
                                   @if($wasFound == false)
                                       <option value="{{ $subCat->id }}" > <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                   @endif
                               @endforeach

                            @endforeach



                               @foreach($categories as $key => $parentCat) 
                                    <option  disabled > {{ $parentCat->title }} </option>
                                        @foreach ($parentCat->subCategories as $key => $subCat) 
                                          
                                                <option value="{{ $subCat->id }}"> <span aria-hidden="true">—</span>{{ $subCat->title }}</option>
                                    
                                        @endforeach
                                @endforeach
                            </select>
                         </div>
                </div>
                               
             </div>
           </div>              
          </div>


          <div class="block">    
            <div class="block-content">
             <div class="form-horizontal">
                
                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Brand</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose .."    name="brand"  required="">
                              
                            <option value="" >None</option>

                                @foreach($brands as $key => $brand) 
                                    @php $wasFound = false; @endphp
                                    @foreach ($product->brand as $selBrand)
                                        @if($brand->id == $selBrand->id )
                                         @php $wasFound = true @endphp
                                        @endif
                                    @endforeach
                                    
                                    <option  value="{{ $brand->id }}" @if($wasFound == true) selected @endif> {{ $brand->title }} </option>
                                @endforeach
                            </select>
                         </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Wine Type</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="wines[]"  required="">
                               <option disabled >None</option>
                                @foreach($wines as $key => $wine) 
                                    <option  disabled > {{ $wine->title }} </option>
                                       
                                        @foreach ($wine->subWines as $key => $sub) 
                                         @php $wasFound = false; @endphp
                                            @foreach ($product->wines as $selWine)
                                                @if($selWine->id == $sub->id )
                                                    <option value="{{ $sub->id }}" selected > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                                    @php $wasFound = true @endphp
                                                @endif
                                            @endforeach

                                            @if($wasFound == false)
                                                 <option value="{{ $sub->id }}" > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                           @endif
                                        @endforeach
                                @endforeach
                            </select>
                         </div>
                </div>
                                          
                  <div class="form-group">
                      <label class="col-xs-12" for="example-select">Select Offer</label>
                           <div class="col-sm-12">
                             <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="offers[]" >
                                 <option disabled >None</option>

                                @foreach($offers as $key => $offer) 
                                    <option  disabled > {{ $offer->title }} </option>
                                        @foreach ($offer->subOffers as $key => $sub) 
                                        @php $wasFound = false; @endphp
                                            @foreach ($product->offers as $selOffer)
                                                @if($selOffer->id == $sub->id )
                                                    <option value="{{ $sub->id }}" selected > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                                    @php $wasFound = true @endphp
                                                @endif
                                            @endforeach
                                            @if($wasFound == false)
                                                <option value="{{ $sub->id }}" > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                            @endif
                                        @endforeach
                                @endforeach

                              </select>
                           </div>
                  </div>


                  <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Grapes Type</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="grapes[]" >
                               <option disabled >None</option>

                               @foreach($grapes as $key => $grape) 

                                    <option  disabled > {{ $grape->title }} </option>    
                                    @foreach ($grape->subGrapes as $key => $sub) 
                                    @php $wasFound = false; @endphp
                                        @foreach ($product->grapes as $selGrapes)
                                            @if($selGrapes->id == $sub->id )
                                                <option value="{{ $sub->id }}" selected > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                                @php $wasFound = true @endphp
                                            @endif
                                        @endforeach
                                        @if($wasFound == false)
                                            <option value="{{ $sub->id }}" > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                        @endif
                                    @endforeach

                                @endforeach
                            </select>
                         </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select  Pair</label>
                         <div class="col-sm-12">
                            <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="pairs[]" >
                                <option disabled >None</option>

                                @foreach($pairs as $key => $pair) 
                               
                                <option  disabled > {{ $pair->title }} </option>   
                                @foreach ($pair->subPairing as $key => $sub)  
                                @php $wasFound = false; @endphp
                                    @foreach ($product->pairing as $selPair)
                                        @if($selPair->id == $sub->id )
                                            <option value="{{ $sub->id }}" selected > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                            @php $wasFound = true @endphp
                                        @endif
                                    @endforeach
                                    @if($wasFound == false)
                                        <option value="{{ $sub->id }}" > <span aria-hidden="true">—</span>{{ $sub->title }}</option>
                                    @endif
                                @endforeach

                             @endforeach

                            </select>
                         </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select  Region</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="country[]" >
                            <option disabled >None</option>

                            @foreach($countries as $key => $country) 
                                
                            <option  disabled > {{ $country->name }} </option>   
                             @foreach ($country->regions as $key => $row) 
                                @php $wasFound = false; @endphp
                                    @foreach ($product->country as $selCountry)
                                        @if($selCountry->id == $sub->id )
                                            <option value="{{ $row->id }}" selected > <span aria-hidden="true">—</span>{{ $row->name }}</option>
                                            @php $wasFound = true @endphp
                                        @endif
                                    @endforeach
                                    @if($wasFound == false)
                                        <option value="{{ $row->id }}" > <span aria-hidden="true">—</span>{{ $row->name }}</option>
                                    @endif
                                @endforeach

                            @endforeach

                            </select>
                         </div>
                </div>

               

                                 
               </div>
             </div>              
            </div>

          <div class="block">    
            <div class="block-content">
              <div class="form-horizontal">
                   
                  <div class="form-group">
                      <label class="col-xs-4" for="example-select">Light</label>
                      <div class="col-sm-8">
                      <input class="form-control" type="number" name="light" value="{{ $product->light }}" min="0" max="10">
                       </div>
                  </div>

                  <div class="form-group">
                    <label class="col-xs-4" for="example-select">Smooth</label>
                    <div class="col-sm-8">
                       <input class="form-control" type="number" name="smooth" value="{{ $product->smooth }}" min="0" max="10">
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-xs-4" for="example-select">Dry</label>
                    <div class="col-sm-8">
                       <input class="form-control" type="number" name="dry" value="{{ $product->dry }}" min="0" max="10">
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="col-xs-4" for="example-select">Soft</label>
                    <div class="col-sm-8">
                       <input class="form-control" type="number" name="soft" value="{{ $product->soft }}" min="0" max="10">
                     </div>
                  </div>
                
              </div>
            </div>              
          </div>


<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
         <div class="form-group">
                  <label class="col-xs-12" for="example-tags1">Tag</label>
            <div class="col-xs-12">
            <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="{{ $product->tag }}">
             </div>
        </div>
   

     <div class="form-group">
      <label class="col-xs-12" for="example-select">Visibility</label>
        <div class="col-sm-12">
           <select class="form-control" id="example-select" name="visibility" size="1" required>
                <option value="private" @if($product->visibility == "private") selected @endif >private</option>
                <option value="public">public</option>
            </select>
         </div>
      </div>

   

      <div class="form-group">
          <label class="col-xs-12" for="example-select">Publish</label>
            <div class="col-sm-12">
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="publish" value="{{ $product->publish }}"  required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
            </div>
       </div>
   

        <div class="form-group">
   <label class="col-xs-12" for="example-select">Featured</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="featured" size="1" required>
        <option value="None" @if($product->featured == "None") selected @endif>None</option>
        <option value="Home" @if($product->featured == "Home") selected @endif>Home</option>
      </select>
            </div>
        </div>
                               
     </div>
    </div>
</div>

<div class="block">
                         
         <div class="block-content">
        <div class="form-horizontal">
                                        
         <div class="block-content">
             <div class="form-group">
      <label class="" for="example-file-input">Gallery Images</label>
      <input type="file" multiple name="gallery[]" id="imageupload_banner">

      @foreach ($product->gallery as $key => $image)
        <div class="thumbimage" id="img{{ $image->id }}" >
            <a  href="javascript:void(0);" onclick="deleteImage({{$image->id}})"  class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
            <img src="{{ asset('product_images/'.$image->img) }}"  width="100px" />
        </a>
        </div>
      @endforeach
             </div>

    

         </div>
                               
     </div>
    </div>
</div>
                            <!-- post btn here --> 
        <div class="form-group">
            <div class="col-xs-12">
            {{ Form::hidden('_method','PUT')}}
            <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit" id="sub_btn">Publish</button>
            </div>
        </div>

    {!! Form::close() !!}
     
     
 
              
                    </div>
                    </div>
                    </div>
                </div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
      

@endsection

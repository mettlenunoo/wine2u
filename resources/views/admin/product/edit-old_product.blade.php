@extends('admin.layout.app')
@section('content')


            <!-- Main Container -->
            <main id="main-container">

             <!-- Page Header -->
                <div class="content bg-gray-lighter visibility-hidden"   data-toggle="appear" data-class="animated bounceIn">
                        <div class="row items-push">
                            <div class="col-sm-7">
                                <h1 class="page-heading">
                                     Edit Product 
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


                <!-- Page Content -->
                <div class="content animated fadeInLeft">
                    <div class="row">
                         <div class="col-md-8">
                            <!-- Default Elements -->
                            <div class="block">
                               
                    <div class="block-content">

            <form class="form-horizontal" id="update" >
                                        
                         <div class="form-group">
            <label class="col-xs-12" for="example-text-input">Product Name</label>
                             <div class="col-sm-12">
                        <input class="form-control" type="text" id="title" name="product_name" placeholder="Product  Name"  value="{{ $product->product_name }}">
                        <input class="form-control" type="hidden" value="{{ $product->id}}" id="example-text-input" name="id" >

                              </div>
                            </div>
        {{-- <div class="form-group">
             <label class="col-xs-12" for="example-text-input">Slug</label>
           <div class="col-sm-12">
             <input class="form-control" type="text" id="slug_title" name="slug" placeholder="Slug">
           </div>
         </div> --}}
         <!--<div class="form-group">
       <label class="col-xs-12" for="example-text-input">Product has child products?</label>
                        <div class="col-sm-12">
                        
                        <input type="checkbox" class="form-check-input" name="hasChildren">
                        <label class="form-check-label" for="exampleCheck1">Yes</label>
          </div>
         </div> -->
              {{-- <div class="form-group">
                    <div class=" block-content-full">
                         <p class="" for="example-text-input">Short Product Description</p>
                                    <!-- Summernote Container -->
                        <textarea class="js-summernote" name="content"></textarea>
                                    
                    </div>
              </div> --}}
    <br>
    
      <!-- Block Tabs Animated Fade -->
<div class="form-group" id="inventoryDIV">
     <div class="block">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
                <a href="#btabs-animated-fade-short">Product Short Description</a>
            </li>
            <li>
                <a href="#btabs-animated-fade-ingredients">Extended Description</a>
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
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="description" id="desc">{{ $product->description }}</textarea>
                                        
                        </div>
                  </div>
       
        </div>


        <div class="tab-pane fade" id="btabs-animated-fade-ingredients">

                <div class="form-group">
                        <div class=" block-content-full">
                            <p class="" for="example-text-input">Extended Description</p>
                            <p id="desc" style="color:red;"> </p>
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="short_description">{{ $product->short_description }}</textarea>
                                        
                        </div>
                </div>

        </div>



        <div class="tab-pane fade" id="btabs-animated-fade-more">
                <div class="form-group">
                        <div class=" block-content-full">
                             <p class="" for="example-text-input">More Details</p>
                                        <!-- Summernote Container -->
                            <textarea class="js-summernote" name="more_description">{{ $product->more_description }}</textarea>
                                        
                        </div>
                  </div>
        </div>



    </div>
   </div>
</div>
                          
        <br>
        <a href="javascript:void(0);" id="addButton">Add Product </a>                      
         <!-- Block Tabs Animated Fade -->
         <div id="product">

{{-- <div class="form-group" >
        <div class="block">
           <ul class="nav nav-tabs" data-toggle="tabs">
               <li class="active">
               <a href="#btabs-animated-fade-price">General</a>
               </li>
               <li>
                   <a href="#btabs-animated-fade-inventory">Inventory</a>
               </li>
               <li>
                   <a href="#btabs-animated-fade-shipping">Shipping</a>
               </li>
           </ul>
        <div class="block-content tab-content">
           <div class="tab-pane fade in active" id="btabs-animated-fade-price">

            <div class="form-group">
                    <label class="col-xs-2" for="example-select">Select Attribute(s)</label>
                    <div class="col-sm-8">
                        <select  class="js-select2 form-control" id="example2-select2-multiple" name="attr[]" style="width: 100%;" data-placeholder="Choose many.." >
                                @foreach($parent as $key => $row) 
                                    <option  disabled > {{ $row['title']}} </option>
                                        @foreach ($attributes as $key => $value) 
                                            @if($value['parent'] == $row['id']) 
                                             
                                                   <option value="{{ $value['id'] }}"> <span aria-hidden="true">—</span>{{ $value['title'] }}</option>

                                            @endif
                                        @endforeach
                                @endforeach
    
                        
                        </select>
                    </div>
            </div>
                
             <div class="form-group">
                    <label class="col-xs-2" for="example-text-input">Regular Price </label>
                   <div class="col-sm-8">
                     <input class="form-control" type="text" value="0" id="example-text-input" name="regular[]" >
                    </div>
             </div>
   
           <div class="form-group">
             <label class="col-xs-2" for="example-text-input">Sale Price</label>
                   <div class="col-sm-8">
                   <input class="form-control" value="0" type="text" id="example-text-input" name="sales[]" >
                  </div>
            </div>
           <hr>

   
       </div>
   
   
   <div class="tab-pane fade" id="btabs-animated-fade-inventory">

           
   
       <div class="form-group">
          <label class="col-xs-2" for="example-text-input">SKU</label>
                   <div class="col-sm-8">
                   <input class="form-control" type="text" id="example-text-input" name="sku[]" >
   
             </div>
        </div>
   
        <div class="form-group">
          <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                   <div class="col-sm-8">
               <input class="form-control" type="number" id="example-text-input" name="qty[]" value="0" >
   
             </div>
        </div>
        <div class="form-group">
        <label class="col-xs-2" for="example-select">Stock</label>
            <div class="col-sm-8">
            <select class="form-control" id="example-select" name="stock[]" size="1">
                    <option value="In stock">In stock</option>
                    <option value="Out of Stock">Out of Stock </option>
                </select>
            </div>
        </div>
   
               </div>
   
   
   
   <div class="tab-pane fade" id="btabs-animated-fade-shipping">
   
       <div class="form-group">
             <label class="col-xs-2" for="example-text-input">Weight (kg) </label>
                   <div class="col-sm-8">
           <input class="form-control" type="number" id="example-text-input" name="wty[]" step="0.01" value="0" >
   
             </div>
      </div>
   
      <div class="form-group">
          <label class="col-xs-2" for="example-text-input">Dimensions </label>
                   <div class="col-sm-3">
           <input class="form-control" type="number" id="example-text-input" step="0.01" name="lengh[]" placeholder="Lengh"  value="0" >
   
             </div>
   
             <div class="col-sm-3">
           <input class="form-control" type="number" id="example-text-input" step="0.01" name="wth[]" placeholder="Width" value="0" >
   
             </div>
   
             <div class="col-sm-2">
           <input class="form-control" type="number" id="example-text-input" step="0.01"  name="hty[]" placeholder="Height" value="0" >
   
             </div>
      </div>
   
   </div> --}}

 @foreach ($v_products as $key => $v_product)
   
 <div class="block" id="{{$v_product->id}}">
        <input class="form-control" type="hidden" value="{{ $v_product->id }}" id="example-text-input" name="ids[]" >
    <div class="block-content">
       <div class="form-horizontal">
                                       
            <div class="form-group">
                    <label class="col-xs-2" for="example-select">Select Attribute(s)</label>
                    <div class="col-sm-8">
                        <select  class="js-select2 form-control" id="example2-select2-multiple" name="attr1[]" style="width: 100%;" data-placeholder="Choose many.." multiple >
                                @foreach($parent as $key => $row) 
                                <option  disabled > {{ $row['title']}} </option>
                                    @foreach ($attributes as $key => $value) 
                                        @if($value['parent'] == $row['id']) 
                                         
                                        <option value="{{ $value['id'] }}" @if($v_product->attribute_id == $value['id']) selected @endif > <span aria-hidden="true">—</span>{{ $value['title'] }}</option>

                                        @endif
                                    @endforeach
                            @endforeach
                        
                        </select>
                    </div>
            </div>
                
             <div class="form-group">
                    <label class="col-xs-2" for="example-text-input">Regular Price </label>
                   <div class="col-sm-8">
                   <input class="form-control" type="text" value="{{ $v_product->regular_price}}" id="example-text-input" name="regular1[]" >
                    </div>
             </div>
   
           <div class="form-group">
             <label class="col-xs-2" for="example-text-input">Sale Price</label>
                   <div class="col-sm-8">
                   <input class="form-control" value="{{ $v_product->sale_price}}" type="text" id="example-text-input" name="sales1[]" >
                  </div>
            </div>

        <div class="form-group">
        <label class="col-xs-2" for="example-text-input">SKU</label>
                    <div class="col-sm-8">
                    <input class="form-control" type="text" id="example-text-input" name="sku1[]" value="{{ $v_product->sku}}">
    
            </div>
        </div>
    
        <div class="form-group">
        <label class="col-xs-2" for="example-text-input">Stock quantity</label>
                    <div class="col-sm-8">
                <input class="form-control" type="number" id="example-text-input" name="qty1[]" value="{{ $v_product->quantity}}" >
    
            </div>
        </div>
        <div class="form-group">
        <label class="col-xs-2" for="example-select">Select Category</label>
            <div class="col-sm-8">
            <select class="form-control" id="example-select" name="stock1[]" size="1">
                    <option value="In Stock" @if($v_product->stock == "In Stock") selected @endif>In stock</option>
                    <option value="Out of Stock" @if($v_product->stock == "Out of Stock") selected @endif>Out of Stock </option>
                </select>
            </div>
        </div>

        <div class="form-group">
                <label class="col-xs-2" for="example-text-input">Weight (kg) </label>
                      <div class="col-sm-8">
              <input class="form-control" type="number" id="example-text-input" name="wty1[]" step="0.01" value="{{ $v_product->weight}}">
      
                </div>
         </div>
      
         <div class="form-group">
             <label class="col-xs-2" for="example-text-input">Dimensions </label>
                      <div class="col-sm-3">
              <input class="form-control" type="number" id="example-text-input" step="0.01" name="lengh1[]" placeholder="Lengh"   value="{{ $v_product->product_lenght}}" >
      
                </div>
      
                <div class="col-sm-3">
              <input class="form-control" type="number" id="example-text-input" step="0.01" name="wth1[]" placeholder="Width"  value="{{ $v_product->product_width}}"  >
      
                </div>
      
                <div class="col-sm-2">
              <input class="form-control" type="number" id="example-text-input" step="0.01"  name="hty1[]" placeholder="Height" value="{{ $v_product->product_height}}"  >
      
                </div>
             
         </div>
          <div class="form-group">   
                <div class="col-sm-10 text-right">
                        <a href="javascript:void(0);" onclick="deletevProduct({{$v_product->id}})"> Remove </a>
                 </div>
          </div>
                 
    </div>
   </div>
</div>
   
     {{-- </div>
    </div>
</div> --}}

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
                         
                           
                 <!-- select categoy here -->
            </div>


        <div class="block">    
          <div class="block-content">
           <div class="form-horizontal">
                                        
                    @php
                     $sel_categories = explode(",",$product->category);
                    @endphp
                <div class="form-group">
                    <label class="col-xs-12" for="example-select">Select Category</label>
                         <div class="col-sm-12">
                           <select  class="js-select2 form-control" id="example2-select2"  style="width: 100%;" data-placeholder="Choose many.."  multiple  name="category[]"  required="">
                               <option disabled >None</option>
                                @foreach($cat_parent as $key => $row) 
                                  
                                    <option  disabled > {{ $row['title']}} </option>
                                        @foreach ($categories as $key => $value) 
                                            @if($value['parent'] == $row['id']) 
                                              @php $wasFound = false; @endphp
                                                @foreach ($sel_categories as $item)
                                                   @if($item == $value['id'])
                                                     <option value="{{ $value['id'] }}" selected > <span aria-hidden="true">—</span>{{ $value['title'] }}</option>  
                                                     @php $wasFound = true @endphp
                                                   @endif
                                                @endforeach

                                                @if($wasFound == false)
                                                 <option value="{{ $value['id'] }}" > <span aria-hidden="true">—</span>{{ $value['title'] }}</option>
                                                @endif

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
                      <label class="col-xs-12" for="example-tags1">Short Note</label>
                       <div class="col-xs-12">
                           <textarea  class="input form-control" placeholder="Short Note"  id="short_note" name="short_note" required="">
                             @if($note)
                             {{ $note->details}}
                             @endif
                            
                            </textarea>
                       </div>
                    </div>
    
                    <div class="form-group">
                       <label class="col-xs-12" for="example-tags1">Display  Images</label>
                        <div class="col-xs-12">
                            <input type="file" name="note_img" id="note_img" >  
                       </div>
                      <div id="preview-note-img" >
                          @if($note)
                            <div class="thumbimage">
                                    <img src="{{ asset('product_images/'.$note->img) }}"  width="100px" />
                            </div>
                          @endif
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
                <input class="js-tags-input form-control" type="text" id="example-tags1" name="tag" value="{{$product->tag}}">
            </div>
        </div>
   

    <div class="form-group">
      <label class="col-xs-12" for="example-select">Visibility</label>
        <div class="col-sm-12">
           <select class="form-control" id="example-select" name="visibility" size="1">
                <option value="private" @if($product->visibility == "private") selected @endif >private</option>
                <option value="public"  @if($product->visibility == "public") selected @endif >public</option>
            </select>
         </div>
      </div>

      <div class="form-group">
          <label class="col-xs-12" for="example-select">Publish</label>
          <div class="col-sm-12">
                <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" name="publish"  value="{{$product->publish}}"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                </div>
         </div>
       </div>
   

        <div class="form-group">
   <label class="col-xs-12" for="example-select">Featured</label>
            <div class="col-sm-12">
        <select class="form-control" id="example-select" name="featured" size="1">
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
      <input type="file" multiple name="picx[]" id="imageupload_banner">
      @foreach ($photos as $key => $row_image)
        <div class="thumbimage" id="img{{ $row_image->id }}" >
           <a  href="javascript:void(0);" onclick="deleteImage({{$row_image->id}})"  class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
           <img src="{{ asset('product_images/'.$row_image->img) }}"  width="100px" />
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
            <button class="btn btn-sm btn-primary  pull-right" type="submit" name="submit" id="sub_btn">Publish</button>
            </div>
        </div>
     </form>
     
     
              
                    </div>
                    </div>
                    </div>
                </div>

                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
      

@endsection

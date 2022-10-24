    <!--begin::Form-->
    {!! Form::model($Item, [ 'route' => ['admin_panel.products.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}

        <input type="hidden" name="id" value="{{$Item->id}}">

        <div class="row">
            <div class="col-sm-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                <label>  اسم المنتج  <span class="text-danger">*</span> </label>

                <input type="text" name="title" class="form-control m-input" required="required" value="{{ $Item->title }}" placeholder=" اسم المنتج">

                @if ($errors->has('title'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('title') }} </strong>
                        </span>
                @endif
            </div>

            <div class="col-sm-4 {{ $errors->has('main_category_id') ? ' has-error' : '' }}">
                <label>  الاقسام الرئيسية <span class="text-danger">*</span> </label>
                <select name="main_category_id" id="main_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                    <option value="" disabled selected="true">  اختر قسم </option>
                    @foreach (H_Main_Category() as $key => $value)
                        <option value="{{ $key }}" @if($Item->main_category_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                    @endforeach
                </select>
                @if ($errors->has('main_category_id'))
                <span class="help-block" style="color:red">
                    <strong>{{ $errors->first('main_category_id') }}</strong>
                </span>
                @endif
            </div>

            @php
                $sub_cats = App\Models\Sub_Category::where('main_category_id',$Item->main_category_id)->pluck('title','id');
            @endphp
            <div class="col-sm-4 {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                <label>  الاقسام الفرعية  </label>
                <select name="sub_category_id" id="sub_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                    <option value="" disabled selected="true"> اختر قسم </option>
                    @if($sub_cats != null)
                        @foreach ($sub_cats as $key => $value)
                            <option value="{{ $key  }}" @if($key == $Item->sub_category_id ) selected={{ 'selected' }} @endif> {{ $value  }} </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('sub_category_id'))
                 <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('sub_category_id') }}</strong>
                 </span>
                @endif
             </div>


            <div class="col-sm-4 {{ $errors->has('brand') ? ' has-error' : '' }}">
                <label>  الماركة    </label>

                <input type="text" name="brand" class="form-control m-input" value="{{ $Item->brand }}" placeholder=" الماركة    ">

                @if ($errors->has('brand'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('brand') }} </strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-4 {{ $errors->has('price_before_discount') ? ' has-error' : '' }}">
                <label>  السعر  <span class="text-danger">*</span>  </label>

                <input type="number" min="0" name="price_before_discount" class="form-control m-input" required="required" value="{{ $Item->price_before_discount }}" placeholder=" السعر  ">

                @if ($errors->has('price_before_discount'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('price_before_discount') }} </strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-4 {{ $errors->has('discount') ? ' has-error' : '' }}">
                <label>  نسبة الخصم   </label>

                <input type="number" min="0" max="100" name="discount" class="form-control m-input" value="{{ $Item->discount }}" placeholder=" نسبة الخصم   ">

                @if ($errors->has('discount'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('discount') }} </strong>
                    </span>
                @endif
            </div>


        </div>


    <div class="row">
        <div class="col-sm-12 {{ $errors->has('url') ? ' has-error' : '' }}">
            <label>  اللينك  <span class="text-danger">*</span> </label>

            <input type="text" name="url" class="form-control m-input" required="required" value="{{ $Item->url }}" placeholder=" اللينك">

            @if ($errors->has('url'))
                <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('url') }} </strong>
                             </span>
            @endif
        </div>


    </div>

        <div class="row">

            @php
                $product_color = App\Models\Product_Colors::where('product_id',$Item->id)->first();
            @endphp


            <div class="col-sm-6 {{ $errors->has('pic') ? ' has-error' : '' }}">
                <label>  الصورة (460*460) </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="pic" accept="image/*">
                    <label class="custom-file-label" for="customFile"> اختر صورة </label>
                </div>
                @if ($errors->has('pic'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('pic') }}</strong>
                    </span>
                @endif
                <br>
                <img src="{{ Custom_Image_Path('products',$Item->pic) }}"
                        style="width: 200px;height: 150px;margin-bottom: 20px;margin-top: 20px"/>
            </div>

            <div class="col-sm-6 {{ $errors->has('color_id') ? ' has-error' : '' }}">
                <label> الالون <span class="text-danger">*</span> </label>
                <select name="color_id" id="color_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                    <option value="" disabled selected="true">  اختر لون </option>
                    @foreach (H_Colors() as $key => $value)
                        <option value="{{ $key  }}" @if($product_color != null && $key == $product_color->color_id) selected={{ 'selected' }} @endif> {{ $value  }} </option>
                    @endforeach
                </select>
                @if ($errors->has('color_id'))
                 <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('color_id') }}</strong>
                 </span>
                @endif
            </div>

            <div class="col-lg-12 col-sm-12 {{ $errors->has('tags') ? ' has-error' : '' }}">
                <label> التاجات    </label>
                @php $product_tags = App\Models\Product_Tags::where('product_id',$Item->id)->pluck('tag')->toArray(); @endphp
                <input type="text" data-role="tagsinput" name="tags" class="form-control m-input en_tag_input" value="{{ implode(",",$product_tags) }}" placeholder=" التاجات ">
                @if ($errors->has('tags'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('tags') }} </strong>
                    </span>
                @endif
             </div>

        </div>

        @php
            $sizes = App\Models\Size::where('status',1)->where('sub_category_id',$Item->sub_category_id)->pluck('title','id')->toArray();
            $size1 = App\Models\Product_Sizes::where('product_id',$Item->id)->where('order',1)->first();
        @endphp



        <div class="m-separator m-separator--dashed" style="display: block;height: 5px;width: 100%;border-bottom: 2px dashed #ebedf2;margin-bottom:30px;margin-top:30px"></div>

        <div class="row">

            <div class="col-md-6 col-sm-6 {{ $errors->has('size1') ? ' has-error' : '' }}">
                <label>  المقاسات <span class="text-danger">*</span>  </label>
                <select name="size1" class="size_id form-control" required>
                    <option value="" disabled selected> اختر مقاس  </option>
                    @foreach ($sizes as $key => $value)
                        <option value="{{$key}}" @if($size1 != null && $size1->size_id == $key) {{'selected'}} @endif> {{$value}} </option>
                    @endforeach
                </select>
                @if ($errors->has('size1'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('size1') }}</strong>
                    </span>
                @endif
                </div>


                <div class="col-md-6 col-sm-6 {{ $errors->has('quantity1') ? ' has-error' : '' }}">
                <label>  الكمية   <span class="text-danger">*</span> </label>

                <input type="number" min="1" name="quantity1" class="quantity form-control m-input" required="required" value="{{ $size1 != null ? $size1->quantity : 0 }}" placeholder="  الكمية ">

                @if ($errors->has('quantity1'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('quantity1') }} </strong>
                        </span>
                @endif
            </div>

        </div>



        <div class="m-separator m-separator--dashed" style="display: block;height: 5px;width: 100%;border-bottom: 2px dashed #ebedf2;margin-bottom:30px;margin-top:30px"></div>

        <div class="row">

            @for($i=2; $i <= $setting->product_sizes_count; $i++)

            @php
                $size2 = App\Models\Product_Sizes::where('product_id',$Item->id)->where('order',$i)->first();
            @endphp

                <div class="col-md-3 col-sm-3 {{ $errors->has('size$i') ? ' has-error' : '' }}">
                    <label>  المقاسات  </label>
                    <select name="size{{$i}}" class="size_id form-control">
                        <option value="" selected> اختر مقاس  </option>
                        @foreach ($sizes as $key => $value)
                            <option value="{{$key}}" @if($size2 != null && $size2->size_id == $key) {{'selected'}} @endif> {{$value}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has("size{{$i}}"))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first("size$i") }}</strong>
                    </span>
                    @endif
                </div>


                <div class="col-md-3 col-sm-3 {{ $errors->has("quantity$i") ? ' has-error' : '' }}">
                    <label>  الكمية   </label>

                    <input type="number" min="0" name="quantity{{$i}}" class="quantity form-control m-input" value="{{ $size2 != null ? $size2->quantity : 0 }}" placeholder="  الكمية ">

                    @if ($errors->has("quantity{{$i}}"))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first("quantity$i") }} </strong>
                        </span>
                    @endif
                </div>

            @endfor


        </div>



        <div class="row">
            <div class="col-sm-12 {{ $errors->has('short_description') ? ' has-error' : '' }}">
                <label> وصف مختصر <span class="text-danger">*</span>  </label>
                <textarea name="short_description" required class="form-control" rows="10" placeholder=" وصف مختصر  ">{{ $Item->short_description }}</textarea>
                @if ($errors->has('short_description'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('short_description') }} </strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-12 {{ $errors->has('long_description') ? ' has-error' : '' }}">
                <label>  وصف مطول <span class="text-danger">*</span>  </label>
                <textarea name="long_description" required id="editor1" class="form-control" placeholder=" وصف مطول ">{{ $Item->long_description }}</textarea>
                @if ($errors->has('long_description'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('long_description') }} </strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit" form="edit" class="btn btn-primary mr-2">تحديث</button>


    {!! Form::close() !!}
    <!--end::Form-->

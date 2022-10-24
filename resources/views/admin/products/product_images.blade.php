

        <button type="button" class="btn btn-success" id="add_btn" style="margin-bottom: 20px"> اضافه صور للمنتج </button>


        <!--begin::Form-->
        {!! Form::open(['url' => "admin_panel/add_product_images",'class' => 'add_slider toggle_form','role'=>'form','id'=>'add_item', 'files' => true,'method'=>'post']) !!}

        <input type="hidden" value="{{ $Item->id }}" name="product_id">

        <div class="row">

            <div class="col-lg-12 col-sm-12 {{ $errors->has('slider') ? ' has-error' : '' }}">
                <label>   صور المنتج (460*460) <span class="text-danger">*</span> </label>
                <div class="custom-file">
                    <input type="file" required class="custom-file-input" name="slider[]" multiple accept="image/*">
                    <label class="custom-file-label">  اختر صوره او اكثر  </label>
                </div>
                @if ($errors->has('slider'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('slider') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-lg-12">
                <button type="submit" form="add_item" class="btn btn-success" style="margin-left:0px;margin-bottom: 50px;">حفظ</button>
            </div>

        </div>

        {!! Form::close() !!}


        <!--begin: Datatable-->
        <table class="table table-bordered table-checkable" id="m_table_2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>  الصوره </th>
                    <th> الادوات </th>
                </tr>
            </thead>
            <tbody>

                @php $x = 1; @endphp

                @foreach($Item->product_images as $value)

                <tr>
                    <td> {{ $x }} </td>
                    <td>
                        <img src="{{ Custom_Image_Path('product_images',$value->slider) }}" style="width: 130px;height:100px;display: block;margin: auto;">
                    </td>
                    <td>
                        <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='Delete'>
                            <i class="fa fa-trash"></i>
                        </span>
                    </td>
                </tr>

                @php $x = $x + 1; @endphp
           @endforeach


            </tbody>
        </table>
        <!--end: Datatable-->

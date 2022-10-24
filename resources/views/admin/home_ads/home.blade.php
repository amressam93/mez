@extends('admin.layouts.master')

@section('top_title') الاعلانات  @endsection

@section('main_title') الاعلانات  @endsection


@section('header')
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6 ,
        .card-body .col-sm-4 , .card-body .col-sm-8 { margin-bottom: 20px }

        select.form-control {
            padding-top:0;
            padding-bottom: 0
        }
    </style>
@endsection


@section('content')

@include('flash-message')

<!-- Start Row -->
<div class="row">

   <div class="col-md-12">

      <!--begin::Card-->
      <div class="card card-custom gutter-b example example-compact">

         <div class="card-header">
            <h3 class="card-title">الاعلانات</h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/home_ads", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">

                    <!-- -------------------------------- Start V1 --------------------------- -->

                    <div class="col-sm-6 {{ $errors->has('title_v1') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان رقم 1  </label>

                        <input type="text" name="title_v1" class="form-control m-input"  value="{{ $Item->title_v1 }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title_v1'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title_v1') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('status1') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status1" id="status1" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status1 == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status1 == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status1'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status1') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('link1_v1') ? ' has-error' : '' }}">
                        <label>  الرابط  الاول اعلان 1  </label>

                        <input type="text" name="link1_v1" class="form-control m-input" value="{{ $Item->link1_v1 }}" placeholder=" الرابط  ">

                        @if ($errors->has('link1_v1'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link1_v1') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('link2_v1') ? ' has-error' : '' }}">
                        <label>  الرابط الثاني اعلان 1  </label>

                        <input type="text" name="link2_v1" class="form-control m-input" value="{{ $Item->link2_v1 }}" placeholder=" الرابط  ">

                        @if ($errors->has('link2_v1'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link2_v1') }} </strong>
                             </span>
                        @endif
                    </div>


                    <div class="col-sm-6 {{ $errors->has('pic1_v1') ? ' has-error' : '' }}">
                        <label>  صوره 1  اعلان 1  (640*400) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1_v1').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1_v1" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1_v1'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1_v1') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('pic2_v1') ? ' has-error' : '' }}">
                        <label>  صوره 2  اعلان 1 (640*400) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output2_v1').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic2_v1" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic2_v1'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic2_v1') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-sm-6">
                        <div class="card" style="width: 100%">
                            <img id="output1_v1"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic1_v1) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card" style="width: 100%">
                            <img id="output2_v1"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic2_v1) }}" class="card-img-top" alt="...">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <!-- -------------------------------------------------------------------- -->
                        <hr style="border-top: 2px dashed rgba(0, 0, 0, 0.1)">
                        <!-- -------------------------------------------------------------------- -->
                    </div>

                    <!-- -------------------------------- End V1 --------------------------- -->



                    <!-- -------------------------------- Start V2 --------------------------- -->

                    <div class="col-sm-6 {{ $errors->has('title_v2') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان رقم 2   </label>

                        <input type="text" name="title_v2" class="form-control m-input" value="{{ $Item->title_v2 }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title_v2'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title_v2') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('status2') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status2" id="status2" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status2 == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status2 == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status2'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status2') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('link1_v2') ? ' has-error' : '' }}">
                        <label>  الرابط  اعلان 2  </label>

                        <input type="text" name="link1_v2" class="form-control m-input" value="{{ $Item->link1_v2 }}" placeholder=" الرابط  ">

                        @if ($errors->has('link1_v2'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link1_v2') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('pic1_v2') ? ' has-error' : '' }}">
                        <label>  صوره  اعلان 2 (870*432) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1_v2').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1_v2" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1_v2'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1_v2') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-sm-12">
                        <div class="card" style="width: 100%">
                            <img id="output1_v2"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic1_v2) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <!-- -------------------------------------------------------------------- -->
                        <hr style="border-top: 2px dashed rgba(0, 0, 0, 0.1)">
                        <!-- -------------------------------------------------------------------- -->
                    </div>

                    <!-- -------------------------------- End V2 --------------------------- -->




                    <!-- -------------------------------- Start V3 --------------------------- -->

                    <div class="col-sm-6 {{ $errors->has('title_v3') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان رقم 3  </label>

                        <input type="text" name="title_v3" class="form-control m-input" value="{{ $Item->title_v3 }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title_v3'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title_v3') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('status3') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status3" id="status3" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status3 == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status3 == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status3'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status3') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('link1_v3') ? ' has-error' : '' }}">
                        <label>  الرابط  اعلان 3  </label>

                        <input type="text" name="link1_v3" class="form-control m-input" value="{{ $Item->link1_v3 }}" placeholder=" الرابط  ">

                        @if ($errors->has('link1_v3'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link1_v3') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('pic1_v3') ? ' has-error' : '' }}">
                        <label>  صوره  اعلان 3 (870*432) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1_v3').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1_v3" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1_v3'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1_v3') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-sm-12">
                        <div class="card" style="width: 100%">
                            <img id="output1_v3"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic1_v3) }}" class="card-img-top" alt="...">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <!-- -------------------------------------------------------------------- -->
                        <hr style="border-top: 2px dashed rgba(0, 0, 0, 0.1)">
                        <!-- -------------------------------------------------------------------- -->
                    </div>

                    <!-- -------------------------------- End V3 --------------------------- -->



                    <!-- -------------------------------- Start V5 --------------------------- -->

                    <div class="col-sm-6 {{ $errors->has('title_v5') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان رقم 5   </label>

                        <input type="text" name="title_v5" class="form-control m-input" value="{{ $Item->title_v5 }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title_v5'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title_v5') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('status5') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status5" id="status5" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status5 == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status5 == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status5'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status5') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('link1_v5') ? ' has-error' : '' }}">
                        <label>  الرابط  اعلان 5  </label>

                        <input type="text" name="link1_v5" class="form-control m-input" value="{{ $Item->link1_v5 }}" placeholder=" الرابط  ">

                        @if ($errors->has('link1_v5'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link1_v5') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('pic1_v5') ? ' has-error' : '' }}">
                        <label>  صوره  اعلان 5 (870*432) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1_v5').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1_v5" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1_v5'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1_v5') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-sm-12">
                        <div class="card" style="width: 100%">
                            <img id="output1_v5"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic1_v5) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <!-- -------------------------------------------------------------------- -->
                        <hr style="border-top: 2px dashed rgba(0, 0, 0, 0.1)">
                        <!-- -------------------------------------------------------------------- -->
                    </div>

                    <!-- -------------------------------- End V5 --------------------------- -->






                    <!-- -------------------------------- Start V4 --------------------------- -->

                    <div class="col-sm-6 {{ $errors->has('title_v4') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان رقم 4  </label>

                        <input type="text" name="title_v4" class="form-control m-input" value="{{ $Item->title_v4 }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title_v4'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title_v4') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('status4') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status4" id="status4" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status4 == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status4 == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status4'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status4') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('link1_v4') ? ' has-error' : '' }}">
                        <label>  الرابط الاول اعلان 4  </label>

                        <input type="text" name="link1_v4" class="form-control m-input" value="{{ $Item->link1_v4 }}" placeholder=" الرابط الاول ">

                        @if ($errors->has('link1_v4'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link1_v4') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('link2_v4') ? ' has-error' : '' }}">
                        <label>  الرابط الثاني اعلان 4  </label>

                        <input type="text" name="link2_v4" class="form-control m-input" value="{{ $Item->link2_v4 }}" placeholder=" الرابط الثاني ">

                        @if ($errors->has('link2_v4'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link2_v4') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('link3_v4') ? ' has-error' : '' }}">
                        <label>  الرابط الثالث اعلان 4  </label>

                        <input type="text" name="link3_v4" class="form-control m-input" value="{{ $Item->link3_v4 }}" placeholder=" الرابط الثالث ">

                        @if ($errors->has('link3_v4'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link3_v4') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('pic1_v4') ? ' has-error' : '' }}">
                        <label>  صوره 1 اعلان 4 (450*350) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1_v4').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1_v4" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1_v4'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1_v4') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('pic2_v4') ? ' has-error' : '' }}">
                        <label>  صورة 2 اعلان 4  (450*350)</label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output2_v4').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic2_v4" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic2_v4'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic2_v4') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('pic3_v4') ? ' has-error' : '' }}">
                        <label>  صورة 3 اعلان 4 (450*350) </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output3_v4').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic3_v4" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic3_v4'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic3_v4') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="col-sm-4">
                        <div class="card" style="width: 100%">
                            <img id="output1_v4"  src="{{ Custom_Image_Path('ads',$Item->pic1_v4) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card" style="width: 100%">
                            <img id="output2_v4" src="{{ Custom_Image_Path('ads',$Item->pic2_v4) }}" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card" style="width: 100%">
                            <img id="output3_v4" src="{{ Custom_Image_Path('ads',$Item->pic3_v4) }}" class="card-img-top" alt="...">
                        </div>
                    </div>


                    <!-- -------------------------------- End V4 --------------------------- -->





                </div>

            </div>

            <div class="card-footer">
               <button type="submit" form="add" class="btn btn-primary mr-2">حفظ</button>
            </div>

        {!! Form::close() !!}
         <!--end::Form-->


      </div>
      <!--end::Card-->

   </div>



</div>
<!-- End Row -->

@endsection




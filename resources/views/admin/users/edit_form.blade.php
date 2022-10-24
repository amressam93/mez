{!! Form::model($Item, [ 'route' => ['admin_panel.users.update' , $Item->id ] , 'method' => 'patch', 'files'=>true, 'role'=>'form','id'=>'edit', 'class'=> 'm-form m-form--fit m-form--label-align-left' ]) !!}
        
        {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $Item->id }}">
        
            <div class="form-group m-form__group row" style="margin-top: 30px">

                <div class="col-lg-6 col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>  الاسم  <span class="text-danger">*</span>  </label>
                    <input type="text" name="name" class="form-control m-input" required="required" value="{{ $Item->name }}" placeholder=" الاسم  ">
                    @if ($errors->has('name'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('name') }} </strong>
                         </span> 
                    @endif
                </div>

                

                <div class="col-lg-6 col-sm-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>  البريد الالكتروني  <span class="text-danger">*</span>   </label>
                    <input type="email" name="email" class="form-control m-input" required="required" value="{{ $Item->email }}" placeholder=" البريد الالكتروني  ">
                    @if ($errors->has('email'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('email') }} </strong>
                         </span> 
                    @endif
                </div>
                
                
                <div class="col-lg-6 col-sm-6 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label>  رقم الموبيل <span class="text-danger">*</span>   </label>
                    <input type="text" name="mobile" class="form-control m-input" required="required" value="{{ $Item->mobile }}" placeholder=" رقم الموبيل   ">
                    @if ($errors->has('mobile'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('mobile') }} </strong>
                         </span> 
                    @endif
                </div>

                <div class="col-md-6 col-sm-6 {{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label>  الجنس <span class="text-danger">*</span> </label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled selected="true">   اختر الجنس </option>
                        <option value="ذكر" @if($Item->gender == 'ذكر') {{ 'selected' }} @endif>  ذكر </option>
                        <option value="انثي" @if($Item->gender == 'انثي') {{ 'selected' }} @endif>  انثي </option>
                    </select>
                    @if ($errors->has('gender'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                    @endif
                </div>

                
                <div class="col-md-6 col-sm-6 {{ $errors->has('gov_id') ? ' has-error' : '' }}">
                    <label>  المحافظة <span class="text-danger">*</span> </label>
                    <select name="gov_id" id="gov_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                        <option value="" disabled selected="true">  اختر محافظه </option>
                        @foreach (H_Governorates() as $key => $value)
                            <option value="{{ $key }}" @if($Item->gov_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('gov_id'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('gov_id') }}</strong>
                    </span>
                    @endif
                </div>


                @php
                    $cities = App\Models\Cities::where('status',1)->where('governorate_id',$Item->gov_id)->pluck('name','id')
                @endphp

                <div class="col-md-6 col-sm-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
                    <label>  المدينة <span class="text-danger">*</span> </label>
                    <select name="city_id" id="city_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                        <option value="" disabled selected="true">  اختر مدينة </option>
                        @if($cities != null)
                              @foreach ($cities as $key => $value)
                                 <option value="{{ $key }}" @if($Item->city_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                              @endforeach
                        @endif
                    </select>
                    @if ($errors->has('city_id'))
                    <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('city_id') }}</strong>
                    </span>
                    @endif
                </div>



                @if($Item->type == 1)
                <div class="col-lg-6 col-sm-6  {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label> كلمه المرور   </label>
                    <input type="text" name="password" class="form-control m-input" value="" placeholder="  كلمه المرور ">
                    @if ($errors->has('password'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('password') }} </strong>
                         </span> 
                    @endif
                </div>
                @endif
    

                <div class="col-lg-12">
                    <button type="submit" form="edit" class="btn btn-success" style="margin-top:20px;margin-bottom: 50px;">تحديث</button>
                </div>
              
            </div>

            
        {!! Form::close() !!}



<div class="row justify-content-center all_reviews3"  style="margin:0 auto">

    <div class="col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">

        @php
            $all_reviews = App\Models\Review::where('product_id',$Item->id)->orderBy('id','desc')->get();
        @endphp

        <div id="comment_container" style="margin-top: 25px">

            <!-- Fluid width widget -->
            <div class="panel panel-default">

                <div class="panel-body">
                    <ul class="media-list">


                        @if($all_reviews->count() > 0)

                            @foreach ($all_reviews as $item)

                                @php
                                    $user = App\Models\Users::where('id',$item->user_id)->first();
                                @endphp

                                <li class="media" style="margin-bottom: 30px;display: flex;padding-right: 15px;">

                                    <div style="display: inline-block">
                                        <img src="{{asset('img/60x60.png')}}" style="border-radius: 50%;height:50px;width:50px;margin-left: 15px;">
                                    </div>

                                    <div class="media-body" style="display: inline-block;width:95%">
                                        <h4 class="media-heading">
                                            <span>{{ $user != null ? $user->name : '' }}</span>

                                            @if(Auth::guard('user')->check())

                                                @php $auth_user = Auth::guard('user')->user(); @endphp

                                                @if($auth_user->id == $item->user_id)
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit_review"  class="btn btn-primary btn-xs" title="Edit" style="padding:0px;border: 0;display: inline-block; margin-left: 8px;background:transparent">
                                                    <i class="fa fa-pencil" style="color: #3699FF;font-size:20px" aria-hidden="true"></i>
                                                </button>
                                                @endif

                                            @endif

                                            <span style="float: left;margin-left: 20px;font-size: 16px;">
                                                {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                                            </span>
                                        </h4>

                                        @if(Auth::guard('user')->check())
                                            @php $auth_user = Auth::guard('user')->user(); @endphp
                                            @if($auth_user->id != $item->user_id)
                                            <div class="pull-left reply" style="margin-left: 20px">
                                                <button class="add_reply" style="background: transparent;border:0;color: blue;font-weight: bold;">
                                                    رد
                                                </button>
                                            </div>
                                            @endif
                                        @endif

                                        <div class="users_rating" style="border: 0">
                                            @for($y = 1;$y <= 5;$y++ )
                                                <i class="fa fa-star @if($y <= $item->rate) {{ 'active_start' }} @else {{ 'un_active_start' }} @endif" style="font-size:1.25em !important" aria-hidden="true"></i>
                                            @endfor
                                        </div>

                                        @php
                                            $review_comments = App\Models\Review_Comments::where('review_id',$item->id)->get();
                                        @endphp

                                        <p style="max-width: 98%;margin: 0;{{ $review_comments->count() > 0 ? 'margin-bottom: 25px;' : '' }}">
                                            {{ $item->notes }}
                                        </p>

                                        @if($review_comments->count() > 0)

                                            @foreach ($review_comments as $inner_comment)

                                                @php
                                                    $user_comment = App\Models\Users::where('id',$inner_comment->user_id)->first();
                                                @endphp

                                                <div class="clearfix"></div>

                                                <div class="media" style="margin-bottom: 30px;display: flex;padding-right: 15px;">

                                                    <div class="" style="display: inline-block">
                                                        <img src="{{asset('img/60x60.png')}}" style="border-radius: 50%;height:50px;width:50px;margin-left: 15px;">
                                                    </div>
                                                    <div class="media-body" style="display: inline-block;width:95%">
                                                        <h5 class="mt-0">
                                                            <span>{{ $user_comment != null ? $user_comment->name : '' }}</span>
                                                            <span style="float: left;margin-left: 20px;font-size: 16px;">
                                                                {{ Carbon\Carbon::parse($inner_comment->created_at)->format('Y-m-d') }}
                                                            </span>
                                                        </h5>
                                                        <p style="width: 98%;margin:0">
                                                            {{ $inner_comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>

                                            @endforeach

                                        @endif


                                        {{-- add inner comment --}}
                                        @if(Auth::guard('user')->check())
                                            <div class="inner_comment inner_comment2" style="width: 100%;margin-top: 10px;">
                                                <input type="hidden" name="product_id" value="{{ $Item->id }}">
                                                <input type="hidden" name="review_id" value="{{ $item->id }}">
                                                <input type="text" placeholder="اضف رد" name="comment" value="{{ old('comment') }}" style="width: 80%;display:inline-block" required class="form-control">
                                                <button type="button" class="btn btn-primary add_new_comment add_new_comment2">
                                                    أرسال
                                                </button>
                                            </div>
                                        @endif

                                    </div>
                                </li>

                            @endforeach

                        @else

                            @if($reviews_count == 0)
                                <b style="padding: 20px;display:block;padding-top:0"> عفوا لا يوجد تقيمات بعد</b>
                            @endif

                        @endif


                        {{-- end reviews --}}




                    </ul>
                </div>
            </div>
            <!-- End fluid width widget -->

        </div>

    </div>

</div>



<script>
    (function($){

        $('.add_reply').click(function() {

            $(this).parent().siblings('.inner_comment').toggle();
        });

       $(".add_new_comment1,.add_new_comment2").click(function () {

            var comment = $(this).siblings("input[name=comment]").val();
            var product_id = $(this).siblings("input[name=product_id]").val();
            var review_id = $(this).siblings("input[name=review_id]").val();

            if(comment != null && product_id != null && review_id != null) {

                $.ajax({
                    url: '{{ url('add_reply') }}',
                    method: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        comment : comment,
                        product_id:product_id,
                        review_id:review_id,
                    },
                    dataType: "json",
                    success: function (response) {

                        $("#all_reviews2").html(response.data);

                    }
                });

            } else {

                swal({
                    title: "",
                    text: 'برجاء كتابة تعليق',
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "موافق",
                 });
            }


       });


    })(jQuery);
</script>

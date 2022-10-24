<span>
    @for($a = 1;$a <= 5;$a++ )
        @if($a <= $calc_rev)
            <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
        @else
            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
        @endif
    @endfor
</span>
&nbsp;
<span>
    ({{ $reviews_count }}) تقيم
</span>

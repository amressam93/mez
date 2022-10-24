


<div class="custom-col">
    <div class="single-product">
        <div class="product-img">
            <a href="{{ url($item->url) }}">
                <img src="{{ Custom_Image_Path('products',$item->pic) }}" style="width: 100%" alt="" />
                @if($item->discount > 0)
                <span class="new-box" style="background: #000;left: 5%;top: auto;bottom: 5%;">
                    {{ $item->discount }} %
                </span>
                @endif
            </a>
        </div>
        <div class="product-content">

            <p style="margin-bottom: 0;font-weight:bold">
                {{ $item->brand }}
            </p>
            <h5 class="product-name">
                <a href="{{ url($item->url) }}" style="font-weight:normal">
                    {{ $item->title }}
                </a>
            </h5>

            <div class="product-price">
                <h2>
                    @if($item->discount > 0)
                        {{ $item->price }} ج.م
                        <del> {{ $item->price_before_discount }} ج.م </del>
                    @else
                    {{ $item->price }} ج.م
                    @endif
                </h2>
            </div>

        </div>
    </div>
</div>

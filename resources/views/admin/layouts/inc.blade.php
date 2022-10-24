<!--begin::Menu Container-->
<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

     <!--begin::Menu Nav-->
     <ul class="menu-nav">

          <li class="menu-item   @if(count(Request::segments()) == 1)  menu-item-active @endif" aria-haspopup="true">
               <a href="{{ url('admin_panel') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-tachometer-alt"></i>
                    </span>
                    <span class="menu-text">لوحه التحكم </span>
               </a>
          </li>


          <li class="menu-item {{ request()->is('admin_panel/admin*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/admin') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-users"></i>
                    </span>
                    <span class="menu-text">أداره الموقع</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/setting*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/setting') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-cogs"></i>
                    </span>
                    <span class="menu-text">الاعدادات</span>
               </a>
          </li>

          @php
               $count = App\Models\Invoice::where('status','جاري المراجعه')->count();
          @endphp

          <li class="menu-item {{ request()->is('admin_panel/invoices*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/invoices') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-file-invoice-dollar"></i>
                    </span>
                    <span class="menu-text">الطلبات</span>
                    <span class="m-menu__link-badge">
                         <span class="m-badge m-badge--danger">{{$count}}</span>
                    </span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/users*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/users') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-user"></i>
                    </span>
                    <span class="menu-text">أعضاء الموقع</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/main_categories*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/main_categories') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon flaticon-line-graph"></i>
                    </span>
                    <span class="menu-text">الاقسام الرئيسية</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/sub_categories*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/sub_categories') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon flaticon-line-graph"></i>
                    </span>
                    <span class="menu-text">الاقسام الفرعية</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/size*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/size') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-sitemap"></i>
                    </span>
                    <span class="menu-text">المقاسات</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/color*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/color') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-brush"></i>
                    </span>
                    <span class="menu-text">الألوان</span>
               </a>
          </li>



          <li class="menu-item {{ request()->is('admin_panel/products*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/products') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fab fa-product-hunt"></i>
                    </span>
                    <span class="menu-text">المنتجات</span>
               </a>
          </li>



            <li class="menu-item {{ request()->is('admin_panel/top_header*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ url('admin_panel/top_header') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="m-menu__link-icon fas fa-ad"></i>
                    </span>
                    <span class="menu-text"> الهيدر العلوي </span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('admin_panel/top_offer*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ url('admin_panel/top_offer') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="m-menu__link-icon fas fa-ad"></i>
                    </span>
                    <span class="menu-text"> العرض العلوي </span>
                </a>
            </li>

          <li class="menu-item {{ request()->is('admin_panel/home_ads*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/home_ads') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-ad"></i>
                    </span>
                    <span class="menu-text"> الاعلانات الرئيسية </span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/home_products*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
            <a href="{{ url('admin_panel/home_products') }}" class="menu-link">
                 <span class="svg-icon menu-icon">
                      <i class="m-menu__link-icon fas fa-ad"></i>
                 </span>
                 <span class="menu-text"> المنتجات الرئيسية </span>
            </a>
       </li>

          <li class="menu-item {{ request()->is('admin_panel/categories_ads*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
            <a href="{{ url('admin_panel/categories_ads') }}" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="m-menu__link-icon fas fa-ad"></i>
                </span>
                <span class="menu-text"> اعلانات الاقسام </span>
            </a>
        </li>





          <li class="menu-item {{ request()->is('admin_panel/coupon*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/coupon') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-tags"></i>
                    </span>
                    <span class="menu-text"> قسائم الخصم </span>
               </a>
          </li>


          <li class="menu-item {{ request()->is('admin_panel/governorates*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/governorates') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-location-arrow"></i>
                    </span>
                    <span class="menu-text">المحافظات</span>
               </a>
          </li>

          <li class="menu-item {{ request()->is('admin_panel/cities*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/cities') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-city"></i>
                    </span>
                    <span class="menu-text">المدن</span>
               </a>
          </li>




          <li class="menu-item {{ request()->is('admin_panel/slider*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/slider') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-sliders-h"></i>
                    </span>
                    <span class="menu-text"> الاسليدر </span>
               </a>
          </li>


          <li class="menu-item {{ request()->is('admin_panel/footer*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/footer') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-edit"></i>
                    </span>
                    <span class="menu-text"> المميزات </span>
               </a>
          </li>


          <li class="menu-item {{ request()->is('admin_panel/pages*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
            <a href="{{ url('admin_panel/pages') }}" class="menu-link">
                 <span class="svg-icon menu-icon">
                      <i class="m-menu__link-icon far fa-address-card"></i>
                 </span>
                 <span class="menu-text">
                     الصفحات
                 </span>
            </a>
       </li>


          <li class="menu-item {{ request()->is('admin_panel/about_us*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/about_us') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon far fa-address-card"></i>
                    </span>
                    <span class="menu-text">من نحن</span>
               </a>
          </li>



          <li class="menu-item {{ request()->is('admin_panel/privacy*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/privacy') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-user-secret"></i>
                    </span>
                    <span class="menu-text">سياسة الاستخدام</span>
               </a>
          </li>


          <li class="menu-item {{ request()->is('admin_panel/messages*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
               <a href="{{ url('admin_panel/messages') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                         <i class="m-menu__link-icon fas fa-sms"></i>
                    </span>
                    <span class="menu-text">الرسائل</span>
               </a>
          </li>




     </ul>
     <!--end::Menu Nav-->
</div>
<!--end::Menu Container-->



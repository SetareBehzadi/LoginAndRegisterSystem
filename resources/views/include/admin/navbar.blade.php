<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                       {{--    <div style="margin: 0 auto;width:70px; height: 70px; background-size: cover; border-radius: 50px;{{(Auth::user()['userImage'])?"background-image: url('/uploads/usersImage/".Auth::user()['userImage']."');":"background-image: url('/img/admin/userImg.jpg');"}}; "></div>--}}
                           <div style="margin: 0 auto;width:70px; height: 70px; background-size: cover; border-radius: 50px;background-image: url('/img/admin/userImg.jpg');></div>



                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                   {{--         <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{ Auth::user()['fName'].' '.Auth::user()['lName']}}</strong>
                             </span>--}}
                                    <span class="clear"> <span class="block m-t-xs"> <strong
                                                class="font-bold">مازیار</strong>
                             </span>
                                <span class="text-muted text-xs block"> <b class="caret"></b></span>
                            </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">پروفایل</a></li>
                        <li class="divider"></li>
                        <li><a href="">خروج</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <a href="">
                        <div style="width:70px; height: 70px; background-size: cover; border-radius: 50px;background-image: url('/img/admin/userImg.jpg') "></div>
                    </a>
                </div>
            </li>


            <li >
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span class="nav-label">اطلاع رسانی</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li ><a
                            href="{{route('notification.form.email')}}">
                            <span class="nav-label">ارسال ایمیل</span>
                        </a></li>
                    <li>
                        <a href="">
                            <span class="nav-label">ارسال پیامک</span>
                        </a>
                    </li>



                </ul>
            </li>


            <li >
                <a href="#">
                    <i class="fa  fa-cutlery"></i>
                    <span class="nav-label">کسب و کار</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li '*restaurants') !!}  class="operator_list">
                        <a href="">
                            <span class="nav-label">لیست کسب و کار ها</span>
                        </a>
                    </li>

                    <li '*add-restaurant') !!} class="operator_add"><a
                                href="">
                            <span class="nav-label">تعریف کسب و کار</span>
                        </a></li>

                </ul>
            </li>


            <li>
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span class="nav-label">پکیج</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li  >
                        <a href="">
                            <span class="nav-label">لیست پکیج ها</span>
                        </a>
                    </li>

                    <li '*add-package') !!} ><a
                                href="">
                            <span class="nav-label">تعریف پکیج</span>
                        </a></li>

                </ul>
            </li>




            <li '*operators') !!} '*add-operator') !!} '*edit-operator*') !!}>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">اپراتور</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li '*operators') !!}  class="operator_list">
                        <a href="">
                            <span class="nav-label">لیست اپراتور ها</span>
                        </a>
                    </li>

                    <li '*add-operator') !!} class="operator_add"><a
                                href="">
                            <span class="nav-label">تعریف اپراتور</span>
                        </a></li>

                </ul>
            </li>

            <li '*customers') !!} '*add-customer') !!} '*edit-customer*') !!}>
                <a href="#">
                    <i class="fa fa-male"></i>
                    <span class="nav-label">مشتری</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li '*customers') !!}  class="customer_list">
                        <a href="">
                            <span class="nav-label">لیست مشتری ها</span>
                        </a>
                    </li>

                    <li '*add-customer') !!} class="customer_add"><a
                                href="">
                            <span class="nav-label">تعریف مشتری</span>
                        </a></li>

                </ul>
            </li>

            <li '*orders*') !!} '*show-order*') !!} '*order-comments') !!}>
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span class="nav-label">سفارشات</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li '*orders') !!} '*orders*') !!}  >
                        <a href="">
                            <span class="nav-label">لیست سفارشات</span>
                        </a>
                    </li>

                    <li '*order-comments') !!} ><a
                                href="">
                            <span class="nav-label">نظرات</span>
                        </a></li>

                </ul>
            </li>

            <li '*transactions*') !!}'*/restaurants-transactions') !!}'*/customers-transactions') !!} >
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span class="nav-label">مالی</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li '*/restaurants-transactions') !!}  >
                        <a href="">
                            <span class="nav-label">تراکنش کسب و کارها</span>
                        </a>
                    </li>

                    <li '*/customers-transactions') !!} >
                        <a href="">
                            <span class="nav-label">تراکنش مشتریان</span>
                        </a>
                    </li>


                </ul>
            </li>



            <li '*problems/customer') !!} '*problems/restaurant') !!}>
                <a href="#">
                    <i class="fa  fa-commenting-o"></i>
                    <span class="nav-label">سوالات و مشکلات</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse restaurants_sub">
                    <li  '*problems/customer') !!}>
                        <a href="">
                            <i aria-hidden="true"></i>
                            سوالات و مشکلات مشتریان
                        </a>
                    </li>

                    <li  '*problems/restaurant') !!}>
                        <a href="">
                            <i ></i>
                            سوالات و مشکلات کسب و کار
                        </a>
                    </li>

                </ul>
            </li>


            <li  '*business/request') !!}>
                <a href="">
                    <i class="fa fa-handshake-o"></i>
                     درخواست همکاری
                </a>
            </li>


            <li   '*edit-faq/*') !!} '*edit-faq-category*') !!}  '*content*') !!} '*settings') !!} '*business-opinion*') !!} '*faq-categories') !!} '*add-faq-category') !!}'*faq') !!} '*add-faq') !!}>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">تنظیمات سایت</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li   '*edit-faq/*') !!}  '*faq-categories') !!} '*add-faq-category') !!}'*faq') !!} '*add-faq') !!} '*edit-faq-category*') !!}>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">سوالات متداول  </span><span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li  '*faq-categories') !!} '*add-faq-category') !!} '*edit-faq-category*') !!}>
                                <a href="#">
                                    <i></i>
                                    <span class="nav-label"> دسته بندی سوالات </span>
                                    <span class="fa arrow"></span> </a>
                                <ul class="nav nav-third-level">
                                    <li  '*faq-categories') !!} '*edit-faq-category*') !!}>
                                        <a href="">لیست دسته بندی ها</a>
                                    </li>
                                    <li '*add-faq-category') !!}>
                                        <a href="">تعریف دسته بندی</a>
                                    </li>


                                </ul>
                            </li>
                            <li '*faq') !!} '*add-faq') !!} '*edit-faq/*') !!}>
                                <a href="#">
                                    <i></i>
                                    <span class="nav-label"> جزئیات سوال </span>
                                    <span class="fa arrow"></span> </a>
                                <ul class="nav nav-third-level">
                                    <li  '*/faq') !!}  '*edit-faq/*') !!}>
                                        <a href="">لیست سوالات </a>
                                    </li>
                                    <li  '*add-faq') !!}>
                                        <a href="">تعریف سوال </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li  '*/news-letter') !!}>
                        <a href="">
                            <i class="fa fa-handshake-o"></i>
                            لیست اعضا خبرنامه
                        </a>
                    </li>

                    <li  '*content*') !!}>
                        <a href="">
                            <i class="fa fa-language"></i> لیست متون صفحات
                        </a>
                    </li>
                    <li  '*business-opinion*') !!}>
                        <a href="">
                            <i class="fa fa-language"></i> نظرات کسب و کار
                        </a>
                    </li>
                    <li  '*settings') !!}>
                        <a href="">
                            <i class="fa fa-address-book"></i>
                            اطلاعات سایت
                        </a>
                    </li>
                </ul>
            </li>


        </ul>

    </div>
</nav>

 <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
     <section class="sidebar">
         <div class="my-3 mx-4 text-center ">
             <a href="">
                 <img src="{{ asset('admin/img/logo.svg') }}" class="hide-on-collapse" alt="SkyFreight">
                 <img src="{{ asset('admin/img/closed-menu.png') }}" class="show-on-collapse" alt="SkyFreight">
             </a>
         </div>
         <ul class="sidebar-menu">
             <li class="header"><strong>MAIN NAVIGATION</strong></li>
             <li>
                 <a href="{{route('admin.home')}}">
                     <span class="d-inline-block">
                         <i class="icon icon-dashboard2"></i>
                     </span>
                     Dashboard
                 </a>
             </li>
             <li class="treeview">
                <a href="#">
                    <span class="d-inline-block">
                        <i class="icon icon-change_history s-18"></i>
                    </span>
                    User Management
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{route('admin.user')}}">
                            <span class="d-inline-block">
                                <i class="icon icon-list4"></i>
                            </span>
                            All Users
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.user.add')}}">
                            <span class="d-inline-block">
                                <i class="icon icon-add"></i>
                            </span>
                            Add User
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="treeview">
                <a href="#">
                    <span class="d-inline-block">
                        <i class="icon icon-change_history s-18"></i>
                    </span>
                    Artist Management
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{route('admin.artist.request')}}">
                            <span class="d-inline-block">
                                <i class="icon icon-list4"></i>
                            </span>
                            Requests
                        </a>
                    </li>
                </ul>
            </li> --}}
             <li class="treeview">
                 <a href="#">
                     <span class="d-inline-block">
                         <i class="icon icon-change_history s-18"></i>
                     </span>
                     Artwork Management
                     <i class="icon icon-angle-left s-18 pull-right"></i>
                 </a>
                 <ul class="treeview-menu" style="display: none;">
                     <li>
                         <a href="{{ route('admin.artwork') }}">
                             <span class="d-inline-block">
                                 <i class="icon icon-list4"></i>
                             </span>
                             All Artworks
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="treeview">
                <a href="#">
                    <span class="d-inline-block">
                        <i class="icon icon-change_history s-18"></i>
                    </span>
                    Order Management
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{ route('admin.order.all') }}">
                            <span class="d-inline-block">
                                <i class="icon icon-list4"></i>
                            </span>
                            All Orders
                        </a>
                    </li>
                </ul>
            </li>
             <li class="treeview">
                 <a href="#">
                     <span class="d-inline-block">
                         <i class="icon icon-change_history s-18"></i>
                     </span>
                     Categories Management
                     <i class="icon icon-angle-left s-18 pull-right"></i>
                 </a>
                 <ul class="treeview-menu" style="display: none;">
                     <li>
                         <a href="{{route('admin.category')}}">
                             <span class="d-inline-block">
                                 <i class="icon icon-list4"></i>
                             </span>
                             All Categories
                         </a>
                     </li>
                     <li>
                         <a href="">
                             <span class="d-inline-block">
                                 <i class="icon icon-add"></i>
                             </span>
                             Add Category
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="treeview">
                 <a href="#">
                     <span class="d-inline-block">
                         <i class="icon icon-change_history s-18"></i>
                     </span>
                     Blog Management
                     <i class="icon icon-angle-left s-18 pull-right"></i>
                 </a>
                 <ul class="treeview-menu" style="display: none;">
                     <li>
                         <a href="{{route('admin.blog')}}">
                             <span class="d-inline-block">
                                 <i class="icon icon-list4"></i>
                             </span>
                             All Blogs
                         </a>
                     </li>
                     <li>
                         <a href="{{route('admin.blog.add')}}">
                             <span class="d-inline-block">
                                 <i class="icon icon-add"></i>
                             </span>
                             Add Blogs
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="treeview">
                <a href="#">
                    <span class="d-inline-block">
                        <i class="icon icon-gears s-18"></i>
                    </span>
                    Contacts
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{route('admin.contact')}}">
                            <span class="d-inline-block">
                                <i class="icon icon-settings2"></i>
                            </span>
                            User Feedbacks
                        </a>
                    </li>
                </ul>
            </li>
             <li class="treeview">
                 <a href="#">
                     <span class="d-inline-block">
                         <i class="icon icon-gears s-18"></i>
                     </span>
                     Settings
                     <i class="icon icon-angle-left s-18 pull-right"></i>
                 </a>
                 <ul class="treeview-menu" style="display: none;">
                         <li>
                             <a href="">
                                 <span class="d-inline-block">
                                     <i class="icon icon-settings2"></i>
                                 </span>
                                 General Settings
                             </a>
                         </li>
                 </ul>
             </li>
         </ul>
         </ul>
     </section>
 </aside>

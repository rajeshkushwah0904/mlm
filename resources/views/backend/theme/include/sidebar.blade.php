 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{asset('backendtheme/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Rightway Future</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{asset('backendtheme/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 @if(\Auth::user()->role==1)
                 <a href="#" class="d-block">{{\Auth::user()->name}}</a>
                 @else
                 <a href="#" class="d-block">{{\Auth::user()->distributor_tracking_id}}</a>
                 @endif
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Profile
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.distributors.list',\Auth::user()->distributor_id)}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Distributor
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.packages.index')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Package
                         </p>
                     </a>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Kyc
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('backend.kycs.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kyc List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.kycs.create')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kyc</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Income
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('backend.incomes.direct_income')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Direct Income</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Repurchase Income</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Website Content
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('backend.categories.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.subcategories.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sub Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.products.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Product</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.pins.index')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Pin
                         </p>
                     </a>
                 </li>
                 <ul class="nav nav-treeview">
                     <li class="nav-item">
                         <a href="{{route('backend.categories.index')}}" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Category</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('backend.subcategories.index')}}" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Sub Category</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('backend.products.index')}}" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Product</p>
                         </a>
                     </li>

                 </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-circle"></i>
                         <p>
                             Ecommerce
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <?php
                    $categories = \App\Category::all();
                     ?>
                     <ul class="nav nav-treeview">
                         @foreach($categories as $category)
                         <li class="nav-item has-treeview">
                             <a href="{{route('backend.categories.product_list',$category->id)}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     {{$category->name}}
                                     <i class="right fas fa-angle-left"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 @foreach($category->subcategories as $subcategory)
                                 <li class="nav-item">
                                     <a href="{{route('backend.subcategories.product_list',$subcategory->id)}}"
                                         class="nav-link">
                                         <i class="far fa-dot-circle nav-icon"></i>
                                         <p>{{$subcategory->name}}</p>
                                     </a>
                                 </li>
                                 @endforeach
                             </ul>
                         </li>
                         @endforeach
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{route('home')}}" class="brand-link">
         <img src="{{asset('logo.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
         <br>
         <span class="brand-text font-weight-light"></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <?php
$distributor = \App\Distributor::where('distributor_tracking_id', \Auth::user()->distributor_tracking_id)->first();
?>
                 @if($distributor->profile_image)
                 <img src="{{asset($distributor->profile_image)}}" class="img-circle elevation-2" alt="User Image">
                 @else
                 <img src="{{asset('backendtheme/distributor_icon.png')}}" class="img-circle elevation-2"
                     alt="User Image">
                 @endif
             </div>
             <div class="info">
                 @if(\Auth::user()->role==1)
                 <a href="#" class="d-block">{{\Auth::user()->name}}</a>
                 @else
                 <a href="#" class="d-block" style="margin-top: -10px">{{$distributor->name}}</a>
                 <a href="#" class="d-block">{{$distributor->distributor_tracking_id}}</a>
                 @endif
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 @if(\Auth::user()->role==1)
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('backend.dashboard')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Admin Dashboard</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.distributor.dashboard')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Distributor Dashboard</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.profile')}}#" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Profile
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.distributors.list')}}" class="nav-link">
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
                             KYC
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('backend.kycs.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.kycs.update')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Update KYC</p>
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
                 @endif
                 @if(\Auth::user()->role==3)
                 <li class="nav-item">
                     <a href="{{route('backend.distributor.dashboard')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.profile')}}#" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Profile
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{route('backend.kycs.update')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             KYC
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('backend.packages.purchase_package')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Package
                         </p>
                     </a>
                 </li>
                 @endif

                 <li class="nav-item">
                     <a href="{{route('backend.genealogy_tree')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Genealogy Tree
                         </p>
                     </a>
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
                             <a href="{{route('backend.incomes.repurchase_income')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Repurchase Income</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('backend.incomes.reward_income')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Reward Income</p>
                             </a>
                         </li>
                     </ul>
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
                 <li class="nav-item">
                     <a href="{{route('logout')}}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
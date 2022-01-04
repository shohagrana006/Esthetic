
@auth



<aside class="main-sidebar elevation-4" style="background: #232b55;">
    <ul style="padding: 0; margin: 0;">
        <li class="nav-item">
            <a class="nav-link collaps-btn" id="sidebar-open" onclick="extendNav()" data-widget="pushmenu" href="#"
                role="button" style="display: none;">
                <i class="fas fa-align-right"></i>
            </a>
        </li>
    </ul>
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ asset('public') }}/admin/img/AestheticPOS.png" alt="" style="width: 100%; margin-top: -5.5%;" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ url('home') }}" class="nav-link {{Route::is('home') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{Route::is('supplier.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Supplier
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('supplier.index') }}" class="nav-link {{Route::is('supplier.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.create') }}" class="nav-link  {{Route::is('supplier.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{Route::is('brand.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Brand
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link {{Route::is('brand.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.create') }}" class="nav-link {{Route::is('brand.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{Route::is('branch.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Branch
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link {{Route::is('branch.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Branch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('branch.create') }}" class="nav-link {{Route::is('branch.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Branch</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Unit
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('unit.index') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>
                                    Unit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unit.create') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>
                                    Add Unit
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Warehouse
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('warehouse.index') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Warehouse</p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="{{ route('warehouse.create') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Warehouse</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Sub Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{ route('subcategory.index') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategory.create') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.create') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{Route::is('purchage.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-luggage-cart"></i>
                        <p>
                            Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('purchage.index') }}" class="nav-link {{Route::is('purchage.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchage.create') }}" class="nav-link {{Route::is('purchage.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchage.pending') }}" class="nav-link {{Route::is('purchage.pending') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Pending Purchase</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-badge-percent"></i>
                        <p>
                            Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sale') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('addsale') }}" class="nav-link">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Sales</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Business
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bussiness.index') }}" class="nav-link {{Route::is('bussiness.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Business</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bussiness.create') }}" class="nav-link {{Route::is('bussiness.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Business</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{Route::is('expense.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Expenses
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('expense.index') }}" class="nav-link  {{Route::is('expense.index') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('expense.create') }}" class="nav-link  {{Route::is('expense.create') ? 'active' : ''}}">
                                <i class="sub-nav fas fa-chevron-right"></i>
                                <p>Add Expenses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item menu-open">
                 <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
                 class="nav-link {{Route::is('logout') ? 'active' : ''}}">
                 <i class="nav-icon fas fa-tachometer-alt"></i>

                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-cloud-upload-alt"></i>
                        <p>Backup</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endauth

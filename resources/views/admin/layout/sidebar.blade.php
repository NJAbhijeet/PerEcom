<aside class="app-sidebar toggle-sidebar">
    <?php
    $admin = App\Models\Admin::first();
    ?>
    <div class="app-sidebar__user">
        <div class="user-body">
            <img src="{{ asset('storage/admin/' . $admin->image) }}" alt="profile-user" class="rounded-circle w-25">
        </div>
        <div class="user-info">
            <a href="#" class=""><span class="app-sidebar__user-name font-weight-semibold"> Admin</span><br>
                <span class="text-muted app-sidebar__user-designation text-sm"> {{ $admin->name }}</span>
            </a>
        </div>
    </div>
    <ul class="side-menu toggle-menu">
        <li>
            <a class="side-menu__item" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-home"></i>
                <span class="side-menu__label"> Dashboard </span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="side-menu__label">Admin Profile </span>
                <i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('dashboard.adminprofile') }}"><span>Admin Profile</span></a>
                </li>
            </ul>
        </li>

       

        <li>
            <a class="side-menu__item" href="{{ route('unit-index') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label"> Unit </span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('product-index') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label"> Product </span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('category-index') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label"> Category </span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.vendors') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label"> Vendor </span></a>
        </li>


        <li>
            <a class="side-menu__item" href="{{ route('logout') }}">
                <i class="side-menu__icon fa fa-sign-out " aria-hidden="true"></i>
                <span class="side-menu__label"> Logout </span>
            </a>
        </li>
    </ul>
</aside>

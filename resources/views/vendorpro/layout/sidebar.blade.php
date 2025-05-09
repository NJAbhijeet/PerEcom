<aside class="app-sidebar toggle-sidebar">
    <?php
    $vendors = App\Models\Vendor::first();
    ?>
    <div class="app-sidebar__user">
        <div class="user-body">
            <img src="{{ asset('storage/vendor/' . $vendors->image) }}" alt="profile-user" class="rounded-circle w-25">
        </div>
        <div class="user-info">
            <a href="#" class=""><span class="app-sidebar__user-name font-weight-semibold"> Vendor</span><br>
                <span class="text-muted app-sidebar__user-designation text-sm"> {{ $vendors->name }}</span>
            </a>
        </div>
    </div>

    <ul class="side-menu toggle-menu">
        <li>
            <a class="side-menu__item" href="{{ route('vendordashboard') }}"><i class="side-menu__icon fe fe-home"></i>
                <span class="side-menu__label"> Vendor Dashboard </span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="side-menu__label">Vendor Profile </span>
                <i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('dashboard.vendorprofile') }}"><span>Vendor Profile</span></a>
                </li>
            </ul>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('vendor-product-index') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label">Vendor Product </span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('vendorlogout') }}"><i
                    class="side-menu__icon fa fa-facebook-official"></i>
                <span class="side-menu__label">Vendor Logout </span></a>
        </li>
    </ul>
</aside>

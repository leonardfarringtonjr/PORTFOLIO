<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Dropdown</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="">test</a></li>

                </ul>
            </li> --}}
            <li class="menu-header">Sections</li>

            {{-- SIDEBAR LINKS --}}
            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Hero Image</span></a></li> --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Image</a></li>
                    <li><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Typer Title</a></li>
                </ul>
            </li>

            {{-- SERVICES --}}
            <li class="nav-item">
                <a href="{{route('admin.service-item.index')}}" class="nav-link"><i class="fas fa-columns"></i><span>Services</span></a>
            </li>

            {{-- ABOUT --}}
            <li class="nav-item active">
                <a href="{{ route('admin.about.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>About</span></a>
            </li>

            {{-- PORTFOLIO --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Item</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section Setting</a></li>
                </ul>
            </li>

            {{-- EXPERIENCE --}}
            <li class="nav-item">
                <a href="{{route('admin.experience.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Experience</span></a>
            </li>

            {{-- FEEDBACK --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Item</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section Setting</a></li>
                </ul>
            </li>

            {{-- BLOG --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Blog Categories</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-list.index') }}">Blog List</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Blog Settings</a></li>
                </ul>
            </li>

            {{-- CONTACT --}}
            <li class="nav-item">
                <a href="{{route('admin.experience.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Contact</span></a>
            </li>

            {{-- FOOTER --}}
            <li class="nav-item">
                <a href="{{route('admin.experience.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Footer</span></a>
            </li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li><a class="nav-link" href="features-post-create.html"><i class="far fa-square"></i> <span>Form
                        Page</span></a></li>

            <li><a class="nav-link" href="features-profile.html"><i class="far fa-square"></i> <span>Profile</span></a>
            </li>

            <li><a class="nav-link" href="auth-login.html"><i class="far fa-square"></i> <span>Login</span></a></li>
            <li><a class="nav-link" href="auth-register.html"><i class="far fa-square"></i> <span>Register</span></a>
            </li>
            <li><a class="nav-link" href="auth-forgot-password.html"><i class="far fa-square"></i> <span>Forgot
                        password</span></a></li> --}}

        </ul>
    </aside>
</div>

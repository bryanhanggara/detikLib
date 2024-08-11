<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Detik <span style="color: red">Lib</span> </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ route('categories.index') }}">Your Categories</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{route('books.index')}}">Your Book</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">More</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Library</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ route('list.index') }}">Books</a>
                    </li>
                </ul>
            </li>
           
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="#"
                class="btn btn-primary btn-lg btn-block btn-icon-split "  onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" >
                Logout <i class="fa fa-sign-out"></i> 
            </a>
        </div>
        <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: none;">
            @csrf
            <button type="submit"></button>
        </form>
    </aside>
</div>

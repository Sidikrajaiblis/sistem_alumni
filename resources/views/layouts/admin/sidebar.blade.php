<aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ asset('admin/images/logo-icon.png') }}" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                @if (Auth::user()->role == 'admin')
                <h5 class="mb-0">Admin</h5>
                @elseif (Auth::user()->role == 'moderator')
                <h5 class="mb-0">Moderator</h5>
                @endif
            </div>
            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <!--navigation-->
            <ul class="metismenu" id="sidenav">
                <li>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="parent-icon"><i class="material-icons-outlined">home</i>
                            </div>
                            <div class="menu-title">Dashboard Admin</div>
                        </a>
                    @elseif (Auth::user()->role == 'moderator')
                        <a href="{{ route('moderator.dashboard') }}">
                            <div class="parent-icon"><i class="material-icons-outlined">home</i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    @endif
                </li>
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
                        </div>
                        <div class="menu-title">Loker</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.kategori_loker.index') }}"><i class="material-icons-outlined">arrow_right</i>Kategori Loker</a>
                        </li>
                        <li><a href="{{ route('loker.index') }}"><i class="material-icons-outlined">arrow_right</i>Informasi Loker</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    @if (Auth::user()->role == 'moderator')
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
                        </div>
                        <div class="menu-title">Forum</div>
                    </a>
                    <ul>
                        <li><a href="{{ route('moderator.kategori_forum.index') }}"><i class="material-icons-outlined">arrow_right</i>Kategori Forum</a>
                        </li>
                        <li><a href="{{ route('moderator.forum.index') }}"><i class="material-icons-outlined">arrow_right</i>Forum diskusi</a>
                        </li>
                    </ul>
                    @endif
                </li>
                @if (Auth::user()->role == 'admin')
                <li class="menu-label">User Management</li>
                <li>
                    <a href="{{ route('admin.user.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                </li>
                @endif
                @if (Auth::user()->role == 'moderator')
                <li class="menu-label">User Management</li>
                <li>
                    <a href="{{ route('moderator.user.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                </li>
                @endif
            </ul>
            <!--end navigation-->
        </div>
    </aside>
<header class="p-3 bg-dark text-white shadow-sm">
    <div class="container">
        <div
            class="d-flex flex-wrap align-items-center justify-content-between"
        >
            <!-- Brand -->
            <a
                href="{{route('Homepage')}}"
                class="d-flex align-items-center fs-4 text-white text-decoration-none"
            >
                <strong>🎓 Educator</strong>
            </a>

            <!-- Right Side Buttons / Profile -->
            <div class="d-flex align-items-center gap-2">
                @auth
 <!-- Profile Picture Dropdown -->
                <div class="dropdown">
                    <a
                        href="#"
                        class="d-block link-light text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="https://i.pravatar.cc/40?img=3"
                            alt="profile"
                            width="40"
                            height="40"
                            class="rounded-circle"
                        />
                    </a>
                   <ul class="dropdown-menu dropdown-menu-end text-small">
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li><a class="dropdown-item" href="#">Settings</a></li>
    <li><hr class="dropdown-divider" /></li>

    <li>
        <form action="{{route('logoutAction')}}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
                Logout
            </button>
        </form>
    </li>
</ul>

                </div>
                @else
<a href="{{route('RegisterPage')}}" class="btn btn-warning">Sign-up</a>
                <a href="{{route('LoginPage')}}" class="btn btn-outline-light">Login</a>
                @endauth
                

               
            </div>
        </div>
    </div>
</header>

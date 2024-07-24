

    <div class="container">
        <header class="p-3 mb-3 border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">SirT</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('/curduser') ? 'active' : ''}}" href="curduser">CURD USER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('/') ? 'active' : ''}}" href="/">Lab 1</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Lab 2
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('lab221') }}">Bài 2.1: Tin xem nhiều</a></li>
                                    <li><a class="dropdown-item" href="{{ url('lab222') }}">Bài 2.2: Tin mới nhất</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ url('lab231/Thể thao') }}">Bài 3.1: Tin theo loại</a></li>
                                    <li><a class="dropdown-item" href="{{ url('lab232/10') }}">Bài 3.2: Tin theo ID</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Lab 3
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('lab3') }}">Trang chủ</a></li>
                                    <li><a class="dropdown-item" href="{{ url('lab3/10') }}">Chi tiết tin</a></li>
                                    <li><a class="dropdown-item" href="{{ url('lab3b1/Nghệ thuật') }}">Tin trong loại</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
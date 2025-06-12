<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .myheader {
            background-color: #3d92bc;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .school-title {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #3d92bc;
            font-weight: 500;
        }

        .navbar-nav .nav-link.active {
            color: #0d6efd;
        }
    </style>
</head>
<body>

<!-- Section 1: Header -->
<section class="myheader">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2 text-start">
                <img class="img-fluid" src="{{ asset('hinhanh/logo.png') }}" style="max-height: 100px;" alt="Logo">
            </div>
            <div class="col-md-10 text-start">
                <div class="school-title">TRƯỜNG CAO ĐẲNG KINH TẾ - KỸ THUẬT CẦN THƠ</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Navigation Menu -->
<section class="mymainmenu py-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ps-3">
                            <a class="nav-link active" href="{{ route('thongKeSach') }}">SÁCH MƯỢN </a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link active" href="{{ route('thongKeHanNgay') }}">THỜI HẠN </a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link active" href="{{ route('thongketheothang') }}"> THEO THÁNG</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link active" href="{{ route('thongKeTheLoai') }}"> THỂ LOẠI </a>
                        </li>
                        
                        <li class="nav-item ps-3">            
                        <!-- <i class="fa-solid fa-house"></i>  hình nhà trang chủ                -->
                        <a class="nav-link active  " aria-current="page" href="{{ route('lop.index') }}"  >QUẢN LÝ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

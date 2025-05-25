<!DOCTYPE html>
<html lang="vi">
<head>
   <!-- Bootstrap 5 CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Trang chủ</title>

   <p>ID độc giả: {{ $id_dg }}</p>
</head>
<body>

@include('phandau')

<!-- section 3 may main hình welcom -->

<section class="mymaincontent container ">
    <div class="container">
      <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
<!-- welcom                     -->
          <div class="carousel-inner  container">
            <div class="carousel-item active">
            <img  height="300px" width="150px" src="{{ asset('hinhanh/bgwelcom.jpg') }}" class="d-block w-100 hinhsale" alt="...">

            </div>
            <div class="carousel-item">
            <img  height="300px" width="150px" src="{{ asset('hinhanh/bgwelcom.jpg') }}" class="d-block w-100 hinhsale" alt="...">

            </div>
            <div class="carousel-item">
            <img  height="300px" width="150px" src="{{ asset('hinhanh/bgwelcom.jpg') }}" class="d-block w-100 hinhsale" alt="...">

            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div >
<!-- kết thúc welcome -->

<!--Thống kê lượt có còn mượn-->
<!-- col các thống kê kho sách -->
<div class="container mt-4">
  <div class="row text-center">
    <!-- Tổng số lượng sách -->
          <div class="col-md-4 bg-primary text-white p-4 rounded">
              <h1>Tổng số sách</h1>
              <p style="font-size: 2.5rem;">{{ $tong_sach }}</p>
          </div>
<!-- Số lượng sách đã mượn -->
    <div class="col-md-4 bg-warning text-white p-4 rounded">
        <h1>Đã mượn</h1>
        <p style="font-size: 2.5rem;">{{ $sach_muon }}</p>
    </div>

<!-- Số lượng sách còn lại -->
    <div class="col-md-4 bg-success text-white p-4 rounded">
            <h1>Còn lại</h1>
           <p style="font-size: 2.5rem;">{{ $sach_con_lai }}</p>
    </div>
  </div>
</div>
<!-- tính lượt truy cập web -->
<div class="container mt-5 bg-success p-2 text-dark bg-opacity-50">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="fw-bold" style="color: white;">Lượt truy cập: {{$luot_truy_cap}} lượt truy cập trang web này</h1>
        </div>
    </div>
</div>

<!-- tìm  kiếm  -->

                <!-- form tìm kiếm trong trangchu.php -->
                <form method="get" action="{{ route('timkiem') }}">
                                <div class="container py-3">
                                <div class="row">
                                    <div class="col-md-10">
                                    <input class="form-control me-2" type="text" name="tukhoa" placeholder="Nhập vào tên sách, tác giả" aria-label="Tìm kiếm"> 
                                    </div>
                                    <div class="col-md-1">
                                    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                                    </div>
                                </div>
                                </div>
                        </form>

                <!-- dong -->
                <div class="container">
                <div class="row"><br></div>
                </div>
                <!--cai1-->
<form method="get">
<!-- sách mới và tin tức -->
<div class="container">
               <div class="row">
                   <div class="col-md-8">
                        <!-- Khối cuộn ngang sach moi--><div><h1>Sách Mới</h1> </div>
                                        <div class="table-responsive">
                                              <table class="table table-bordered table-striped">
                                              <tbody>
                                                  <tr>
                                                      @foreach ($sach_moi as $sach)
                                                          <td style="text-align: center;">
                                                              <div class="col-md-12">
                                                                  <img height="450px" width="250px" src="{{ $sach->hinhsach }}" alt="Hình sách"><br>
                                                                  <div><strong>Tên Tác Giả:</strong> {{ $sach->tentg }}</div>
                                                                  <div><strong>Tên sách:</strong> {{ $sach->tensach }}</div>
                                                                  <div class="mt-2">
                                                                      <a href="{{ url('chitietsach/'.$sach->id_sach) }}" class="btn btn-outline-info">Chi tiết</a>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                      @endforeach
                                                  </tr>
                                              </tbody>

                                              </table>
                                     </div>   
                  </div>
                  <div class="col-md-4">
                            <div><h1>Tin Tức</h1></div>
                            <div style="height: 600px; overflow-y: auto; padding: 10px; border: 1px solid #ccc;">
                                <div class="row">
                                    @foreach ($tin_tuc as $tt)
                                        <div class="col-md-12 mb-4" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                                            <div class="text-center">
                                                <img height="400px" width="300px" src="{{ $tt->hinhtt }}" class="img-fluid mb-3"><br>
                                                <div>
                                                    <strong>Tiêu đề:</strong> {{ $tt->tieude }}
                                                </div>
                                                <div>
                                                    <strong>Trích dẫn:</strong> {{ $tt->trichdan }}
                                                </div>
                                                <div class="mt-2">
                                                    <a href="{{ $tt->link }}" class="btn btn-outline-warning">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

              </div>
            </div>
<!-- kết thúc phần sách mới và tin tức  -->
 
 <!-- đề xuất sách -->
                <!-- dong -->
                <div class="container">
                <div class="row"><br></div>
                </div>
                <!--cai1--> 
<div class="container">
<div><h1> Đề Xuất</h1></div>

<div class="row">
<!-- Khối cuộn ngang de xuat -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        @foreach ($de_xuat as $sach)
                                            <td style="text-align: center;">
                                                <div class="col-md-12">
                                                    <img height="200px" width="150px" src="{{ $sach->hinhsach }}" alt="Hình sách"><br>
                                                    <div><strong>Tên Tác Giả:</strong> {{ $sach->tentg }}</div>
                                                    <div><strong>Tên sách:</strong> {{ $sach->tensach }}</div>
                                                    <div class="mt-2">
                                                        <a href="{{ url('chitietsach/' . $sach->id_sach) }}" class="btn btn-outline-info">Chi tiết</a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                  </div>

</div>
</form>
</section>

@include('phancuoi')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

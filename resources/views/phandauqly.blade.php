<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
.myheader {
    background-color: #3d92bc; /* Xanh nhạt */
    color: white;              /* Chữ trắng */
    padding: 20px;             /* Thêm khoảng cách nội dung */
    text-align: center;        /* Căn giữa chữ */
    font-size: 24px;           /* Cỡ chữ lớn */
    font-weight: bold;         /* Chữ đậm */
    border-radius: 8px;        /* Bo góc nhẹ */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
}
</style>

</head>
<body>

<!-- code trang chủ phần đầu -->
 <!-- section 1 myheader -->
<section class="myheader b">
  
  <div class="row container">
          <!-- <div class="col-md-1"></div> -->
          <div class="col-md-11  ps-5"> 
              
              <div class="d-flex flex-row ">
                <div class="">
                <img  class="img-fluid" src="{{ asset('hinhanh/logo.png') }}" style="max-height: 100px;">
                </div>
                <div class="py-4 mx-3"><span class="n">TRƯỜNG CAO ĐẲNG KINH TẾ- KỸ THUẬT CẦN THƠ</span>  
                </div>                     
              </div> 
          </div>
 </div>  
</section>  

<!-- section2 my mai menum -->

<section class="mymainmenu">
<div class="container">
<div class="row" >
  <div class="col">
    
      <nav class="navbar navbar-expand-lg   ">
         
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item ps-3">            
                <!-- <i class="fa-solid fa-house"></i>  hình nhà trang chủ                -->
                  <a class="nav-link active  " aria-current="page" href="{{ route('lop.index') }}"  >LỚP</a>
                </li>
                <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('qldocgia.index') }}"  >ĐỘC GIẢ </a>
                </li>          

                  <li class="nav-item ps-3">
                   <a class="nav-link active" aria-current="page" href="{{ route('qladmin.index') }}" > ADMIN</a>
                  </li>
                  <li class="nav-item ps-3">
                   <a class="nav-link active" aria-current="page" href="{{ route('muontra.index') }}"  >MƯỢN TRẢ </a>
                  </li>
                  <li class="nav-item ps-3">
                   <a class="nav-link active" aria-current="page" href="{{ route('nhanxet.index') }}"   >NHÂN XÉT </a>
                  </li>  
                  <li class="nav-item ps-3">
                   <a class="nav-link active" aria-current="page" href="{{ route('sach.index') }}"    >SÁCH </a>
                  </li>
                </li>
                <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('sinhvien.index') }}"    >SINH VIÊN </a>
                </li>
                
                <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('tacgia.index') }}"   >TÁC GIẢ </a>
                </li>
                <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('theloai.index') }}">THỂ LOẠI</a>
                </li>
                      <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('tintuc.index') }}"> TIN TỨC  </a>
                </li> 
                </li>
                      <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('dh.index') }}"> ĐĂNG HÌNH  </a>
                </li> 
                 </li>
                      <li class="nav-item ps-3">
                  <a class="nav-link active" aria-current="page" href="{{ route('thongKeTheLoai') }}">THỐNG KÊ </a>
                </li>                    
              </ul>
            </div>
          </div>
        </nav>        
           
  </div>
</div>
</div>
</section >
</body>
</html>


<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Tài khoản</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
@include('phandau')
<section class="d-flex justify-content-center align-items-center " style="background-color: #f0f2f5;  ">
  <div class="container col-lg-6 col-md-8 col-sm-12">
    @if (session('success'))
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
    @endif
    <!-- dong -->
                <div class="container">
                <div class="row"><br></div>
                </div>
                <!--cai1-->
  
            <div class="card shadow ms-5 p-5 " >
              <div class="card-header ">
                <h4 class="mb-0" style="font-size: 35px;"><i class="fas fa-user-edit me-2"></i>Sửa thông tin độc giả</h4>
              </div>
              <div class="card-body bg-white container mx-5">
                <form method="POST" action="{{ route('taikhoan.capnhat', $sinhvien->id_sv) }}">
                  @csrf

                  <div class="mb-3">
                    <label class="form-label">Mã sinh viên</label>
                    <input type="text" class="form-control" name="masv" value="{{ $sinhvien->masv }}" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" class="form-control" name="hoten" value="{{ $sinhvien->hoten }}" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" value="{{ $sinhvien->ngaysinh }}" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <div class="d-flex gap-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nam" {{ $sinhvien->gioitinh == 'Nam' ? 'checked' : '' }} required>
                        <label class="form-check-label">Nam</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nữ" {{ $sinhvien->gioitinh == 'Nữ' ? 'checked' : '' }}>
                        <label class="form-check-label">Nữ</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $sinhvien->email }}" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" value="{{ $sinhvien->sdt }}" required>
                  </div>

                  <div class="mb-4">
                    <label class="form-label">Lớp</label>
                    <select name="lop" class="form-select" required>
                      <option value="">-- Chọn lớp --</option>
                      @foreach($dslop as $lop)
                        <option value="{{ $lop->id_lop }}" {{ $lop->id_lop == $sinhvien->id_lop ? 'selected' : '' }}>
                          {{ $lop->tenlop }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">
                      <i class="fas fa-save me-2"></i>Cập nhật
                    </button>
                  </div>
                </form>
              </div>
            </div>
  </div>
</section>
@include('phancuoi')
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


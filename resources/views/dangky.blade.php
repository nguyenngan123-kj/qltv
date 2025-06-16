<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Dăng ký </title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
@include('phandau')
<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container col-md-6">
    <form method="POST" action="{{ route('dangky.store') }}" class="bg-white p-4 rounded shadow-sm">
      @csrf

      <div class="text-center mb-4">
        <h3 class="text-primary">ĐĂNG KÝ THÀNH VIÊN ĐỘC GIẢ</h3>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="mb-3">
        <label for="masv" class="form-label">Mã sinh viên</label>
        <input type="text" class="form-control" name="masv" value="" placeholder="Nhập MASV" required>
      </div> 

      <div class="mb-3">
        <label for="hoten" class="form-label">Họ tên</label>
        <input type="text" class="form-control" name="hoten" value="" placeholder="Nhập họ tên" required>
      </div>

      <div class="mb-3">
        <label for="matkhau" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu" required>
      </div>

      <div class="mb-3">
        <label for="ngaysinh" class="form-label">Ngày sinh</label>
        <input type="date" class="form-control" name="ngaysinh" value="" required>
      </div>

      <div class="mb-3">
        <label for="namnu" class="form-label">Nam/Nữ</label>
        <input type="text" class="form-control" name="gioitinh" value="" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="" placeholder="Nhập địa chỉ email" required>
      </div>

      <div class="mb-3">
        <label for="sdt" class="form-label">Số điện thoại</label>
        <input type="tel" class="form-control" name="sdt" value="" placeholder="Nhập số điện thoại" required>
      </div>

      <div class="mb-4">
        <label for="lop" class="form-label">Lớp</label>
        <select name="id_lop" class="form-select" required>
          <option value="">-- Chọn lớp --</option>
          @foreach ($dslop as $lop)
            <option value="{{ $lop->id_lop }}" {{  $lop->id_lop ? 'selected' : '' }}>
              {{ $lop->tenlop }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success px-5">Đăng ký</button>
      </div>
    </form>
  </div>
  @include('phancuoi')
</section>
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


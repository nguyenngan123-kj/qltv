<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng nhập</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  @include('phandau')
<section class=" py-5" style="background-color: #f8f9fa;">
  <div class="container col-md-6">
    <form method="POST" action="{{ route('dangnhap.xuly') }}" class="bg-white p-4 rounded shadow-sm">
      @csrf
      <div class="text-center mb-4">
        <h3 class="text-primary">ĐĂNG NHẬP</h3>
        @if(session('error'))
          <p class="text-danger">{{ session('error') }}</p>
        @endif
      </div>

      <div class="mb-3">
        <label for="tdn" class="form-label">Tên đăng nhập</label>
        <input class="form-control" id="tdn" name="tdn" type="text" placeholder="Nhập tên đăng nhập" required>
      </div>

      <div class="mb-3">
        <label for="mkdn" class="form-label">Mật khẩu</label>
        <input class="form-control" id="mkdn" name="mkdn" type="password" placeholder="Nhập mật khẩu" required>
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-primary mx-2" type="submit">Đăng nhập</button>
        <a href="{{ route('dangky') }}" class="btn btn-outline-primary">Đăng Ký</a>
      </div>

      <div class="d-flex justify-content-center mt-3">
        <a href="#" class="btn btn-outline-primary mx-2">Quên mật khẩu</a>
      </div>
    </form>
  </div>
</section>
@include('phancuoi')
   <!-- Bootstrap 5 JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Admin</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
@include('phandau')
<section class="adnenden py-5" style="background-color: #f8f9fa;">
   <!-- dong -->
                <div class="container">
                <div class="row"><br></div>
                </div>
                <!--cai1-->
  <div class="container col-md-6">
    <form method="POST" action="{{ route('admin.login') }}" class="bg-white p-4 rounded shadow-sm">
      @csrf

      <div class="text-center mb-4">
        <h3 class="text-primary">ĐĂNG NHẬP ADMIN</h3>
      </div>

      <div class="mb-3">
        <label for="tdn" class="form-label">Tên đăng nhập</label>
        <input class="form-control" id="tdn" name="tdn" type="text" placeholder="Nhập tên đăng nhập" value="">
      </div>

      <div class="mb-3">
        <label for="mkdn" class="form-label">Mật khẩu</label>
        <input class="form-control" id="mkdn" name="mkdn" type="password" placeholder="Nhập mật khẩu">
      </div>

      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mx-2">Đăng nhập</button>
      </div>
    </form>
  </div>
   
</section>

@include('phancuoi')
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


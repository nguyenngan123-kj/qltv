<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Tìm Kiếm</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
@include('phandau')
<div class="container py-4">
  <h3 class="mb-5">Kết quả tìm kiếm cho: <i>{{ $tukhoa }}</i></h3>

  <div class="row justify-content-center mb-5">
    @if ($sachs->isEmpty())
      <p class="text-muted">Không tìm thấy kết quả nào.</p>
    @else
      @foreach ($sachs as $sach)
        <div class="col-md-3 mb-2 ">
          <div class="card h-100">
            <img src="{{ asset($sach->hinhsach) }}" class="card-img-top" alt="Hình sách">
            <div class="card-body ms-5">
              <h5 class="card-title">{{ $sach->tensach }}</h5>
              <p class="card-text">Tác giả: {{ $sach->tentg }}</p>
              <a href="{{ url('chitietsach/'.$sach->id_sach) }}" class="btn btn-outline-info">Chi tiết</a>
           
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
@include('phancuoi')
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

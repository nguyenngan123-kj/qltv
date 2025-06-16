<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Thể loại: Tiểu Thuyết</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
@include('phandau')

<div class="container py-4">
  <h3 class="mb-5">Thể loại: Tiểu Thuyết</h3>

  <div class="row justify-content-center mb-5">
    @forelse ($sachs as $sach)
      <div class="col-md-3 mb-3">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset($sach->hinhsach) }}" class="card-img-top" alt="Hình sách" style="height: 250px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $sach->tensach }}</h5>
            <p class="card-text">Tác giả: {{ $sach->tentg }}</p>
            <a href="{{ url('chitietsach/'.$sach->id_sach) }}" class="btn btn-outline-info">Chi tiết</a>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center text-muted">Không có sách nào thuộc thể loại Tiểu Thuyết.</p>
    @endforelse
  </div>
</div>

@include('phancuoi')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Yeu Thich</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
@include('phandau')
<div class="container mt-4">
  <h5 class="mt-4">📚 Những sách yêu thích của bạn:</h5>
  <div class="row">
    @if ($yeuthich->count() > 0)
      @foreach($yeuthich as $ls)
        <div class="col-md-3 text-center mb-4">
          <img height="200px" width="150px" src="{{ asset($ls->sach->hinhsach) }}" alt="Hình sách" class="img-fluid rounded">
          <div><strong>Tên Tác Giả:</strong> {{ $ls->sach->tacgia->tentg }}</div>
          <div><strong>Tên sách:</strong> {{ $ls->sach->tensach }}</div>
          <div class="mt-2">
           
           <a href="{{ route('chitietsach', ['id_sach' => $ls->sach->id_sach]) }}" class="btn btn-sm btn-primary">Xem chi tiết</a>
          </div>
        </div>
      @endforeach
    @else
      <div class="col">
        <p class="text-muted">Bạn chưa có sách nào trong lịch sử.</p>
      </div>
    @endif
  </div>

</div>
@include('phancuoi')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Sách top</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    @include('phandau')
  <div class="row">
    @if ($topSachs->count() > 0)
        @foreach ($topSachs as $sach)
            <div class="col-md-3 text-center mb-4">
                <img height="200px" width="150px" src="{{ $sach->hinhsach }}" alt="Hình sách" class="img-fluid rounded">
                
                <div><strong>Tên tác giả:</strong> {{ $sach->tacgia->tentg }}</div>
                <div><strong>Tên sách:</strong> {{ $sach->tensach }}</div>
                <div><strong>Lượt yêu thích:</strong> {{ $sach->yeuthich_count }}</div>
                
                <div class="mt-2">
                    <!-- <a href="#" class="btn btn-outline-warning">ĐỌC ONLINE</a> -->
                    <a href="{{ url('chitietsach/' . $sach->id_sach) }}" class="btn btn-outline-info">Chi tiết</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="col">
            <p class="text-muted">Chưa xếp hạng</p>
        </div>
    @endif
</div>
@include('phancuoi')
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


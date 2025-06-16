<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('phandau')
<div class="container py-5">
    <p>ID độc giả: {{ session('id_dg') }}</p>
    <p>ID sách: {{ $id_sach }}</p>

    <div class="row">
        <div class="col-md-4">
            <img height="400px" width="450px" src="{{ asset($sach->hinhsach) }}"class="img-fluid rounded shadow">

            </div>
        <div class="col-md-8">
            <h3 class="text-primary">Tên sách: {{ $sach->tensach }}</h3>
            <p><strong>Tác giả:</strong> {{ $sach->tentg }}</p>
            <p><strong>Thể loại:</strong> {{ $sach->tentl }}</p>
            <div class="mt-2">
                    @if(session('id_dg'))
                     <form action="{{ route('sach.luu_lich_su', $sach->id_sach) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-success mb-3">
                                📖 Đọc online
                            </button>
                        </form>
                    <form action="{{ route('sach.luu_yeu_thich', $sach->id_sach) }}" method="POST" class="mb-3">
                                @csrf
                                <!-- <button type="submit" name="doc" class="btn btn-success me-2">Đọc Online</button> -->
                                <button type="submit" name="luu" class="btn btn-outline-primary">❤️ Lưu vào yêu thích</button>
                            </form>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                      
                    </form>
            </div>
        </div>
    </div>

    

    <hr>

    <h4>📚 Các sách cùng thể loại:</h4>
    <div class="row">
        @foreach($sachCungTheLoai as $s)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset($s->hinhsach)}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $s->tensach }}</h5>
                        <a href="{{ route('chitietsach', ['id_sach' => $s->id_sach]) }}" class="btn btn-sm btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


<!-- Gửi nhận xét --><!-- 🌟 Form nhận xét -->
<form action="{{ route('sach.nhanxet', $sach->id_sach) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $sach->id_sach }}">
    <input type="text" name="nhanxet" class="form-control" placeholder="Nhập nhận xét...">
    <button type="submit" class="btn btn-warning mt-2">Gửi nhận xét</button>
</form>

<!-- Hiển thị nhận xét -->
@if ($nhanxets->count() > 0)
    @foreach ($nhanxets as $nhanxet)
        <p>💬 <strong>{{ $nhanxet->ten_dg }}:</strong> {{ $nhanxet->nhanxt }}</p>
    @endforeach
@else
    <p>Chưa có nhận xét nào cho cuốn sách này.</p>
@endif

</div>
</div>
@include('phancuoi')
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

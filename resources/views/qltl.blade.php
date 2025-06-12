<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTL - Quản lý Thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
       <style>
@media print {
    body * {
        visibility: hidden;
    }
    #print-area, #print-area * {
        visibility: visible;
    }
    #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    button, a, form {
        display: none !important;
    }
}
</style>

</head>
<body>
@include('phandauqly')
<div class="container mt-4">
    <form method="GET" action="{{ route('theloai.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào tên thể loại " value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($theloai))
<h2 class="text-center">CẬP NHẬT THỂ LOẠI</h2>

<form action="{{ route('theloai.update', $theloai->id_tl) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_tl" value="{{ $theloai->id_tl }}">
        <table class="table table-bordered" style="width: 60%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px;">MÃ TL</td>
                <td><input name="matl" type="text" value="{{ $theloai->matl }}" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">TÊN TL</td>
                <td><input name="tentl" type="text" value="{{ $theloai->tentl }}" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" value="CẬP NHẬT">
                </td>
            </tr>
        </table>
    </div>
</form>
@endif

<div class="container mt-5">
    <h2 class="text-center">DANH SÁCH THỂ LOẠI</h2>
   <div class="mb-3 text-start ms-5">
    <a href="{{ route('themqltl.store') }}" class="btn btn-success">THÊM THỂ LOẠI</a>
</div>
 <div class="mb-3 text-start ms-5">
       <button onclick="window.print()" class="btn btn-secondary">IN BẢNG</button>
    </div>
       <div id="print-area">

    <table class="table table-bordered" style="width:90%;margin:auto;">
        <thead class="table-light">
            <tr>
                <th>Mã TL</th>
                <th>Tên TL</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_tl as $tl)
            <tr>
                <td>{{ $tl->matl }}</td>
                <td>{{ $tl->tentl }}</td>
                <td>
                    <a href="{{ route('theloai.edit', $tl->id_tl) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('theloai.destroy', $tl->id_tl) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa thể loại này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
       </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTG - Quản lý Tác giả</title>
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
    <form method="GET" action="{{ route('tacgia.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào tên tác giả" value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($tacgia))
<h2 style="text-align: center;">CẬP NHẬT TÁC GIẢ</h2>

<form action="{{ route('tacgia.update', $tacgia->id_tg) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_tg" value="{{ $tacgia->id_tg }}">
        <table class="table table-bordered" style="width: 60%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px;">MÃ TG</td>
                <td><input name="matg" type="text" value="{{ $tacgia->matg }}" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">TÊN TG</td>
                <td><input name="tentg" type="text" value="{{ $tacgia->tentg }}" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">NĂM SINH</td>
                <td><input name="namsinh" type="date" value="{{ $tacgia->namsinh }}" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">QUỐC TỊCH</td>
                <td><input name="quoctich" type="text" value="{{ $tacgia->quoctich }}" class="form-control"></td>
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
    <h2 class="text-center">DANH SÁCH TÁC GIẢ</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqltg') }}" class="btn btn-success">THÊM TÁC GIẢ</a>
    </div>

    <table class="table table-bordered" style="width:90%;margin:auto;">
        <thead class="table-light">
            <tr>
                <th>Mã TG</th>
                <th>Tên TG</th>
                <th>Năm sinh</th>
                <th>Quốc tịch</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_tg as $tg)
            <tr>
                <td>{{ $tg->matg }}</td>
                <td>{{ $tg->tentg }}</td>
                <td>{{ $tg->namsinh }}</td>
                <td>{{ $tg->quoctich }}</td>
                <td>
                    <a href="{{ route('tacgia.edit', $tg->id_tg) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('tacgia.destroy', $tg->id_tg) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa tác giả này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>

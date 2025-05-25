<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLAD - Quản lý Tài khoản Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('phandauqly')
@if(isset($taikhoan))
<h2 class="text-center mt-4">CẬP NHẬT TÀI KHOẢN ADMIN</h2>

<form action="{{ route('qladmin.update', $taikhoan->id_ad) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_ad" value="{{ $taikhoan->id_ad }}">
        <table class="table table-bordered" style="width: 60%;">
            <tr>
                <td style="padding: 10px;">TÊN ADMIN</td>
                <td><input name="ten_ad" type="text" value="{{ $taikhoan->ten_ad }}" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">MẬT KHẨU</td>
                <td><input name="mk_ad" type="text" value="{{ $taikhoan->mk_ad }}" class="form-control" required></td>
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
    <h2 class="text-center">DANH SÁCH TÀI KHOẢN ADMIN</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqlad') }}" class="btn btn-success">THÊM ADMIN</a>
    </div>

    <table class="table table-bordered" style="width:90%;margin:auto;">
        <thead class="table-light">
            <tr>
                <th>Tên Admin</th>
                <th>Mật khẩu</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_ad as $ad)
            <tr>
                <td>{{ $ad->ten_ad }}</td>
                <td>{{ $ad->mk_ad }}</td>
                <td>
                    <a href="{{ route('qladmin.edit', $ad->id_ad) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('qladmin.destroy', $ad->id_ad) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa tài khoản này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

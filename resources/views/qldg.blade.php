<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLDG - Quản lý Tài khoản Độc giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
@include('phandauqly')
<div class="container mt-4">
    <form method="GET" action="{{ route('qldocgia.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào họ tên" value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($taikhoan))
<h2 class="text-center mt-4">CẬP NHẬT TÀI KHOẢN ĐỘC GIẢ</h2>

<form action="{{ route('qldocgia.update', $taikhoan->id_dg) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_dg" value="{{ $taikhoan->id_dg }}">
        <table class="table table-bordered" style="width: 60%;">
            <tr>
                <td style="padding: 10px;">Tên Độc Giả</td>
                <td><input name="ten_dg" type="text" value="{{ $taikhoan->ten_dg }}" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">Mật Khẩu</td>
                <td><input name="mk_dg" type="text" value="{{ $taikhoan->mk_dg }}" class="form-control"></td>
            </tr>
           
<tr>
    <td>Mã Sinh Viên</td>
    <td>
        <select name="id_sv" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($ds_sv as $tg)
                <option value="{{ $tg->id_sv }}" {{ $tg->id_sv == $taikhoan->id_sv ? 'selected' : '' }}>
                    {{ $tg->masv}}
                </option>
            @endforeach
        </select>
    </td>
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
    <h2 class="text-center">DANH SÁCH TÀI KHOẢN ĐỘC GIẢ</h2>

  
    <table class="table table-bordered" style="width:90%;margin:auto;">
        <thead class="table-light">
            <tr>
                <th>Tên Độc Giả</th>
                <th>Mật Khẩu</th>
                <th>ID Sinh Viên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_dg as $dg)
            <tr>
                <td>{{ $dg->ten_dg }}</td>
                <td>{{ $dg->mk_dg }}</td>
                <td>{{ $dg->id_sv }}</td>
                <td>
                    <a href="{{ route('qldocgia.edit', $dg->id_dg) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('qldocgia.destroy', $dg->id_dg) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
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

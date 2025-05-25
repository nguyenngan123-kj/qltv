<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL SINH VIÊN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('phandauqly')
<div class="container mt-4">
    <form method="GET" action="{{ route('sinhvien.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào mã sinh viên và họ tên" value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($sinhvien))
<h2 class="text-center">CẬP NHẬT SINH VIÊN</h2>
<form action="{{ route('sinhvien.update', $sinhvien->id_sv) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_sv" value="{{ $sinhvien->id_sv }}">
        <table class="table table-bordered" style="width: 60%;">
            <tr><td>Mã SV</td><td><input name="masv" type="text" value="{{ $sinhvien->masv }}" class="form-control" required></td></tr>
            <tr><td>Họ tên</td><td><input name="hoten" type="text" value="{{ $sinhvien->hoten }}" class="form-control" required></td></tr>
            <tr><td>Ngày sinh</td><td><input name="ngaysinh" type="date" value="{{ $sinhvien->ngaysinh }}" class="form-control" required></td></tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nam" {{ $sinhvien->gioitinh == 'Nam' ? 'checked' : '' }} required>
                        <label class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nữ" {{ $sinhvien->gioitinh == 'Nữ' ? 'checked' : '' }} required>
                        <label class="form-check-label">Nữ</label>
                    </div>
                </td>
            </tr>
            <tr><td>Email</td><td><input name="email" type="text" value="{{ $sinhvien->email }}" class="form-control" required></td></tr>
            <tr><td>Số điện thoại</td><td><input name="sdt" type="text" value="{{ $sinhvien->sdt }}" class="form-control" required></td></tr>
            <tr>
                <td>Lớp</td>
                <td>
                    <select name="id_lop" class="form-select" required>
                        @foreach($ds_lop as $lop)
                            <option value="{{ $lop->id_lop }}" {{ $sinhvien->id_lop == $lop->id_lop ? 'selected' : '' }}>
                                {{ $lop->tenlop }}
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
    <h2 class="text-center">DANH SÁCH SINH VIÊN</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqlsv') }}" class="btn btn-success">THÊM SINH VIÊN</a>
    </div>

    <table class="table table-bordered" style="width:90%; margin:auto;">
        <thead>
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Lớp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ds_sinhvien as $sv)
            <tr>
                <td>{{ $sv->masv }}</td>
                <td>{{ $sv->hoten }}</td>
                <td>{{ $sv->ngaysinh }}</td>
                <td>{{ $sv->gioitinh }}</td>
                <td>{{ $sv->email }}</td>
                <td>{{ $sv->sdt }}</td>
                <td>{{ $sv->lop->tenlop ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('sinhvien.edit', $sv->id_sv) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('sinhvien.destroy', $sv->id_sv) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa sinh viên này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>THÊM SINH VIÊN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h2 class="text-center">FORM THÊM SINH VIÊN</h2>

<form action="{{ route('themqlsv.store') }}" method="POST">
    @csrf
    <div style="width: 100%; display: flex; justify-content: center;">
        <table class="table table-bordered" style="width: 60%;">
            <tr>
                <td>MÃ SV</td>
                <td><input name="masv" type="text" class="form-control" required ></td>
            </tr>
            <tr>
                <td>HỌ TÊN</td>
                <td><input name="hoten" type="text" class="form-control" required ></td>
            </tr>
            <tr>
                <td>NGÀY SINH</td>
                <td><input name="ngaysinh" type="date" class="form-control" required></td>
            </tr>
            <tr>
                <td>GIỚI TÍNH</td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nam" required>
                        <label class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nữ" required>
                        <label class="form-check-label">Nữ</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input name="email" type="text" class="form-control" required></td>
            </tr>
            <tr>
                <td>SỐ ĐIỆN THOẠI</td>
                <td><input name="sdt" type="text" class="form-control" required></td>
            </tr>
            <tr>
                <td>LỚP</td>
                <td>
                    <select name="id_lop" class="form-select" required>
                         @foreach($ds_lop as $lop)
                            <option value="{{ $lop->id_lop }}" >
                                {{ $lop->tenlop }}
                            </option>
                        @endforeach
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" value="THÊM SINH VIÊN">
                </td>
            </tr>
        </table>
    </div>
</form>

</body>
</html>

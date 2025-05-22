<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>THÊM SÁCH</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h2 style="text-align: center;">FORM THÊM SÁCH</h2>

<form action="{{ route('themqls.store') }}" method="POST">
    @csrf
    <div style="width: 100%; display: flex; justify-content: center;">
        <table class="table table-bordered" style="width: 60%; border-collapse: collapse;">
             <tr>
                <td style="padding: 10px;">MÃ SÁCH</td>
                <td><input name="masach" type="text" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">TÊN SÁCH</td>
                <td><input name="tensach" type="text" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">ID TÁC GIẢ</td>
                <td><input name="id_tg" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">ID THỂ LOẠI</td>
                <td><input name="id_tl" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">NHÀ XUẤT BẢN</td>
                <td><input name="nxb" type="text" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">NGÀY NHẬP</td>
                <td><input name="ngaynhap" type="date" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">SỐ LƯỢNG</td>
                <td><input name="soluong" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td style="padding: 10px;">HÌNH SÁCH (URL)</td>
                <td><input name="hinhsach" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">LINK (URL ĐỌC/TRUY CẬP)</td>
                <td><input name="link" type="text" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding: 15px;">
                    <input type="submit" class="btn btn-primary" value="THÊM SÁCH">
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>

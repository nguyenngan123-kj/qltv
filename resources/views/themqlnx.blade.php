<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>THÊM NHẬN XÉT</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h2 style="text-align: center;">FORM THÊM NHẬN XÉT</h2>

<form action="{{ route('nhanxet.store') }}" method="POST">
    @csrf
    <div style="width: 100%; display: flex; justify-content: center;">
        <table class="table table-bordered" style="width: 60%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px;">ID ĐỘC GIẢ</td>
                <td><input name="id_dg" type="number" value="" style="width: 100%; padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">ID SÁCH</td>
                <td><input name="id_sach" type="number" value="" style="width: 100%; padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 10px;">NHẬN XÉT</td>
                <td><textarea name="nhanxt" style="width: 100%; padding: 5px;" rows="4"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding: 15px;">
                    <input type="submit" name="submit" class="btn btn-primary" value="THÊM">
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>

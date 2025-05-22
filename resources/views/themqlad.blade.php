<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLAD - Thêm Tài Khoản Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center mt-4">THÊM TÀI KHOẢN ADMIN MỚI</h2>

<form action="{{ route('themqlad.store') }}" method="POST" style="max-width: 600px; margin: auto;">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td style="padding: 10px;">TÊN ADMIN</td>
            <td><input type="text" name="ten_ad" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">MẬT KHẨU</td>
            <td><input type="password" name="mk_ad" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" class="btn btn-success" value="THÊM ADMIN">
            </td>
        </tr>
    </table>

    {{-- Hiển thị lỗi validate nếu có --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-3" style="max-width: 600px; margin: auto;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</form>

</body>
</html>

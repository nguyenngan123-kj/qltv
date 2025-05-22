<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTL - Thêm Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center mt-4">THÊM TIN TỨC MỚI</h2>

<form action="{{ route('themqltt.store') }}" method="POST" style="max-width: 700px; margin: auto;">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td style="padding: 10px;">TIÊU ĐỀ</td>
            <td><input type="text" name="tieude" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">TRÍCH DẪN</td>
            <td><textarea name="trichdan" class="form-control" rows="3" required></textarea></td>
        </tr>
        <tr>
            <td style="padding: 10px;">LINK</td>
            <td><input type="text" name="link" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">NGÀY ĐĂNG</td>
            <td><input type="date" name="ngaydang" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">HÌNH ẢNH (đường dẫn)</td>
            <td><input type="text" name="hinhtt" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" class="btn btn-success" value="THÊM TIN TỨC">
            </td>
        </tr>
    </table>

    {{-- Hiển thị lỗi validate nếu có --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
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

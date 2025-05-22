<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTG - Thêm Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center mt-4">THÊM TÁC GIẢ MỚI</h2>

<form action="{{ route('themqltg.store') }}" method="POST" style="max-width: 600px; margin: auto;">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td style="padding: 10px;">MÃ TÁC GIẢ</td>
            <td><input type="text" name="matg" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">TÊN TÁC GIẢ</td>
            <td><input type="text" name="tentg" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">NĂM SINH</td>
            <td><input type="date" name="namsinh" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td style="padding: 10px;">QUỐC TỊCH</td>
            <td><input type="text" name="quoctich" value="" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" class="btn btn-success" value="THÊM TÁC GIẢ">
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

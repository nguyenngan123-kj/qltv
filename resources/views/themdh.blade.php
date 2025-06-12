<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTL - Thêm hình</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center mt-4">THÊM HÌNH MỚI</h2>

<form action="{{ route('dh.store') }}" method="POST" style="max-width: 600px; margin: auto;"enctype="multipart/form-data">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td style="padding: 10px;">TIÊU ĐỀ</td>
            <td><input type="text" name="tieude" value="" class="form-control" required></td>
        </tr>
      
         <tr>
                    <td style="padding: 10px;">Hình</td>
                    <td >
                        <input type="file" class="form-control" name="hinh" accept="image/*">

                    </td>
                </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" class="btn btn-success" value="THÊM">
            </td>
        </tr>
    
    </table>

</form>

</body>
</html>

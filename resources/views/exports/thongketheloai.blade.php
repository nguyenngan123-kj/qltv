<!-- resources/views/exports/thongketheloai.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thống kê theo thể loại</title>
</head>
<body>
    <h2 style="text-align: center;">Thống kê số lượng sách theo thể loại</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Thể loại</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->theloai->tentl ?? 'Không xác định' }}</td>
                    <td>{{ $item->soluong }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

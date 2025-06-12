<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTL - Quản lý hình</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('phandauqly')
<div class="container mt-4">
    <form method="GET" action="{{ route('dh.index') }}">
        
    </form>
</div>

@if(isset($danghinh))
<h2 class="text-center">CẬP NHẬT</h2>
<form action="{{ route('dh.update', $danghinh->id_dh ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_dh" value="{{ $danghinh->id_dh }}">
        <table class="table table-bordered" style="justify-content: center;width: 60%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px;">TIÊU ĐỀ</td>
                <td><input name="tieude" type="text" value="{{ $danghinh->tieude }}" style="width: 100%; padding: 5px;"></td>
            </tr>
            
         <tr>
                    <td style="padding: 10px;">Hình</td>
                    <td >
                    @if (!empty($danghinh->hinh))
                        <img src="{{ asset($danghinh->hinh) }}" width="100"><br>
                    @endif

                        <input type="file" class="form-control" name="hinh" accept="image/*">

                    </td>
                </tr>
        <tr>

            <tr>
                <td colspan="2" style="text-align: center; padding: 15px;">
                    <input type="submit" name="submit" class="btn btn-primary" value="CẬP NHẬT">
                </td>
            </tr>
        </table>
    </div>
</form>
@endif

<div class="container mt-5">
    <h2 class="text-center">DANH SÁCH</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('dh.themhinh') }}" class="btn btn-success">THÊM HÌNH</a>
    </div>
    <table class="table table-bordered" style="width:90%;margin:auto;">
        <thead class="table-light">
            <tr>
                <th>Tiêu đề</th>
                <th>Hình</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds as $tl)
            <tr>
                <td>{{ $tl->tieude }}</td>
                <td>{{ $tl->hinh }}</td>
                <td>
                    <a href="{{ route('dh.edit', $tl->id_dh) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('dh.destroy', $tl->id_dh) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


</body>
</html>

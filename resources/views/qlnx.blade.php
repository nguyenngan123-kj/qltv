<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL Nhận Xét</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 @include('phandauqly')
 <div class="container mt-4">
    <form method="GET" action="{{ route('nhanxet.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào mã độc giả và mã sách" value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($nhanxet))
<h2 style="text-align: center;">CẬP NHẬT NHẬN XÉT</h2>

<form action="{{ route('nhanxet.update', $nhanxet->id_nx) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_nx" value="{{ $nhanxet->id_nx }}">
        <table class="table table-bordered" style="width: 60%;">
            <!-- <tr>
                <td>MÃ ĐỘC GIẢ</td>
                <td><input name="id_dg" type="number" value="{{ $nhanxet->id_dg }}" class="form-control"></td>
            </tr>
            <tr>
                <td>MÃ SÁCH</td>
                <td><input name="id_sach" type="number" value="{{ $nhanxet->id_sach }}" class="form-control"></td>
            </tr> -->

<tr>
    <td>ĐỘC GIẢ</td>
    <td>
        <select name="id_dg" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($ds_dg as $tg)
                <option value="{{ $tg->id_dg }}" {{ $tg->id_dg == $nhanxet->id_dg  ? 'selected' : '' }}>
                    {{ $tg->ten_dg}}
                </option>
            @endforeach
        </select>
    </td>
</tr>
<tr>
    <td>SÁCH </td>
    <td>
        <select name="id_sach" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($ds_s as $tg)
                <option value="{{ $tg->id_sach }}" {{ $tg->id_sach == $nhanxet->id_sach  ? 'selected' : '' }}>
                    {{ $tg->tensach}}
                </option>
            @endforeach
        </select>
    </td>
</tr>

            <tr>
                <td>NHẬN XÉT</td>
                <td><textarea name="nhanxt" class="form-control">{{ $nhanxet->nhanxt }}</textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                </td>
            </tr>
        </table>
    </div>
</form>
@endif

<h2 style="text-align:center;">DANH SÁCH NHẬN XÉT</h2>

<br>

<table class="table table-bordered" style="width:90%; margin:auto;">
    <thead class="table-light">
        <tr>
         
            <th>MÃ ĐỘC GIẢ</th>
            <th>MÃ SÁCH</th>
            <th>NHẬN XÉT</th>
            <th>HÀNH ĐỘNG</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ds_nhanxet as $nhanxet)
        <tr>
            
            <td>{{ $nhanxet->id_dg }}</td>
            <td>{{ $nhanxet->id_sach }}</td>
            <td>{{ $nhanxet->nhanxt }}</td>
            <td>
                <form action="{{ route('nhanxet.edit', $nhanxet->id_nx) }}" method="GET" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm">SỬA</button>
                </form>
                <form action="{{ route('nhanxet.destroy', $nhanxet->id_nx) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa nhận xét này?')">XÓA</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

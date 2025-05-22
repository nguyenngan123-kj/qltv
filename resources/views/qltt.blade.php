<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QLTT - Quản lý Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@if(isset($tintuc))
<h2 class="text-center">CẬP NHẬT TIN TỨC</h2>

<form action="{{ route('tintuc.update', $tintuc->id_tt) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 70%;">
            <tr>
                <td style="width: 20%;">Tiêu đề</td>
                <td><input name="tieude" type="text" value="{{ $tintuc->tieude }}" class="form-control"></td>
            </tr>
            <tr>
                <td>Trích dẫn</td>
                <td><textarea name="trichdan" class="form-control">{{ $tintuc->trichdan }}</textarea></td>
            </tr>
            <tr>
                <td>Link</td>
                <td><input name="link" type="text" value="{{ $tintuc->link }}" class="form-control"></td>
            </tr>
            <tr>
                <td>Ngày đăng</td>
                <td><input name="ngaydang" type="date" value="{{ $tintuc->ngaydang }}" class="form-control"></td>
            </tr>
            <tr>
                <td>Hình ảnh (link)</td>
                <td><input name="hinhtt" type="text" value="{{ $tintuc->hinhtt }}" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" value="CẬP NHẬT">
                </td>
            </tr>
        </table>
    </div>
</form>
@endif

<div class="container mt-5">
    <h2 class="text-center">DANH SÁCH TIN TỨC</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqltt.store') }}" class="btn btn-success">THÊM TIN TỨC</a>
    </div>

    <table class="table table-bordered" style="width: 100%; margin: auto;">
        <thead class="table-light">
            <tr>
                <th>Tiêu đề</th>
                <th>Trích dẫn</th>
                <th>Link</th>
                <th>Ngày đăng</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_tt as $tt)
            <tr>
                <td>{{ $tt->tieude }}</td>
                <td>{{ $tt->trichdan }}</td>
                <td><a href="{{ $tt->link }}" target="_blank">{{ $tt->link }}</a></td>
                <td>{{ $tt->ngaydang }}</td>
                <td><img src="{{ $tt->hinhtt }}" alt="Hình tin tức" style="width: 100px;"></td>
                <td>
                    <a href="{{ route('tintuc.edit', $tt->id_tt) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('tintuc.destroy', $tt->id_tt) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa tin tức này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

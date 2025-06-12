<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL SÁCH</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
       <style>
@media print {
    body * {
        visibility: hidden;
    }
    #print-area, #print-area * {
        visibility: visible;
    }
    #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    button, a, form {
        display: none !important;
    }
}
</style>

</head>
<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Đã có lỗi xảy ra:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<body>
@include('phandauqly')

<div class="container mt-4">
    <form method="GET" action="{{ route('sach.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào mã sách, tên sách " value="{{ $tukhoa ?? '' }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
@if(isset($sach))
<h2 style="text-align: center;">CẬP NHẬT SÁCH</h2>

<form action="{{ route('sach.update', $sach->id_sach) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div style="width: 100%; display: flex; justify-content: center;">
        <input type="hidden" name="id_sach" value="{{ $sach->id_sach }}">
        <table class="table table-bordered" style="width: 60%;">
            <tr><td>Mã sách</td><td><input name="masach" type="text" value="{{ $sach->masach }}" class="form-control"></td></tr>
            <tr><td>Tên sách</td><td><input name="tensach" type="text" value="{{ $sach->tensach }}" class="form-control"></td></tr>
           
<tr>
    <td>Tác giả</td>
    <td>
        <select name="id_tg" class="form-select" required>
            <option value="">-- Chọn tác giả --</option>
            @foreach($ds_tg as $tg)
                <option value="{{ $tg->id_tg }}" {{ $tg->id_tg == $sach->id_tg ? 'selected' : '' }}>
                    {{ $tg->tentg }}
                </option>
            @endforeach
        </select>
    </td>
</tr>
<tr>
    <td>Thể loại</td>
    <td>
        <select name="id_tl" class="form-select" required>
            <option value="">-- Chọn thể loại --</option>
            @foreach($ds_tl as $tl)
                <option value="{{ $tl->id_tl }}" {{ $tl->id_tl == $sach->id_tl ? 'selected' : '' }}>
                    {{ $tl->tentl }}
                </option>
            @endforeach
        </select>
    </td>
</tr>



            <tr><td>Nhà xuất bản</td><td><input name="nxb" type="text" value="{{ $sach->nxb }}" class="form-control"></td></tr>
            <tr><td>Ngày nhập</td><td><input name="ngaynhap" type="date" value="{{ $sach->ngaynhap }}" class="form-control"></td></tr>
            <tr><td>Số lượng</td><td><input name="soluong" type="number" value="{{ $sach->soluong }}" class="form-control"></td></tr>

           <tr>
                    <td>Hình sách</td>
                    <td>
                        @if (!empty($sach->hinhsach))
                            <img src="{{ asset($sach->hinhsach) }}" width="100"><br>
                        @endif
                        <input type="file" class="form-control" name="hinhsach" accept="image/*">

                    </td>
                </tr>

            <tr><td>Link</td><td><input name="link" type="text" value="{{ $sach->link }}" class="form-control"></td></tr>
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
    <h2 class="text-center">DANH SÁCH SÁCH</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqls') }}" class="btn btn-success">THÊM SÁCH</a>
    </div>
 <div class="mb-3 text-start ms-5">
       <button onclick="window.print()" class="btn btn-secondary">IN BẢNG</button>
    </div>
       <div id="print-area">
    <table class="table table-bordered" style="width:90%; margin:auto;">
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>ID TG</th>
                <th>ID TL</th>
                <th>NXB</th>
                <th>Ngày nhập</th>
                <th>Số lượng</th>
                <th>Hình</th>
                <th>Link</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ds_sach as $sach)
            <tr>
                <td>{{ $sach->masach }}</td>
                <td>{{ $sach->tensach }}</td>
                <td>{{ $sach->id_tg }}</td>
                <td>{{ $sach->id_tl }}</td>
                <td>{{ $sach->nxb }}</td>
                <td>{{ $sach->ngaynhap }}</td>
                <td>{{ $sach->soluong }}</td>
                <td><img src="{{ $sach->hinhsach }}" width="60" height="80"></td>
                <td><a href="{{ $sach->link }}" target="_blank">Xem</a></td>
                <td>
                    <a href="{{ route('sach.edit', $sach->id_sach) }}" class="btn btn-sm btn-warning">UP</a>
                    <form action="{{ route('sach.destroy', $sach->id_sach) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa sách này?')" class="btn btn-sm btn-danger">DEL</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
       </div>
</div>

</body>
</html>

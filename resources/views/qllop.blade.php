<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>QLLOP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  @if(isset($lop))
<h2 style="text-align: center;">CẬP NHẬT LỚP</h2>

<form action="{{ route('lop.update', $lop->id_lop) }}" method="POST">

  @csrf
    @method('PUT')
  <div style="width: 100%; display: flex; justify-content: center;">
    <input type="hidden" name="id_lop" value="{{ $lop->id_lop }}">
    <table class="table table-bordered" style="justify-content: center;width: 60%; border-collapse: collapse;">
      
      <tr>
        <td style="padding: 10px;">MÃ LỚP</td>
        <td><input name="malop" type="text" value="{{ $lop->malop }}" style="width: 100%; padding: 5px;"></td>
      </tr>
      <tr>
        <td style="padding: 10px;">TÊN LỚP</td>
        <td><input name="tenlop" type="text" value="{{ $lop->tenlop }}" style="width: 100%; padding: 5px;"></td>
      </tr>
      <tr>
        <td style="padding: 10px;">KHOA</td>
        <td><input name="khoa" type="text" value="{{ $lop->khoa }}" style="width: 100%; padding: 5px;"></td>
      </tr>
      <tr>
        <td style="padding: 10px;">NIÊN KHÓA</td>
        <td><input name="nienkhoa" type="text" value="{{ $lop->nienkhoa }}" style="width: 100%; padding: 5px;"></td>
      </tr>
      <tr>
        <td style="padding: 10px;">GVCN</td>
        <td><input name="gvcn" type="text" value="{{ $lop->gvcn }}" style="width: 100%; padding: 5px;"></td>
      </tr>
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
    <h2 style="text-align:center;">DANH SÁCH LỚP</h2>
    <div class="mb-3 text-start ms-5">
      <a href="{{ route('themqllop') }}" class="btn btn-success">THÊM LỚP</a>
    </div>
               <!-- dong -->
                <div class="container">
                <div class="row"><br></div>
                </div>
                <!--cai1-->
        <table class="table table-bordered" style="width:90%;margin:auto;">
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Khoa</th>
                <th>Niên khóa</th>
                <th>GVCN</th>
                <th>Hành động</th>
            </tr>
            @foreach($ds_lop as $lop)
            <tr>
                <td>{{ $lop->malop }}</td>
                <td>{{ $lop->tenlop }}</td>
                <td>{{ $lop->khoa }}</td>
                <td>{{ $lop->nienkhoa }}</td>
                <td>{{ $lop->gvcn }}</td>
                <td>
                  <a href="{{ route('lop.edit', $lop->id_lop) }}" class="btn btn-sm btn-warning">UP</a>
                  
                    <form action="{{ route('lop.destroy', $lop->id_lop) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa lớp này?')" class="btn btn-sm btn-danger">DEl</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
</body>
</html>
 <!-- <a href="{{ route('lop.edit', $lop->id_lop) }}">Sửa</a> -->
  <!-- <a href="{{ route('themqllop') }}">Thêm</a> -->
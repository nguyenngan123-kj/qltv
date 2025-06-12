<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL Mượn-Trả</title>
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
<body>
  @include('phandauqly')

  <div class="container mt-4">
    <form method="GET" action="{{ route('muontra.index') }}">
        <div class="row mb-3">
            <div class="col-md-10">
                <input class="form-control" type="text" name="tukhoa" placeholder="Nhập vào id độc giả và id sách" value="{{ $tukhoa ?? '' }}">
            </div>
           
            <div class="col-md-2">
                <button class="btn btn-outline-success w-100" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
  @if(isset($muontra))
    <h2 class="text-center mt-4">CẬP NHẬT MƯỢN-TRẢ</h2>
    <form action="{{ route('muontra.update', $muontra->id_mt) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="d-flex justify-content-center">
        <input type="hidden" name="id_mt" value="{{ $muontra->id_mt }}">
        <table class="table table-bordered w-75">
          
        <!-- <tr>
            <td class="p-2">ID ĐỘC GIẢ</td>
            <td><input name="id_dg" type="number" value="{{ $muontra->id_dg }}" class="form-control"></td>
          </tr>
          <tr>
            <td class="p-2">ID SÁCH</td>
            <td><input name="id_sach" type="number" value="{{ $muontra->id_sach }}" class="form-control"></td>
          </tr> -->
<tr>
    <td>ĐỘC GIẢ</td>
    <td>
        <select name="id_dg" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($ds_dg as $tg)
                <option value="{{ $tg->id_dg }}" {{ $tg->id_dg == $muontra->id_dg  ? 'selected' : '' }}>
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
                <option value="{{ $tg->id_sach }}" {{ $tg->id_sach == $muontra->id_sach  ? 'selected' : '' }}>
                    {{ $tg->tensach}}
                </option>
            @endforeach
        </select>
    </td>
</tr>


          <tr>
            <td class="p-2">NGÀY MƯỢN</td>
            <td><input name="ngaymuon" type="date" value="{{ $muontra->ngaymuon }}" class="form-control"></td>
          </tr>
          <tr>
            <td class="p-2">NGÀY TRẢ</td>
            <td><input name="ngaytra" type="date" value="{{ $muontra->ngaytra}}" class="form-control"></td>
          </tr>
          <tr>
            <td class="p-2">GHI CHÚ</td>
            <td><input name="ghichu" type="text" value="{{ $muontra->ghichu }}" class="form-control"></td>
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
    <h2 class="text-center">DANH SÁCH MƯỢN-TRẢ</h2>
    <div class="mb-3 text-start ms-5">
      <a href="{{ route('themqlmt') }}" class="btn btn-success">Thêm Mượn-Trả</a> 
    </div>
     <div class="mb-3 text-start ms-5">
       <button onclick="window.print()" class="btn btn-secondary">IN BẢNG</button>
    </div>
       <div id="print-area">
    <table class="table table-bordered w-90 mx-auto">
      <thead>
        <tr>
          <th>ID MT</th>
          <th>ID ĐG</th>
          <th>ID SÁCH</th>
          <th>NGÀY MƯỢN</th>
          <th>NGÀY TRẢ</th>
          <th>GHI CHÚ</th>
          <th>HÀNH ĐỘNG</th>
        </tr>
      </thead>
      <tbody>
      @foreach($ds_muontra as $muon)
        <tr>
          <td>{{ $muon->id_mt }}</td>
          <td>{{ $muon->id_dg }}</td>
          <td>{{ $muon->id_sach }}</td>
          <td>{{ $muon->ngaymuon }}</td>
          <td>{{ $muon->ngaytra }}</td>
          <td>{{ $muon->ghichu }}</td>
          <td>
            <a href="{{ route('muontra.edit', $muon->id_mt) }}" class="btn btn-sm btn-warning">Sửa</a>
            <form action="{{ route('muontra.destroy', $muon->id_mt) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa bản ghi mượn-trả?')">Xóa</button>
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

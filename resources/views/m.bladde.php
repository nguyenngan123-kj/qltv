<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL SÁCH</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
            <tr><td>ID Tác giả</td><td><input name="id_tg" type="number" value="{{ $sach->id_tg }}" class="form-control"></td></tr>
            <tr><td>ID Thể loại</td><td><input name="id_tl" type="number" value="{{ $sach->id_tl }}" class="form-control"></td></tr>
            <tr><td>Nhà xuất bản</td><td><input name="nxb" type="text" value="{{ $sach->nxb }}" class="form-control"></td></tr>
            <tr><td>Ngày nhập</td><td><input name="ngaynhap" type="date" value="{{ $sach->ngaynhap }}" class="form-control"></td></tr>
            <tr><td>Số lượng</td><td><input name="soluong" type="number" value="{{ $sach->soluong }}" class="form-control"></td></tr>
            
             <tr>
                    <td>Hình sách</td>
                    <td>
                        @if (!empty($sach->hinhsach))
                            <img src="{{ asset($sach->hinhsach) }}" width="100"><br>
                        @endif
                        <input type="file" name="hinhsach" class="form-control">
                    </td>
                </tr>
                

            <tr><td>Link</td><td><input name="link" type="url" value="{{ $sach->link }}" class="form-control"></td></tr>
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
    <h2 class="text-center">DANH SÁCH CÁC SÁCH</h2>
    <div class="mb-3 text-start ms-5">
        <a href="{{ route('themqls') }}" class="btn btn-success">THÊM SÁCH</a>
    </div>

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

</body>
</html>
// controller
<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Support\Facades\DB;
class QLSController extends Controller
{

    
    // Danh sách sách có tìm kiếm
    public function index(Request $request)
    {
        $tukhoa = $request->input('tukhoa');

        if ($tukhoa) {
            $ds_sach = Sach::where('masach', 'like', "%$tukhoa%")
                ->orWhere('tensach', 'like', "%$tukhoa%")
                ->orWhere('nxb', 'like', "%$tukhoa%")
                ->get();
        } else {
            $ds_sach = Sach::all();
        }

        return view('qls', compact('ds_sach', 'tukhoa'));
    }
    // Form sửa sách
    public function edit($id_sach)
    {
        $sach = Sach::findOrFail($id_sach);
        $ds_sach = Sach::all(); // nếu cần hiển thị danh sách
        return view('qls', compact('sach', 'ds_sach'));
    }

    // Cập nhật sách
  public function update(Request $request, $id_sach)
{
    $request->validate([
        'masach' => 'required|string|max:50',
        'tensach' => 'required|string|max:255',
        'id_tg' => 'required|integer',
        'id_tl' => 'required|integer',
        'nxb' => 'required|string|max:100',
        'ngaynhap' => 'required|date',
        'soluong' => 'required|integer|min:1',
        'link' => 'required|string|max:255',
        'hinhsach' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sach = Sach::findOrFail($id_sach);

    $data = $request->only([
        'masach', 'tensach', 'id_tg', 'id_tl', 'nxb', 'ngaynhap', 'soluong', 'link'
    ]);

    // ✅ Xử lý hình ảnh với đúng input name: hinhsach
    if ($request->hasFile('hinhsach')) {
        $file = $request->file('hinhsach');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Di chuyển ảnh vào thư mục public/hinhanh
        $file->move(public_path('hinhanh'), $filename);

        // Gán đường dẫn để lưu vào DB
        $data['hinhsach'] = 'hinhanh/' . $filename;
    }

    $sach->update($data);

    return redirect()->route('sach.index')->with('success', 'Cập nhật sách thành công!');
}

    // Xóa sách
    public function destroy($id_sach)
    {
        $sach = Sach::findOrFail($id_sach);
        $sach->delete();
        return redirect()->route('sach.index');
    }
   public function thongKeTheLoai()
{
    $data = Sach::select('id_tl', DB::raw('count(*) as soluong'))
        ->groupBy('id_tl')
        ->with('theloai')
        ->get();

 
 // Tạo mảng labels (tên thể loại) và counts (số lượng)
    $labels = [];
    $counts = [];

    foreach ($data as $item) {
        $labels[] = $item->theloai->tentl?? 'Không xác định';
        $counts[] = $item->soluong;
    }

    return view('tktheloaisach', [

     'labelsJson' => json_encode($labels),
        'countsJson' => json_encode($counts),
        'data' => ($data),
        
    ]); 
}
}

  



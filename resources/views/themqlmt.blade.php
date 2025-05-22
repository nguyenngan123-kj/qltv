<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QL MƯỢN TRẢ</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center my-4">FORM THÊM PHIẾU MƯỢN</h2>

    <form action="{{ route('themqlmt.store') }}" method="POST">
        @csrf
        
        <div class="d-flex justify-content-center">
            <table class="table table-bordered" style="width: 60%; border-collapse: collapse;">
                <tr>
                    <td class="align-middle px-3">ID ĐỘC GIẢ</td>
                    <td>
                        <input name="id_dg" type="number" class="form-control" placeholder="Nhập mã độc giả">
                    </td>
                </tr>
                <tr>
                    <td class="align-middle px-3">ID SÁCH</td>
                    <td>
                        <input name="id_sach" type="number" class="form-control" placeholder="Nhập mã sách">
                    </td>
                </tr>
                <tr>
                    <td class="align-middle px-3">NGÀY MƯỢN</td>
                    <td>
                        <input name="ngaymuon" type="date" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="align-middle px-3">NGÀY TRẢ</td>
                    <td>
                        <input name="ngaytra" type="date" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="align-middle px-3">GHI CHÚ</td>
                    <td>
                        <textarea name="ghichu" class="form-control" rows="3" placeholder="Ghi chú (nếu có)"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center py-3">
                        <button type="submit" class="btn btn-primary">THÊM PHIẾU</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>

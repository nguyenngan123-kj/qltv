
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>QLLOP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<h2 style="text-align: center;">FORM THÊM LỚP</h2>

<form action="{{ route('themqllop.store') }}" method="POST">
    @csrf
  <div style="width: 100%; display: flex; justify-content: center;">
  <table class="table table-bordered" style="justify-content: center;width: 60%; border-collapse: collapse;">
  
    <tr>
      <td style="padding: 10px;">MÃ LỚP</td>
      <td><input name="malop" type="text" value="" style="width: 100%; padding: 5px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">TÊN LỚP</td>
      <td><input name="tenlop" type="text" value="" style="width: 100%; padding: 5px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">KHOA</td>
      <td><input name="khoa" type="text" value="" style="width: 100%; padding: 5px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">NIÊN KHÓA</td>
      <td><input name="nienkhoa" type="text" value="" style="width: 100%; padding: 5px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">GVCN</td>
      <td><input name="gvcn" type="text" value="" style="width: 100%; padding: 5px;"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center; padding: 15px;">
        <input type="submit" name="submit" class="btn btn-primary" value="THÊM">
      </td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
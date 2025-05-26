use App\Models\MuonTra;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

public function thongKeNgay()
{
    // Ngày hiện tại
    $now = Carbon::now()->toDateString();

    // Truy vấn dữ liệu
    $data = DB::table('muontra')
        ->join('sach', 'sach.id_sach', '=', 'muontra.id_sach')
        ->join('tkdocgia', 'tkdocgia.id_dg', '=', 'muontra.id_dg')
        ->select(
            'sach.tensach',
            'tkdocgia.ten_dg',
            DB::raw("DATEDIFF('$now', muontra.ngaymuon) as songaymuon")
        )
        ->where('muontra.ghichu', 'LIKE', '%MƯỢN%')
        ->having('songaymuon', '>', 5)
        ->get();

    // Chuẩn bị dữ liệu
    $tensach = [];
    $ten_dg = [];
    $songaymuon = [];

    foreach ($data as $item) {
        $tensach[] = $item->tensach;
        $ten_dg[] = $item->ten_dg;
        $songaymuon[] = $item->songaymuon;
    }

    return view('sdgbd', [
        'tensach' => json_encode($tensach),
        'ten_dg' => json_encode($ten_dg),
        'songaymuon' => json_encode($songaymuon),
        'data' => $data,
    ]);
}

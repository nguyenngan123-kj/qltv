
public function thongKeTheLoai()
{
    $data = Sach::select('id_tl', DB::raw('count(*) as soluong'))
        ->groupBy('id_tl')
        ->with('theloai')
        ->get();

   $labels = ['Khoa học', 'Văn học', 'Toán học'];
$counts = [12, 9, 5];

$labelsJson = json_encode($labels);
$countsJson = json_encode($counts);

return view('sachbd', compact('labelsJson', 'countsJson'));


    return view('sachbd', [

         'labelsJson' => json_encode($labels->values()),
    'countsJson' => json_encode($counts->values())
    ]);
}
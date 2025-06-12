<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biểu đồ sách theo thể loại</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 400px;
            height: 400px;
            margin: auto;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 60%;
        }
        tr{
            text-align: center;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
     @include('phantk')
    <h2>Biểu đồ tròn - Thống kê số sách đã mượn</h2>
    <div id="chart-container">
        <canvas id="pieChart"></canvas>
    </div>

    {{-- Bảng thống kê --}}
    <h2>Bảng Thống kê số sách đã mượn</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đã mượn</th>
                <th>Còn lại</th>
            </tr>
        </thead>
        <tbody>
          @foreach(json_decode($tensach) as $index => $ten)
                <tr>
                    <td>{{ $ten }}</td>
                    <td>{{ json_decode($soluong)[$index] }}</td>
                    <td>{{ json_decode($damuon)[$index] }}</td>
                    <td>{{ json_decode($conlai)[$index] }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>

    <script>
        // Dữ liệu từ Controller
       let tensach = JSON.parse('{!! addslashes($tensach) !!}');
       let counts = JSON.parse('{!! addslashes($damuon) !!}');


        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: tensach,
                datasets: [{
                    label: 'Tên sách',
                    data: counts,
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                        '#FF9F40', '#E7E9ED', '#00A36C', '#8A2BE2', '#DC143C'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: { position: 'bottom' },
                    title: {
                        display: true,
                        text: 'Tổng số sách đã mượn '
                    }
                }
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biểu đồ thống kê số lượt mượn theo tháng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: 30px auto;
        }
        tr{
            text-align: center;
        }
        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 80%;
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
    <h2>Biểu đồ cột - Thống kê số lượt mượn theo tháng và tên sách</h2>
    <div id="chart-container">
        <canvas id="barChart"></canvas>
    </div>

    <h2>Bảng thống kê số lượt mượn theo tháng</h2>
       <div class="mb-3 text-start ms-5">
         <a href="{{ route('tktthang.export') }}" class="btn btn-success">Xuất Excel</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Tháng</th>
                <th>Số lượt mượn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tensach }}</td>
                    <td>Tháng {{ $item->thang }}</td>
                    <td>{{ $item->soluot }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const tensach = JSON.parse('{!! addslashes($tensach) !!}');
        const thang = JSON.parse('{!! addslashes($thang) !!}');
        const soluot = JSON.parse('{!! addslashes($soluot) !!}');

        // Tạo nhãn mới kết hợp tên sách và tháng: "Tên sách (Tháng X)"
        const labels = tensach.map((sach, index) => `${sach} (${thang[index]})`);

        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượt mượn',
                    data: soluot,
                    backgroundColor: '#36A2EB',
                    borderColor: '#2a91d1',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Số lượt mượn'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Sách (Tháng)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Số lượt mượn sách theo từng tháng'
                    }
                }
            }
        });
    </script>
</body>
</html>

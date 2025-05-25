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
    <h2>Biểu đồ tròn - Thống kê sách theo thể loại</h2>
    <div id="chart-container">
        <canvas id="pieChart"></canvas>
    </div>

    {{-- Bảng thống kê --}}
    <h2>Bảng thống kê số lượng sách theo thể loại</h2>
    <table>
        <thead>
            <tr>
                <th>Thể loại</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($labelsJson) as $index => $label)
                <tr>
                    <td>{{ $label }}</td>
                    <td>{{ json_decode($countsJson)[$index] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Dữ liệu từ Controller
        let labels = JSON.parse('{!! addslashes($labelsJson) !!}');
        let counts = JSON.parse('{!! addslashes($countsJson) !!}');

        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng sách',
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
                        text: 'Phân bố số lượng sách theo thể loại'
                    }
                }
            }
        });
    </script>
</body>
</html>

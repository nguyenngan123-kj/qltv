<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biểu đồ thống kê số ngày mượn quá hạn</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: 30px auto;
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
    <h2>Biểu đồ cột - Thống kê người mượn sách quá hạn</h2>
    <div id="chart-container">
        <canvas id="barChart"></canvas>
    </div>

    <h2>Bảng thống kê người mượn sách quá hạn ( > 5 ngày )</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Tên độc giả</th>
                <th>Số ngày mượn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tensach }}</td>
                    <td>{{ $item->ten_dg }}</td>
                    <td>{{ $item->songaymuon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let tensach = JSON.parse('{!! addslashes($ten_dg) !!}');
        let songaymuon = JSON.parse('{!! addslashes($songaymuon) !!}');

        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: tensach,
                datasets: [{
                    label: 'Số ngày mượn quá hạn',
                    data: songaymuon,
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
                            text: 'Số ngày mượn'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tên độc giả'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Số ngày mượn sách quá hạn theo từng độc giả'
                    }
                }
            }
        });
    </script>
</body>
</html>

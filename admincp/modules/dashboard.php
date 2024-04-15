<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Store Dashboard</title>
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
    <!-- Thêm các thư viện cần thiết cho biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Shoe Store Dashboard</h1>

    <div>
        <!-- Hiển thị thống kê -->
        <h2>Statistics</h2>
        <ul>
            <li>Total Revenue: $XXXXX</li>
            <li>Total Sold Products: XXXX</li>
            <li>Total Orders: XXXX</li>
        </ul>
    </div>

    <div>
        <!-- Biểu đồ cột -->
        <h2>Sales Chart</h2>
        <canvas id="salesChart" width="800" height="400"></canvas>
    </div>

    <script>
        // Dữ liệu biểu đồ cột
        const salesData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Monthly Sales',
                data: [1000, 1500, 2000, 2500, 3000, 3500],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Cấu hình biểu đồ cột
        const salesConfig = {
            type: 'bar',
            data: salesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render biểu đồ cột
        const salesChart = document.getElementById('salesChart').getContext('2d');
        new Chart(salesChart, salesConfig);
    </script>
</body>
</html>
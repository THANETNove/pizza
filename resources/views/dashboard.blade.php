@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="total-price">
                    Total Price All: $ {{ number_format($totalSum) }}
                </div>
                @php
                    $totalCount = array_sum($namePiCount);
                @endphp
                <div class="total-price">
                    Count Name All: {{ number_format($totalCount) }}
                </div>
                <canvas id="myChart" width="400" height="400"></canvas>

            </div>
        </div>
    </div>

    <script>
        // สร้างข้อมูลสำหรับแสดงในกราฟ
        var data = {
            labels: <?php echo json_encode(array_keys($namePiCount)); ?>,
            datasets: [{
                label: 'Count of name',
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // สีของแท่งกราฟ
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: <?php echo json_encode(array_values($namePiCount)); ?>,
            }, {
                label: 'Total Price per name',
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // สีของแท่งกราฟ
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: <?php echo json_encode(array_values($totalPricePerNamePi)); ?>,
            }]
        };

        // กำหนดตัวแปร options เพื่อกำหนดค่าต่างๆ ของกราฟ
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // สร้างกราฟแท่ง
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
        document.getElementById('myChart').parentElement.classList.add('cursor');
    </script>
@endsection

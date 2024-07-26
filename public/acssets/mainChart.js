const dataSets = [
    [500000, 300000, 1000000, 200000, 100000, 600000, 400000, 310000, 340000, 220000, 410000, 1000000],
    [50, 30, 10, 20, 10, 6, 4, 31, 34, 22, 41, 10],
    [5, 30, -10, 20, 10, 0, 40, 31, 34, 22, 41, 10]
];

// Function to create chart configuration
function createChartConfig(data) {
    return {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            datasets: [{
                data: data,
                borderColor: 'rgb(222, 222, 222)',
                backgroundColor: 'rgb(222, 222, 222)',
                borderWidth: 3,
                tension: 0.4, // Makes the line curvy
                fill: false // Do not fill the area under the line
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgba(255, 99, 132, 1)'
                    }
                },
            },
            scales: {
                x: {
                    display: false,
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    display: false,
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        display: false
                    }
                }
            },
            elements: {
                point: {
                    radius: 3, // Hide the points on the line
                    backgroundColor: 'rgb(222, 222, 222)',
                    borderColor: 'rgba(255, 99, 132, 1)'
                }
            }
        }
    };
}

const charts = ['myLineChart', 'myLineChart1', 'myLineChart2'];
dataSets.forEach((data, index) => {
    new Chart(
        document.getElementById(charts[index]),
        createChartConfig(data)
    );
});

// biểu đồ tròn
  const data3 = {
    labels: ['Danh mục 1', 'Danh mục 2', 'Danh mục 3'],
    datasets: [{
      data: [170, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
    }]
  };

  // Thiết lập các tùy chọn cho biểu đồ
  const config3 = {
    type: 'doughnut',
    data: data3,
    options: {
        cutoutPercentage: 70, 
    }
  };

  // Vẽ biểu đồ trên canvas có id là 'myPieChart'
  var myPieChart = new Chart(
    document.getElementById('myPieChart'),
    config3
  );

  //biểu đồ tổng thu nhập




function drawChartEmployes(sales){
    document.getElementById('charEmployesSales').innerHTML= ''
    let ctx = document.getElementById('charEmployesSales').getContext('2d');
    
    let labels = [];
    let salesByEmpoloye = []
    sales.forEach(sale => {
        labels.push(sale.employeeName)       
        salesByEmpoloye.push(sale.salesByEmploye)       
    })

    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Número de ventas',
                data: salesByEmpoloye,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function drawChartSales(sales){
    let ventasByDay = []
    let labels= []
    let amount = []

    sales.forEach(sale => {
        if(ventasByDay[sale.created_at.split(" ")[0]]){
            ventasByDay[sale.created_at.split(" ")[0]]++
        }else{
            ventasByDay[sale.created_at.split(" ")[0]] = 1
        }
    })

    for(let v in ventasByDay){
        labels.push(v)
        amount.push(ventasByDay[v])

    }
      const data = {
        labels: labels,
        datasets: [{
          label: 'ventas',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: amount,
        }]
      };

    const config = {
        type: 'line',
        data,
        options: {}
      };

    let salesChart = new Chart(
        document.getElementById('salesChart'),
        config
      );



}
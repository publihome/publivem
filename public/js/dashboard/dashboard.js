let url = 'http://localhost:8000/api'
const formDate = document.querySelector('#formDate')
let toInput = document.getElementById('to')
let fromInput = document.getElementById('from')
let allSales = document.getElementById('allSales')
let allExpenses = document.getElementById('allExpenses')

function getDateToday(){
    let today = new Date()
    
    let Y = today.getFullYear('YYYY')
    let M = today.getMonth() < 10 ? `0${today.getMonth()}` : today.getMonth() 
    let D = today.getDate() < 10 ? `0${today.getDate()}` : today.getDate() 
    let todayreturn = `${Y}-${M}-${D}` 
    
    return todayreturn
}


formDate.addEventListener('submit',(e) => {
    e.preventDefault()
    let formData = new FormData(formDate)
    getData(formData)
})


function postSalesNum(employees){
    let sales = 0;
    console.log(employees)
    employees.forEach(employe => {
        sales += employe.salesByEmploye
    });
    console.log(sales)
    document.getElementById("numSales").innerHTML = sales
}


function postSales(totalSales, totalExpenses){
    allSales.innerHTML = ""
    allExpenses.innerHTML = ""
    console.log(totalSales)
    console.log(totalExpenses[0].Expense)
    allSales.innerHTML += '<i class="fas fa-caret-up text-success"></i> '
    // allSales.style.color += 'green'
    allSales.innerHTML += totalSales[0].amountAll != null ? "$ "+  totalSales[0].amountAll : "$ "+ 0
    allExpenses.innerHTML += '<i class="fas fa-caret-down"></i> '
    allExpenses.innerHTML +=  totalExpenses[0].Expense != null  ? "$ "+ totalExpenses[0].Expense : "$ "+ 0
}

function getData(formData){
            
    fetch(`${url}/dashboard`,{
        body:formData,
        method: 'POST',
    })
    .then(response =>response.json())
    .then(data => {
        console.log(data)
        postSalesNum(data.employees)
        postSales(data.totalSales, data.totalExpenses)
        drawChartEmployes(data.employees)
        drawChartSales(data.sales)
    })
}





 
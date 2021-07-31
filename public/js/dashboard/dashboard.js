let url = 'http://localhost:8000/api'
const formDate = document.querySelector('#formDate')
let toInput = document.getElementById('to')
let fromInput = document.getElementById('from')
let allSales = document.getElementById('allSales')
let allExpenses = document.getElementById('allExpenses')
let inputsForm = document.querySelectorAll('.form-control')


inputsForm.forEach(input => {
    input.addEventListener('click',(e)=> {
        e.target.classList.remove('is-invalid')
    });
})

function getDateToday(){
    let today = new Date()
    
    let Y = today.getFullYear('YYYY')
    let M = today.getMonth() < 10 ? `0${today.getMonth()}` : today.getMonth() 
    let D = today.getDate() < 10 ? `0${today.getDate()}` : today.getDate() 
    let todayreturn = `${Y}-${M}-${D}` 
    
    return todayreturn
}


function inputIsValid(input){
    let inputsInvalids = 0
    if(Array.isArray(input)){
        input.forEach(element => {
            if(element.value == ""){
                element.classList.add('is-invalid')
                inputsInvalids++
            }
        });
    }
    if(input == ""){
        element.classList.add('is-invalid')
        inputsInvalids++
    }
    if( inputsInvalids > 0 ){
        Swal.fire('algunos campos no se rellenaron correctamente')
        return false;
    }

    if(fromInput.value > toInput.value){
        Swal.fire('las fechas son incorrectas')
        return false
    }

    return true
}


formDate.addEventListener('submit',(e) => {
    e.preventDefault()
    if(!inputIsValid([fromInput, toInput])){
        return 0;
    }
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
    allSales.innerHTML += totalSales[0].amountAll != null ? "$ "+  totalSales[0].amountAll : "$ "+ 0
    allExpenses.innerHTML += '<i class="fas fa-caret-down"></i> '
    allExpenses.innerHTML +=  totalExpenses[0].Expense != null  ? "$ "+ totalExpenses[0].Expense : "$ "+ 0
}

function getData(formData){
    document.getElementById('loader').style.display = 'block'
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
        document.getElementById('dashboard').classList.remove('d-none')
        document.getElementById('loader').style.display = 'none'

    })
}





 
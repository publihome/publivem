const selectEmployee = document.getElementById('employee_id')
const employeesUrl = "http://localhost:8000/api/employees"
const expensesUrl = "http://localhost:8000/api/expenses"
const btnEditExpense = document.querySelectorAll(".btn-editExpense")
let selectedId


function getEmployees(){
    fetch(employeesUrl)
    .then(response => response.json())
    .then(employees => pushEmployeesOnselect(employees))
    
}


function pushEmployeesOnselect(employees){
    employees.forEach(employee => {
        console.log(employee)
        selectEmployee.innerHTML += `
        <option value="${employee.id}">${employee.name} ${employee.lastname}</option>
        `
    });

}

btnEditExpense.forEach(element => {
    element.addEventListener("click", (e)=> {
        
        console.log(element.getAttribute("id"))
        selectedId = element.getAttribute("id")
        const formExpenses = document.getElementById("formExpenses")
        const method = document.getElementById("method")
        formExpenses.removeAttribute("action")
        formExpenses.setAttribute("action", `/expenses/${selectedId}`)
        method.innerHTML = "<input type='hidden' name='_method' value='PATCH'>"
        getDataEmployee()
    })
});


function getDataEmployee(){
    fetch(`${expensesUrl}/${selectedId}`)
    .then(response => response.json())
    .then(expenses => putExpenseDataOnForm(expenses))
}

function putExpenseDataOnForm(expenses){
    for(let i in expenses){
        console.log(expenses[i])
        document.getElementById(i) ? document.getElementById(i).value = expenses[i] : ""
    }
}



getEmployees()
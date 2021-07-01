let modalEmployees = document.getElementById("modalFormEmployees")
const urlEmployees = "http://localhost:8000/api/employees"
let btn = document.querySelectorAll(".btn-edit"); 
let selectedId;     

btn.forEach(element => {
    element.addEventListener("click", (e)=> {
        
        console.log(element.getAttribute("id"))
        selectedId = element.getAttribute("id")
        const formEmployees = document.getElementById("formEmployees")
        const method = document.getElementById("method")
        formEmployees.removeAttribute("action")
        formEmployees.setAttribute("action", `/employees/${selectedId}`)
        method.innerHTML = "<input type='hidden' name='_method' value='PATCH'>"

        getDataEmployee()
    })
});

function getDataEmployee(){
    fetch(`${urlEmployees}/${selectedId}`)
    .then(response => response.json())
    .then(employee => putDataEmployee(employee))
}

function putDataEmployee(data){
    for(let i in data ){
        document.getElementById(i) ? document.getElementById(i).value = data[i] : ""
    }
}

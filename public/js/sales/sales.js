const url_base = "http://localhost:8000" 
const urlApi = `${url_base}/api`
const thead = document.getElementById('thead');
const tBody = document.getElementById('tBody');
const loader = document.getElementById('loader')

const date = new Date()
console.log(date)

function getSales(){
    loader.style.display = "block"
    fetch(`${urlApi}/getSales`)
    .then(response => response.json())
    .then(sales => putDataOnTableIndex(sales))
}

function putDataOnTableIndex(sales){
    console.log(sales)
    if(sales == ''){
        console.log("no existen resultados");
        return 0
    } 
    
    thead.innerHTML += `
        <tr>
        <th>Order</th>
        <th>Cliente</th>
        <th>Vendedor</th>
        <th>Monto</th>
        <th>Pagado</th>
        <th>Forma de pago</th>
        <th>Fecha</th>
        <th>Opciones</th>
        </tr>
    `

    
    
    sales.data.forEach(element => {
        let bgTr = checkBgtable(parseInt(element.advance),parseInt(element.amount_all))
        tBody.innerHTML += `
            <tr class="${bgTr}">
            <td>${element.order}</td>
            <td>${element.client_name}</td>
            <td>${element.employe}</td>
            <td>${element.amount_all}</td>
            <td>${element.advance}</td>
            <td>${element.payment_format}</td>
            <td>${element.created_at}</td>
            <td><a class="btn btn-info text-white" href="${url_base}/sales/${element.id}/edit"><i class="fa fa-eye"></i></a></td>
            <tr>
        `
    });

    loader.style.display = "none"

       
}

function checkBgtable(advance, amount_all){
    if(advance == 0){
        return 'bg-blue'
    }
    if(advance == amount_all){
        return 'bg-red'
    }else{
        return 'bg-gray'
    }
    
}



window.addEventListener('load',getSales)
const url_base = "http://localhost:8000" 
const urlApi = `${url_base}/api`
const thead = document.getElementById('thead');
const tBody = document.getElementById('tBody');
const loader = document.getElementById('loader')
let  form = document.getElementById('formDate');

let totalMoneyGenerate = 0;
let totalMoneyAdvance = 0;


form.addEventListener('submit',(e) => {
    e.preventDefault()
    let fomData = new FormData(form)
    getSales(fomData)
})




function getSales(date = ""){
    loader.style.display = "block"
    if(date != ""){
        fetch(`${urlApi}/getSales`,{
            method:'post',
            body: date,
        })
        .then(response => response.json())
        .then(sales => putDataOnTableIndex(sales))

    }else{
        fetch(`${urlApi}/getSales`)
        .then(response => response.json())
        .then(sales => putDataOnTableIndex(sales.data))
    }
}

function putDataOnTableIndex(sales){
    totalMoneyAdvance = 0
    totalMoneyGenerate = 0
    thead.innerHTML = ""
    tBody.innerHTML = ""
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
    console.log(sales)
    if(sales == ''){
        tBody.innerHTML = "No hay ventas"  
        loader.style.display = "none"
        return 0
    } 
    
    

    sales.forEach(element => {
        totalMoneyGenerate += parseFloat(element.amount_all)
        totalMoneyAdvance += parseFloat(element.advance)

        let bgTr = checkBgtable(parseInt(element.advance),parseInt(element.amount_all))
        tBody.innerHTML += `
            <tr class="${bgTr}">
            <td>${element.order}</td>
            <td>${element.client_name}</td>
            <td>${element.employe}</td>
            <td>$ ${element.amount_all}</td>
            <td>$ ${element.advance}</td>
            <td>${element.payment_format}</td>
            <td>${element.created_at}</td>
            <td><a class="btn btn-info text-white" href="${url_base}/sales/${element.id}/edit"><i class="fa fa-eye"></i></a></td>
            <tr>
        `
    });

    document.getElementById("total").innerHTML = '$ '+ totalMoneyGenerate
    document.getElementById("totaladvance").innerHTML = '$ '+ totalMoneyAdvance
       
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



window.addEventListener('load',getSales())
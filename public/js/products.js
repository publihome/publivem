
const table= document.getElementById('table');
let form = document.getElementById("formAddProduct")
let modal = document.getElementById("modalForm")
let myModal = new bootstrap.Modal(modal)
let btnAdd = document.getElementById('btn_add')

const path = window.location.href
let c = path.lastIndexOf('/')
let id_category = path.slice(c+1,c+2)
let urlbase = "http://localhost:8000/api/products" 
let btnEdit 
let id_selected
let productsdata = []
const TableEsp = {
    "name": "Nombre",
    "price_men": "Precio",
    "price_may": "Precio mayoreo",
    "unit": "Unidad",
    "descripcion": "Descripcion",
    "aplicaciones": "Aplicaciones",
    "entregamos": "Entregamos",
    "cliente_proporciona": "Cliente proporciora",
    "Opciones": "Opciones",
}

function clearInput(){
    let inputs = document.querySelectorAll('.form-control')
    inputs.forEach(input => {
        input.value = "" 
    });
}

form.addEventListener('submit', (e) => {
    e.preventDefault()
    let formdata = new FormData(form)  
    formdata.set("category_id", id_category)
    if(e.target.id == "formAddProduct"){
        sendInfo(formdata)
    }
    if(e.target.id == "formEditProduct"){
        updateData(formdata)
    }

})

btnAdd.addEventListener('click', (e) => {
    e.preventDefault()
    document.querySelector(".form").setAttribute("id", "formEditProduct")
    clearInput()
    myModal.show()
})

function sendInfo(formData){
    
    fetch(urlbase,{
        method: 'post',
        body: formData,
        Headers:{
            'Content-Type': 'application/json'
        },
    })
    .then(res => res.json()) 
    // .then(data => console.log(data)) 
    .then(data => getProductsByCategory()) 

     myModal.hide()
}

function updateData(formData){
    formData.set('_method','put')
    
    fetch(`${urlbase}/${id_selected}`,{
        method: 'post',
        body: formData,
      
    })
    .then(resp => resp.json()) 
    .then(data => console.log(data)) 
    myModal.hide()
}

function getProductsByCategory(){
    document.getElementById('loader').style.display = "block"

    fetch(`${urlbase}/${id_category}`)
    .then(response => response.json())
    .then(data => {
    productsdata = joinData(data)
    if(productsdata == ""){
        document.getElementById('loader').style.display = "none"

        return 0;
    }
    document.getElementById('loader').style.display = "none"


        createTable()
    })

}


function joinData(data){
  
    const {products, attributes} = data
    for(let p = 0; p<products.length; p++){
        for(let a = 0; a<attributes.length; a++){
            if(attributes[a].id == products[p].id){
                products[p][attributes[a]["attributeName"]] = attributes[a]["value"]
            }
        }
    }

    return products
    

}


function createTable(){
    let tr = document.getElementById("tr")
    tr.innerHTML= ""
    for(let index in productsdata[0]){
                tr.innerHTML += `
                <th>
                ${
                    TableEsp[index] != undefined && productsdata[0][index] != null 
                    ? TableEsp[index] 
                    : "" 
                }
                </th>
                `
                // console.log(TableEsp[index] != undefined && productsdata[0][index] != null ?)
    }
    tr.innerHTML += `<th>opciones</th>`
    createBodyTable()
     
}

function createBodyTable(){
    let tbody = document.getElementById("tBody")
    let content = ""

    for(let f = 0 ; f < productsdata.length; f++){
       content += "<tr>"
        for(let prod in productsdata[f]){
            
            content += `
            <td>
            ${TableEsp[prod] != undefined &&  productsdata[f][prod] != null
            ? productsdata[f][prod]
            : ""
            }
            </td>`
        }
        content += `<td>
        <button class="btn btn-warning btn-sm btn-editProduct text-white"  onclick="editModal(${productsdata[f]["id"]})" data-bs-toggle="modal" data-bs-target="#modalForm"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="deleteProduct(${productsdata[f]["id"]})" ><i class="fas fa-trash"></i></button>
        </td>`
        content += "</tr>"    
    }
     tbody.innerHTML = content
     document.getElementById("loader").style.display = "none"

}

function editModal(id){
    id_selected = id
    fetch(`${urlbase}/${id_category}/${id}`)
    .then(response => response.json())
    .then(data => {
        let info = joinData(data)    
        pushDataOnForm(info)
    })
}

let frmupdate 

function pushDataOnForm(product){
    for(let i in product[0]){
        document.getElementById(i) ? document.getElementById(i).value = product[0][i]: ""
        document.querySelector(".form").setAttribute("id", "formEditProduct")
    }   
    form = document.getElementById("formEditProduct")
  
}


function deleteProduct(id){
    fetch(`${urlbase}/${id}`,{
        method: 'DELETE',
        Headers:{
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(res => getProductsByCategory())
}


getProductsByCategory()


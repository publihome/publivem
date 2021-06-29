const table= document.getElementById('table');
let form = document.querySelector("#formAddProduct")
const path = window.location.href
let c = path.lastIndexOf('/')
let id_category = path.slice(c+1,c+2)
console.log(form)
let urlbase = "http://localhost:8000/api/products" 
let productsdata = []
const TableEsp = {
    "name": "Nombre",
    "price_men": "Precio",
    "price_may": "Precio mayoreo",
    "unit": "Unidad",
    "descripcion": "Descripcion",
    "aplicaciones": "Aplicaciones",
}

form.addEventListener('submit', (e) => {
    e.preventDefault()
    let formdata = new FormData(form)
    formdata.set("category_id", id_category)
    sendInfo(formdata)

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
    .then(data => console.log(data)) 
}

function getProductsByCategory(){
    fetch(`${urlbase}/${id_category}`)
    .then(response => response.json())
    .then(data => joinData(data))

   
}


function joinData(data){
    // productsdata = [...data.products, ...data.attributes]
    const {products, attributes} = data
    for(let p = 0; p<products.length; p++){
        for(let a = 0; a<attributes.length; a++){
            if(attributes[a].id == products[p].id){
                products[p][attributes[a]["attributeName"]] = attributes[a]["value"]
            }
        }
    }
    productsdata = products;
    
    createTable()

}


function createTable(){
    let tr = document.getElementById("tr")
    let tbody = document.getElementById("tBody")
    for(let index in productsdata[0]){
                tr.innerHTML += `
                <th>${TableEsp[index] != undefined ? TableEsp[index] : "" }</th>
                `
    }

    for(let i=0; i<productsdata.length; i++){
        console.log(productsdata[i].id)
    }

    // let content = ""
    // for(let f = 0 ; f < productsdata.length; f++){
    //    content += "<tr>"
    //     for(let prod of productsdata[f]){
    //         console.log(prod)
    //     }
    //     content += "</tr>"    
    // }
    //  tbody.innerHTML = content
   

     console.log(productsdata)
}



getProductsByCategory()


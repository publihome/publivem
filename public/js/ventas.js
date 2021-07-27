let productId = document.getElementById("product_id")
const widthInput = document.getElementById('width')
const heightInput = document.getElementById('height')
const urlCategory = "http://localhost:8000/api/products"
const urlSales = "http://localhost:8000/api/sales"
urlApi = "http://localhost:8000/api"
let productstable = []
let products
let price_all = 0

function getProductsByCategoryId(getProductsByCategoryId){
    fetch(`${urlCategory}/${getProductsByCategoryId}`)
        .then(response => response.json())
        .then(data => {
            products = joinData(data)
            putProductsonProductsSelect()
        } )
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


function putProductsonProductsSelect(){
    productId.innerHTML = ""
    console.log(products)
    if(products != ""){
        products.forEach(product => {
            let option = document.createElement('option')
            option.value = product.id
            option.textContent = product.name
            productId.appendChild(option)
        });
    }else{
        let option = document.createElement('option')
        option.value = ""
        option.textContent = "No hay productos"
        productId.appendChild(option)
    }
}


function getPriceAll(){
    let price = 0
    for(let i=0; i<productstable.length; i++){
        productstable[i].forEach(element => {
            price = price + parseFloat(element.price_all)
        })
    }
    console.log(price) 
    price_all = price
    document.getElementById("total").innerHTML = `$${price_all}`
    document.getElementById("total").classList.add("text-success")
}


function putDataOnTable(){
    const tbody = document.getElementById("tBody")
    console.log(productstable)
    tbody.innerHTML = ""
    for(let  i = 0; i< productstable.length; i++){
        productstable[i].forEach(product => {
            tbody.innerHTML += `
            <tr>
               <td> ${product.name} </td>
               <td> ${product.height == undefined ? "No aplica" : product.height +"x"+ product.width} </td>
               <td> ${product.amount}</td>
               <td> $${product.price}</td>
               <td> $${product.price_all}</td>
            </tr>
            `
        })
    }
}

function getTotalPrice(product){
    console.log(product)
    let objPrices = {} 

    if(product.height != undefined && product.papel_id == null){
        let height = parseFloat(heightInput.value)
        let width = parseFloat(widthInput.value)
        objPrices.price_all = height * width * parseFloat(product.price_men) * product.amount
    }else{
        objPrices.price_all = parseFloat(product.price_men) * product.amount
    }
    objPrices.price = parseFloat(product.price_men)
    return objPrices
}


let both_sidesInput = document.getElementById("both_sides");
function getTotalPricetoPapel(product){
    let price;
    if( both_sidesInput.value == ""){
        console.log("campo obligatorio")
        return 0
    }
    if(product.amount.value > product.pieces_may){
        if(both_sidesInput.value == 2){
            price = product.price_both_sides_may
        }else{
            price = product.price_front_may
        }
    }else{
        if(both_sidesInput.value == 1){
            price = product.price_both_sides_men
        }else{
            price = product.price_front_men
        }
    }
    console.log(price * product.amount)

        return {
            price_all: price * product.amount,
            price: price
        }
}


function getProductInfo(){
   return products.filter(element => {       
        if(element.id == productId.value){
            element.amount = parseInt(document.getElementById('amount').value)
            heightInput.value != "" ? element.height = parseFloat(heightInput.value) : ""
            widthInput.value != "" ? element.width = parseFloat(widthInput.value) : ""
            if(element.category_id == 6){
                const { price, price_all } = getTotalPricetoPapel(element)
                element.price_all = price_all
                element.price = price
            }else{
                const {price, price_all } = getTotalPrice(element)
                element.price_all = price_all
                element.price = price
            }
            element.sides = both_sidesInput.value
            console.log(element)
            return element
        }
    })
}




function postData(formData){
    fetch(`${urlSales}`,{
       Headers: {
           'Content-Type': 'application/json'
       } ,
       body:formData,
       method: 'post'
    })
    .then(response => response.json())
    .then(data => responsePostSale(data))

}

function responsePostSale(data){
    const inputsForm = document.querySelectorAll(".form-control");
    
    inputsForm.forEach(element => {
        element.value = ""
        productstable = []
        window.tBody.innerHTML = ""
        price_all = 0
        document.getElementById("total").innerHTML = 0
        pushMessage()
    });
}

function pushMessage(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-center',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        background: '#000'
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Venta generada'
      })
}

function inputIsEmpty(input){
    let existInputEmpty =  false
    if(input == undefined) return existInputEmpty

    if(Array.isArray(input)){
        if(category_id.value == 5 || category_id.value == 6){
            input = input.filter(element => element != "height" && element != "width" )
        }
        if(category_id.value == 6){
            input.push('both_sides')
        }

        // return 0
  
        input.forEach(element => {
            let input = document.getElementById(element)
            console.log(element)
            if(input.value == ''){
                input.classList.add('is-invalid')
                existInputEmpty = true
            }else{
                input.classList.remove('is-invalid')
            }
        });
    }else{
        document.getElementById(input).classList.add('is-invalid')
        existInputEmpty = true
    }
    console.log(input);

    return existInputEmpty;
}








const category_id = document.getElementById('category_id')
const btnAdd = document.getElementById('add')
const btnAddSale = document.getElementById('addSale')
let inputsToValidate = ["product_id","category_id", "amount", 'height', 'width']
const formSales = document.getElementById('formVenta')





category_id.addEventListener("change", (e)=> {
    let val = e.target.value 
    if(val == 0){
        return 0;
    } 
    if(val == 6 || val == 5){
        hideHeightAndWidth()
        if(val == 6){
            document.getElementById("both_sidesDiv").classList.remove("d-none")
        }    
    }else{
        showHeightAndWidth()  
        
    }

    console.log(val)
    getProductsByCategoryId(val)
})

btnAdd.addEventListener('click', (e)=> {
    e.preventDefault()
    
    if(inputIsEmpty(inputsToValidate)){
        Swal.fire('Debes rellenar al menos las cajas marcadas')
        return 0;
    } 

    let productData = getProductInfo()
    
    productstable.push(productData)
    getPriceAll()
    putDataOnTable()
    clearImputs()
})

formSales.addEventListener('submit', function(e){
    e.preventDefault()
    if(productstable.length == 0) {
        console.log("debes insertar algun producto")
        Swal.fire("Debes agregar almenos un producto")
        return 0
    }
    if(inputIsEmpty(['order','advance','payment_format','client_name'])){
        Swal.fire("rellana las cajas marcadas")
        return 0
    }
    let formData = new FormData(formSales)
    formData.set('productsData', JSON.stringify(productstable))
    formData.set('amount_all', price_all)
    postData(formData)
})

function showHeightAndWidth(){
    document.getElementById('heightDiv').style.display = "block"
    document.getElementById('widthDiv').style.display = "block"
    document.getElementById("both_sidesDiv").classList.add("d-none")

}

function hideHeightAndWidth(){
    document.getElementById('heightDiv').style.display = "none"
    document.getElementById('widthDiv').style.display = "none"
    document.getElementById("both_sidesDiv").classList.add("d-none")
}


function clearImputs(){
    document.getElementById("category_id").value = ""
    document.getElementById("product_id").value = ""
    document.getElementById("amount").value = ""
    document.getElementById("height").value = ""
    document.getElementById("width").value = ""

}


function removeIsValidClass(){
    let inputs = document.querySelectorAll('.form-control', )
    inputs.forEach(input => {
        input.addEventListener('click', (e) => e.target.classList.remove('is-invalid'))
        
    });
    let inputsSelect = document.querySelectorAll('.form-select')
    inputsSelect.forEach(input => {
        input.addEventListener('click', (e) => e.target.classList.remove('is-invalid'))
        
    });
}
removeIsValidClass()
clearImputs()
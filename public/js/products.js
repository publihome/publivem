const table= document.getElementById('table');
let form = document.querySelector("#formAddProduct")
const path = window.location.href
let c = path.lastIndexOf('/')
let id_category = path.slice(c+1,c+2)
console.log(form)
let urlbase = "http://localhost:8000/api/products" 



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
    .then(data => console.log(data))
}

getProductsByCategory()


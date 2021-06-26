const table= document.getElementById('table');
const path = window.location.href
let c = path.lastIndexOf('/')
let id_category = path.slice(c+1,c+2)
console.log(id_category)
const btnadd = document.getElementById("btn_add");

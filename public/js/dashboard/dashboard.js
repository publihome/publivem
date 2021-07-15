let url = 'http://localhost:8000/api'
const formDate = document.getElementById('formDate')

formDate.addEventListener('submit',(e) => {
    e.preventDefault()
    let formData = new FormData(formDate)
    getData(formData)
})

function getData(formData){
        
    fetch(`${url}/dashboard`,{
        body:formData,
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response =>response.json())
    .then(data => console.log(data))
}




 
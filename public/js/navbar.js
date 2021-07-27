let navbar = document.querySelector('.navbar')

window.addEventListener('scroll', (e) => {
    if(scrollY > 1){
        navbar.style.position = 'fixed'
        navbar.style.transicion = 'ease all 0.3'
        navbar.style.width = '100%'
    }else{
        navbar.style.position = 'relative'
    }

})
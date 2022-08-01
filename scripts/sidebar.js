const menu= document.querySelector('.menu')
const submenu = document.getElementById('submenu')
menu.addEventListener('click',(e) => {
    if (e.target.classList.contains("drop")) {
        submenu.classList.toggle('show')
        if (submenu.classList.contains('show')){
            document.getElementById("icono").style.color="#888daa"    
            document.getElementById("s-menu").style.color="#888daa"    
        }else{
            document.getElementById("icono").style.color="#fff"
            document.getElementById("s-menu").style.color="#fff"
        }
        
    
    } 
    e.stopPropagation
})

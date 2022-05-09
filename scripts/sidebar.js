const menu= document.querySelector('.menu')
const submenu = document.getElementById('caca')
menu.addEventListener('click',(e) => {
    if (e.target.classList.contains("drop")) {
        submenu.classList.toggle('show')
        console.log(submenu.classList)
    } 
    e.stopPropagation
})

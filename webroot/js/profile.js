let btns = document.querySelectorAll(".nota-data .btn")
for (let i= 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function() {
        notas = this.parentNode.querySelectorAll(".nota-data .table-nota")
        notas[0].classList.toggle("show-toright")
        
    })
}
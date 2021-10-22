let btnCtrl = document.getElementById("btn-ctrl")
btnCtrl.addEventListener('click', () => {
    let usrOpt = document.getElementById("usr-opt")
    if(!usrOpt.classList.contains("show")){
        usrOpt.classList.add("show")
        btnCtrl.classList.add("left")
    } else {
        usrOpt.classList.remove("show")
        btnCtrl.classList.remove("left")
    }

})

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
}
function myFunction(x) {
    if (x.matches) {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    } else {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
}

function openNav() {
    var x = document.getElementById("mySidebar");
    var y = document.getElementById("main")
    if (x.style.width === "250px") {
        x.style.width = "0";
        y.style.marginLeft = "0";
    } else {
        x.style.width = "250px";
        y.style.marginLeft = "250px";
    }
}
var x = window.matchMedia("(max-width: 576px)")
myFunction(x)
x.addListener(myFunction)

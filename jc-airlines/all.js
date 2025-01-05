function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

function whatTime(x) {
    if (x = 6-9) {
        Aika = aamu
    }
    else if (x = 10-17) {
        Aika = päivä
    }
    else if (x = 17-22) {
        Aika = ilta
    }
    else {
        return("No flights for that time")
    }
}
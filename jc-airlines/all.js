
function whatTime(x) {
    let Aika;
    if (x >= 6 && x <= 9) {
        Aika = "aamu"; // Morning
    } else if (x >= 10 && x <= 17) {
        Aika = "päivä"; // Day
    } else if (x >= 18 && x <= 22) {
        Aika = "ilta"; // Evening
    } else {
        return "No flights for that time";
    }
    return Aika;
}

function checkSameCity() {
    var from = document.getElementById("Lähtö").value;
    var to = document.getElementById("Kaupunki").value;
    var warning = document.getElementById("warning");

    if (from && to && from === to) {
        warning.style.display = "block";
    } else {
        warning.style.display = "none";
    }
}

function saveFlightID(flightID) {
    document.getElementById("flightID").value = flightID;
    document.getElementById("bookingForm").submit();
}
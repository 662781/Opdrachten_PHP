

function changeColor(){
    var redValue = document.getElementById("red").value;
    var greenValue = document.getElementById("green").value;
    var blueValue = document.getElementById("blue").value;

    var redHex = Number(redValue).toString(16);
    var greenHex = Number(greenValue).toString(16);
    var blueHex = Number(blueValue).toString(16);

    document.body.style.background = "#" + redHex + greenHex + blueHex;

    

}

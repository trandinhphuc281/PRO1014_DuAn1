var images = [];
for (var i = 0; i < 2; i++) {
    images[i] = new Image();
    images[i].src = "../assets/img/" + i + ".png";
}
var index = 0;

function start() {
    index++;
    if (index >= images.length) {
        index = 0;
    }
    var anh = document.getElementById("image");
    anh.src = images[index].src;
}
var inTime = setInterval(start, 2000);
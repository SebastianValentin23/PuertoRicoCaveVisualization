function start() {
    const canvas = document.getElementById("prmap");
    const context = canvas.getContext("2d");
    const img = new Image();
    img.src = "images/PR-Map.png";
    img.onload = () => {
        context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
    };
}
window.addEventListener("load", start);
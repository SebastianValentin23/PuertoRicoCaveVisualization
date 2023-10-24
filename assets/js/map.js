function start() {
    var towns = ["Arecibo" , "Camuy" , "Ponce"];
    const canvas = document.getElementById("prmap");
    const context = canvas.getContext("2d");
    const img = new Image();
    img.src = "images/PR-Map.png";
    img.onload = () => {
        context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        //create a method that checks a mapping to place the dots based on the values given to by the database 
        //for now we just use an array to iterate through if statements to simulate the process
        //the method will return the pair of corrds that the town belongs to.
        context.fillStyle = "#FF0000";
        
    
        for (let i = 0; i < towns.length; i++) {
            if (towns[i] == "Arecibo") {
                context.beginPath();
                context.arc(420,80, 10, 0, 2*40);
                context.fill();
                context.closePath();
            } else if (towns[i] == "Camuy") {
                context.beginPath();
                context.arc(300,90, 10, 0, 2*40);
                context.fill();
                context.closePath();
            } else if (towns[i] == "Ponce") {
                context.beginPath();
                context.arc(320, 420, 10, 0, 2*40);
                context.fill();
                context.closePath();
            }
        }
         
    };
    


}
window.addEventListener("load", start);
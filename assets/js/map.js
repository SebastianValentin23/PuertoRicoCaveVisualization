function start() {
    
    var towns = [];
    towns.push({
        name: "Morovis",
        x: 700,
        y: 140
    }, {
        name: "Utuado",
        x: 470,
        y: 200
    }); 

    const modal = document.getElementById("modal");
    const townName = document.getElementById("town-name");
    const caveList = document.getElementById("cave-list");
    const close = document.getElementById("close");
    
    close.onclick = function(){
        modal.style.display = "none";
    }
    
    const canvas = document.getElementById("prmap");    
    const radius = 10;
    const context = canvas.getContext("2d");
    
    const img = new Image();
    img.src = "images/PR-Map.png";
    img.onload = () => {
        context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        context.fillStyle = "#FF0000";
        //algorithm assumes lists are ordered alphabetically by town name
        /*var j = 0;
        for (let i = 0; i < caves.length; i++) {
            console.log(caves[i].town + towns[j].name);
            while (caves[i].town != towns[j].name && j < towns.length) {
                j++;
            }
            context.beginPath();
            context.arc(towns[j].x, towns[j].y, radius, 0, 2*40);
            context.fill();
            context.closePath();
        }*/
        for (let i = 0; i < caves.length; i++) {
            for(let k = 0; k < towns.length; k++) {
                if (caves[i].town == towns[k].name) {
                    context.beginPath();
                    context.arc(towns[k].x, towns[k].y, radius, 0, 2*40);
                    context.fill();
                    context.closePath();
                }
            }
        }
        //this will check when the canvas is clicked, as to where. Check the corresponding mapping and open the correct modal window as a result.
        canvas.addEventListener('click', function(event) {
            var x = event.pageX - (canvas.offsetLeft + canvas.clientLeft);
            var y = event.pageY - (canvas.offsetTop + canvas.clientTop);
            console.log(x,y);
            
            var cavesNames = "";
            // Collision detection between clicked offset and element.
            for(let i = 0; i < towns.length; i++) {
                if(y > towns[i].y - radius && y < towns[i].y + radius && x > towns[i].x - radius && x < towns[i].x + radius) {
                    //open popup with the names of the towns that belong in that town
                    modal.style.display = "block";
                    townName.innerHTML = towns[i].name;
                    //go through the list of caves and show each one that corresponds to this town. 
                    
                    for(let j=0; j < caves.length; j++){
                        console.log(caves[j].town + towns[i].name)
                        if(caves[j].town == towns[i].name) {
                            console.log(cavesNames);
                            cavesNames += "<a href='cave.php?id=" + caves[j].cave_id + "'>" + caves[j].name + "</a><br>";
                            console.log(cavesNames);
                        }
                    }
                    caveList.innerHTML = cavesNames;
                }
            }
        }, false);
    };
}


  

window.addEventListener("load", start);
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
}
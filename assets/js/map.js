function start() {
    var towns = [];
    towns.push({
        name: "Arecibo",
        x: 420,
        y: 80
    }, {
        name: "Camuy",
        x: 300,
        y: 90
    }, {
        name: "Fajardo",
        x: 1100,
        y: 400
    }, {
        name: "Ponce",
        x: 320,
        y: 420
    }, {
        name: "San Juan",
        x: 800,
        y: 85
    });

    var caves = [];

    caves.push({
        name:"Echo Cave",
        town:"Arecibo"
    }, {
        name:"Glowing Grotto",
        town:"Arecibo"
    }, {
        name:"Mystic Cave",
        town:"Camuy"
    }, {
        name:"Crystal Cave",
        town:"Camuy"
    }, {
        name:"Coast Cavern",
        town: "Fajardo"
    }, {   
        name:"Emerald Cavern",
        town:"Ponce"
    }, {
        name: "Ruby Cave",
        town: "San Juan"
    });

    const canvas = document.getElementById("prmap");    

    const radius = 10;

    const context = canvas.getContext("2d");
    
    const img = new Image();
    img.src = "images/PR-Map.png";
    img.onload = () => {
        context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        context.fillStyle = "#FF0000";

        //algorithm assumes lists are order alphabetically by town name
        var j = 0;
        for (let i = 0; i < caves.length; i++) {
            while (caves[i].town != towns[j].name) {
                j++;
            }
            context.beginPath();
            context.arc(towns[j].x, towns[j].y, radius, 0, 2*40);
            context.fill();
            context.closePath();
        }
        //this will check when the canvas is clicked, as to where. Check the corresponding mapping and open the correct modal window as a result.
        canvas.addEventListener('click', function(event) {
            var x = event.pageX - (canvas.offsetLeft + canvas.clientLeft);
            var y = event.pageY - (canvas.offsetTop + canvas.clientTop);
            console.log(x,y);
            
            // Collision detection between clicked offset and element.
            for(let i = 0; i < towns.length; i++) {
                console.log(towns[i].x, towns[i].y)
                if(y > towns[i].y - radius && y < towns[i].y + radius && x > towns[i].x - radius && x < towns[i].x + radius) {
                    alert("DING DONG you clicked on: " + towns[i].name);
                } 
            }
        }, false);
    };

}
window.addEventListener("load", start);




/*
var elem = document.getElementById('myCanvas'),
    elemLeft = elem.offsetLeft + elem.clientLeft,
    elemTop = elem.offsetTop + elem.clientTop,
    context = elem.getContext('2d'),
    elements = [];

// Add event listener for `click` events.
elem.addEventListener('click', function(event) {
    var x = event.pageX - elemLeft,
        y = event.pageY - elemTop;

    // Collision detection between clicked offset and element.
    elements.forEach(function(element) {
        if (y > element.top && y < element.top + element.height 
            && x > element.left && x < element.left + element.width) {
            alert('clicked an element');
        }
    });

}, false);

// Add element.
elements.push({
    colour: '#05EFFF',
    width: 150,
    height: 100,
    top: 20,
    left: 15
});

// Render elements.
elements.forEach(function(element) {
    context.fillStyle = element.colour;
    context.fillRect(element.left, element.top, element.width, element.height);
});​*/
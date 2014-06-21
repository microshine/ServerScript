function drawCircle() {
    var canvas = document.getElementById("cnv");
    
    var radius = 50;
    var x = radius + Math.random()*(canvas.width-2*radius);
    var y = radius + Math.random()*(canvas.height-2*radius);
    
    var ctx = canvas.getContext("2d");
    ctx.beginPath();
    ctx.arc(x, y, radius-5, 0, 2 * Math.PI);
    ctx.closePath();
    ctx.lineWidth = 5;
    ctx.fillStyle = 'red';
    ctx.fill();
    ctx.strokeStyle = 'blue';
    ctx.stroke();
}

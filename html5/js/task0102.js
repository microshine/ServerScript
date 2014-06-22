function init() {
    canvas = document.getElementById("cnv");
    canvas.width = 480;
    canvas.height = 320;
    context = canvas.getContext("2d");
    draw();
}

function draw() {
    context.fillStyle = "#ddd";
    context.fillRect(0, 0, 480, 320);

    var c = new circle(0, 0, 50, "red");
    var t = new triangle(0, 0, 100, 100, "green");
    var s = new rect(0, 0, 100, 100, "blue");
    drawRandom([c, t, s]);
}

function circle(x, y, radius, color) {
    this.name = 'circle';
    this.color = color;
    this.radius = radius;
    this.x = x;
    this.y = y;
    this.width = radius * 2;
    this.height = radius * 2;
    this.draw = function() {
        context.beginPath();
        context.arc(this.x + radius, this.y + radius, this.radius, 0, 2 * Math.PI);
        context.closePath();
        context.fillStyle = this.color;
        context.fill();
        context.stroke();
    };
}

function triangle(x, y, height, width, color) {
    this.name = 'triangle';
    this.color = color;
    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
    this.draw = function() {
        context.beginPath();
        context.moveTo(this.x + this.width / 2, this.y);
        context.lineTo(this.x + this.width, this.y + this.height);
        context.lineTo(this.x, this.y + this.height);
        context.closePath();
        context.fillStyle = this.color;
        context.fill();
        context.stroke();
    };
}
function rect(x, y, height, width, color) {
    this.name = 'rect';
    this.color = color;
    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
    this.draw = function() {
        context.beginPath();
        context.rect(this.x, this.y, this.width, this.height);
        context.closePath();
        context.fillStyle = this.color;
        context.fill();
        context.stroke();
    };
}

function randomPosition(figure) {
    var x = Math.round(Math.random() * (canvas.width - figure.width));
    var y = Math.round(Math.random() * (canvas.height - figure.height));
    return {x: x, y: y};
}

function drawRandom(figures) {
    var checked_figures = [];
    var position;
    for (var i = 0; i < figures.length; i++) {
        if (i === 0) {
            position = randomPosition(figures[i]);
            figures[i].x = position.x;
            figures[i].y = position.y;
        } else {
            position = randomPosition(figures[i]);
            figures[i].x = position.x;
            figures[i].y = position.y;
            while (!checkCollision(figures[i], checked_figures)) {
                position = randomPosition(figures[i]);
                figures[i].x = position.x;
                figures[i].y = position.y;
            }
        }
        checked_figures.push(figures[i]);
        checked_figures[i].draw();
    }
}

// Проверка на наложение фигур
function checkCollision(figure, figures) {
    for (var i = 0; i < figures.length; i++) {
        if (figure.x < figures[i].x + figures[i].width && figure.x + figure.width > figures[i].x &&
                figure.y < figures[i].y + figures[i].height && figure.y + figure.height > figures[i].y) {
// пересечение фигур
            return false;
            //console.log(figure.name + ' - ' + figures[i].name);
        }
    }
    return true;
}
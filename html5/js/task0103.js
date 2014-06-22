function canvas() {
    var _canvas = document.getElementById("cnv");
    this.objects = [];
    this.width = 480;
    this.height = 320;
    this.step = 3;
    // Вектор
    this.xv = 0;
    this.yv = 0;
    this.context = _canvas.getContext("2d");

    this.init = function() {
                
        this.yv = ((Math.random() * 100) + 1) * ((Math.random() * 10) >= 5 ? 1 : -1);
        var xk = ((Math.random() * 10) >= 5 ? 1 : -1);
        this.xv = ((Math.random() * 100) + 1) * xk;
        
        this.yv = this.yv / Math.sqrt(Math.pow(this.yv, 2) + Math.pow(this.xv, 2)) * this.step;
        this.xv = xk * Math.sqrt(Math.pow(this.step, 2) - Math.pow(this.yv, 2));

        this.objects.push(new circle(this, 50, 50, 20, "red"));
        
        this.objects[0].x = Math.random()*(this.width-this.objects[0].width);
        this.objects[0].y = Math.random()*(this.height-this.objects[0].height);

        this.render();
        canv = this;
        window.requestAnimFrame(run);
    };

    this.render = function() {
        this.drawCanvas();

        for (var i = 0; i < this.objects.length; i++) {
            this.moveTo(this.objects[i]);
            this.objects[i].draw();
        }
    };

    this.moveTo = function(element) {
        if (element.x <= 0 || element.x + element.width >= this.width)
            this.xv *= -1;
        if (element.y <= 0 || element.y + element.height >= this.height)
            this.yv *= -1;

        element.x += this.xv;
        element.y += this.yv;
    };

    function run() {
        canv.render();
        window.requestAnimFrame(run);
    }

    this.drawCanvas = function() {
        _canvas.width = this.width;
        _canvas.height = this.height;

        this.context.fillStyle = "#ddd";
        this.context.fillRect(0, 0, this.width, this.height);
    };

    this.init();
}

function circle(canvas, x, y, radius, color) {
    this.canvas = canvas;
    this.name = 'circle';
    this.color = color;
    this.radius = radius;
    this.x = x;
    this.y = y;
    this.width = radius * 2;
    this.height = radius * 2;
    this.draw = function() {
        canvas.context.beginPath();
        canvas.context.arc(this.x + radius, this.y + radius, this.radius, 0, 2 * Math.PI);
        canvas.context.closePath();
        canvas.context.fillStyle = this.color;
        canvas.context.fill();
        canvas.context.stroke();
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

// Если ничего нет - возвращаем обычный таймер
window.requestAnimFrame = (function() {
    return  window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            function(/* function */ callback, /* DOMElement */ element) {
                window.setTimeout(callback, 1000 / 60);
            };
})();
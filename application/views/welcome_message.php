<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Media Galley</title>
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Oswald:300);
@import url(https://fonts.googleapis.com/css?family=Abel);
#Profile {
  position: absolute;
  margin: auto;
  top: 0; right: 0; bottom: 0; left: 0;
  width: 150px; height: 150px;
  border-radius: 150px;
}

#Profile:before {
  content: '';
  position: absolute;
  top: -8px; left: -8px;
  width: 162px; height: 162px;
  border-radius: 162px;
  border: 2px solid #BCBCBC;
}

#Profile:after {
  content: '';
  position: absolute;
  top: -13px; left: -13px;
  width: 172px; height: 172px;
  border-radius: 172px;
  border: 2px solid #FF9900;
}

#Profile img {
  border-radius: 150px;
}

#Profile span {
  bottom: -60px;
  display: block;
  width: 150px;
  text-align: center;
  font-family: 'Oswald';
  color: #333;
  font-size: 15px;
}
</style>

</head>
<body>
<canvas></canvas>
<div id="Profile">
  <img src="<?php echo CDN_PATH.'portal/images/user.png'; ?>"/>
  <span>Gulshan</span>
  <span>Email : gul2787@gmail.com</span>
  <span>Phone No : +919803800340</span>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	var canvas = $('canvas')[0];
var context = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var Dots = [];
var colors = ['#FF9900', '#424242', '#BCBCBC', '#3299BB'];
var maximum = 70;

function Initialize() {
  GenerateDots();

  Update();
}

function Dot() {
  this.active = true;

  this.diameter = Math.random() * 7;

  this.x = Math.round(Math.random() * canvas.width);
  this.y = Math.round(Math.random() * canvas.height);

  this.velocity = {
    x: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.7,
    y: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.7
  };

  this.alpha = 0.1;
  this.hex = colors[Math.round(Math.random() * 3)];
  this.color = HexToRGBA(this.hex, this.alpha);
}

Dot.prototype = {
  Update: function() {
    if(this.alpha < 0.8) {
      this.alpha += 0.01;
      this.color = HexToRGBA(this.hex, this.alpha);
    }

    this.x += this.velocity.x;
    this.y += this.velocity.y;

    if(this.x > canvas.width + 5 || this.x < 0 - 5 || this.y > canvas.height + 5 || this.y < 0 - 5) {
      this.active = false;
    }
  },

  Draw: function() {
    context.fillStyle = this.color;
    context.beginPath();
    context.arc(this.x, this.y, this.diameter, 0, Math.PI * 2, false);
    context.fill();
  }
}

function Update() {
  GenerateDots();

  Dots.forEach(function(Dot) {
    Dot.Update();
  });

  Dots = Dots.filter(function(Dot) {
    return Dot.active;
  });

  Render();
  requestAnimationFrame(Update);
}

function Render() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  Dots.forEach(function(Dot) {
    Dot.Draw();
  });
}

function GenerateDots() {
  if(Dots.length < maximum) {
    for(var i = Dots.length; i < maximum; i++) {
      Dots.push(new Dot());
    }
  }

  return false;
}

function HexToRGBA(hex, alpha) {
  var red = parseInt((TrimHex(hex)).substring(0, 2), 16);
  var green = parseInt((TrimHex(hex)).substring(2, 4), 16);
  var blue = parseInt((TrimHex(hex)).substring(4, 6), 16);

  return 'rgba(' + red + ', ' + green + ', ' + blue + ', ' + alpha + ')';
}

function TrimHex(hex) {
  return (hex.charAt(0) == "#") ? hex.substring(1, 7) : h;
}

$(window).resize(function() {
  Dots = [];
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

Initialize();

</script>


</body>
</html>
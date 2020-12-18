<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Gas Booking System</title>
     <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body id="bod">
   <style>
     
       .abc{
           background-image: url(bacground.jpg);
           background-size: cover;
           background-repeat: no-repeat;
           width: 100%;
           height:650px;
           
           margin-top: -70px;
       }
    </style>
    <nav class="navbar navbar-expand lg navbar-dark header">
    <a href="index.php" class="navbar-brand "><h5 class="font-weight-light h3"><img src="logo.png" style="background-color: white;padding: 1px;"></h5></a>
   <ul class="navbar-nav ml-auto ">
       <li class="nav-item"><a href="" class="nav-link ">Home</a></li>
       <!-- <li class="nav-item"><a href="" class="nav-link text-light">About OBGS</a></li>
       <li class="nav-item"><a href="" class="nav-link text-light">Contact Us</a></li> -->
       
       <!-- <li class="nav-item"><a href="" class="nav-link text-light">Emergency No</a></li> -->
       <li class="nav-item"><a href="admin/login.php" target="_blank" class="nav-link text-light">Admin Login</a></li>
       <li class="nav-item"><a href="user/login.php" target="_blank" class="nav-link text-light">User login</a></li>
   </ul>
    </nav>
   <div class="abc ">
        <div class="container-fluid  h-100 w-100  " style="background-color:rgba(0, 0, 0, 0.62);  padding-top:230px;;">
<div class="card col-lg-2 mx-auto p-0 col-sm-2 col-md-2" style="background-color:rgba(0, 0, 0, 0);">
        <button onclick="clicked()" class="btn btn-outline-light btn-block py-3 header confetti-button">BOOK NOW</button>
</div>
<script>
function clicked(){

window.open('user/login.php','_self');
}
</script>
                </div><style type="text/css">
  .header{
    color: white;
  background-image: -webkit-linear-gradient(92deg, #f35626, #feab3a);

  -webkit-animation: hue 10s infinite linear;
  }
  @-webkit-keyframes hue {
  from {
    -webkit-filter: hue-rotate(0deg);
  }
  to {
    -webkit-filter: hue-rotate(-360deg);
  }
}
.confetti-button {
  font-family: 'Helvetica', 'Arial', sans-serif;
  display: inline-block;
  font-size: 1em;
  padding: 1em 2em;
  margin-top: 100px;
  margin-bottom: 60px;
  -webkit-appearance: none;
  appearance: none;
  background-color: #ff0081;
  color: #fff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  position: relative;
  transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);
}

.confetti-button:focus { outline: 0; }

.confetti-button:before, .confetti-button:after {
  position: absolute;
  content: '';
  display: block;
  width: 140%;
  height: 100%;
  left: -20%;
  z-index: -1000;
  transition: all ease-in-out 0.5s;
  background-repeat: no-repeat;
}

.confetti-button:before {
  display: none;
  top: -75%;
  background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 20%, #ff0081 20%, transparent 30%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
}

.confetti-button:after {
  display: none;
  bottom: -75%;
  background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
}

.confetti-button:active {
  transform: scale(0.9);
  background-color: #e60074;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
}

.confetti-button.animate:before {
  display: block;
  animation: topBubbles ease-in-out 0.75s forwards;
}

.confetti-button.animate:after {
  display: block;
  animation: bottomBubbles ease-in-out 0.75s forwards;
}
 @keyframes
topBubbles {  0% {
 background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
}
 50% {
 background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
}
 100% {
 background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
 background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
}
}
@keyframes
bottomBubbles {  0% {
 background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
}
 50% {
 background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
}
 100% {
 background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
 background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
}
}
</style>
<script>
var animateButton = function(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');

  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var classname = document.getElementsByClassName("confetti-button");

for (var i = 0; i < classname.length; i++) {
  classname[i].addEventListener('mouseover', animateButton, false);
}
</script>

   </div>
   <footer style="bottom:0;position:relative;background-color:transparent;color:white;padding:10px" class="header" ><center>ONLINE GAS BOOKING SYSTEM | POWERED BY <a href="redbackstudios.in">REDBACK</a></center></footer>

</body>
</html>


@if(session('userID')!==NULL && session('userType')=='admin') 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <!-- <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/main.css"> -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

*{
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
  text-decoration: none;
}
html{
  font-size: 10px;
}
body{
  background-color: #F3F6FA;
  margin: 0;
}
ul, li{
  list-style-type: none;
  padding: 0;
  margin: 0;
}
/* Main styles */
main{
  margin-left: 300px;
}
main h2{
  padding: 2rem 0 0;
}
a:hover, 
a:focus{
  text-decoration: none;
}
:root{
  --primary: #0052E9;
  --dark: #333;
  --grey: #666;
  --light: #ffffff;
  --online: #5DF888;
  --offline: #FF4949;
  --away: #F1C836;
}
/* background helper classes */
.bg-primary{
  background-color: var(--primary);
}
.bg-online{
  background-color: var(--online);
}
.bg-offline{
  background-color: var(--offline);
}
.bg-away{
  background-color: var(--away);
}
/* text helper classes */
.text-primary{
  color: var(--primary) !important;
}
.text-dark{
  color: var(--dark) !important;
}
.text-grey{
  color: var(--grey) !important;
}
.text_light{
  color: var(--light) !important;
}
.text-small, 
.text-normal{
  font-weight: 500;
}
.text-large, 
.text-larger{
  line-height: 2em;
  font-weight: 800;
}
.text-small{
  font-size: 1rem;
  line-height: 1.2em;
}
.text-normal{
  font-size: 1.2rem;
  line-height: 1.5em;
}
.text-large{
  font-size: 1.2rem;
}
.text-larger{
  font-size: 1.6rem;
}
.text-bold{
  font-weight: 700;
}
/* general styles */
section > div:first-of-type{
  padding-bottom: 1.5rem;
}
input[type="checkbox"]{
  cursor: pointer;
}
.modal .viewAll-btn{
  opacity: .9;
  transition: .2s ease;
  border: 1px solid var(--primary);
}
.modal .viewAll-btn:hover,
.modal .viewAll-btn:focus{
  background-color: #fff;
  color: var(--primary);
}
.modal .close svg{
  font-size: 3rem;
}
.modal .close:focus{
  outline: none;
}
.modal-header{
  border-bottom: 0;
  padding: 2rem;
}
h2 + div{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 10rem;
  margin-bottom: 5rem;
}
figure{
  text-align: center;
  margin: 0;
}
figure .profile-img{
  width: 12rem;
  height: 12rem;
  border-radius: 50%;
}
figure figcaption{
  padding-top: 1rem;
}
figure + div{
  display: inline-flex;
}
.functionButtonsWrapper{
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
.functionButtonsWrapper h2 {
  padding: 0;
}
.functionButtonsWrapper > div{
  display: inline-flex;
  flex-direction: row;
  margin: 0;
  align-items: center;
  justify-content: space-between;
  width: 50%;
}
.functionButtonsWrapper > div button{
  flex-grow: 1;
}
.functionButtonsWrapper > div form{
  flex-grow: 1;
}
.functionButtonsWrapper > div form input{
  background-color: #fafafa;
  border:0.5px solid var(--grey);
  outline: none;
}
.bio-wrapper{
  padding: 3rem 0;
}
.bio-wrapper .cardWrapper{
  align-items: flex-start;
}
.bio-wrapper .cardWrapper > div{
  flex-basis: 48%;
  margin: 1rem;
}
.cardWrapper > div{
  flex-grow: 1;
  flex-basis: 30%;
  overflow-x: auto;
}
.cardWrapper{
  display: inline-flex;
  width: 100%;
  align-items: center;
  justify-content: flex-start;
  flex-wrap: wrap;
}
.card{
  width: 100%;
  position: unset;
  border: none;
  min-width: unset;
  flex-direction: column;
  overflow-x: auto;
  display: inline-flex;
  align-items: center;
  justify-content: space-evenly;
  flex-grow: 1;
  flex-basis: 30%;
  padding: 1.5rem;
  background-color: #fff;
  border-radius: 1.5rem;
  box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.06), 
              0px -4px 6px rgba(0, 0, 0, 0.04), 
              0px 0px 1px rgba(0, 0, 0, 0.04);
}
.cardWrapper .card span{
  display: flex;
  justify-content: space-between;
  align-items: baseline;
}
.heading,
.row{
  overflow-x: auto;
  white-space: nowrap;
  margin: 1rem 0;
}
.row{
  width: 100%;
  border: 1px solid #D1E1FE;
  border-radius: 4rem;
  cursor: pointer;
}
.card a:focus{
  outline: none;
 }
/* .card a:focus .row,
.row:hover{
  border-color: var(--primary);
  background-color: #f3f6fa;
} */
.viewAll-btn{
  border: none;
  border-radius: 4rem;
  outline: none;
  background-color: #0052E9;
  cursor: pointer;
  color: #fdfdfd;
  padding: 1.5rem 4rem;
  margin: 2rem 0;
  transform: .2s ease;
  display: inline-flex;
  align-items: center;
  opacity: .9;
}
button.viewAll-btn.btn-light{
  background-color: #fdfdfd;
  color: var(--primary);
  border: 1px solid var(--primary);
}
.viewAll-btn svg{
  font-size: 1.5rem;
  margin:0 1rem;
}
.viewAll-btn:focus{
  outline: none;
}
.viewAll-btn:hover{
  opacity: 1;
}
.show{
  left: 0 !important;
}
.hide{
  opacity: .5;
  height: 100vh;
  overflow: hidden;
}

  </style>
  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/profile.css">

  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/sideNav.css">
  
  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/topNav.css">
  
  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/Admin/users.css">
  
  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/Admin/adminOverview.css">
 
  <link rel="stylesheet" href="http://localhost/laravel/resources/sass/css/responsive.css">
  
  
  <!-- charts.js cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  <title>Admin Dashboard</title>
</head>
<body style='background-color: #D1DADC;'>
@yield('content')
<!-- bootsrap enabled -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
  <!-- custom script -->
 
  <script src="http://localhost/laravel/resources/js/app.js"></script>
  <!-- <script src="./assets/js/app.js"></script> -->
  <script src="http://localhost/laravel/resources/js/Charts/progressCharts.js"></script>
  <!-- <script src="./assets/js/Charts/progressCharts.js"></script> -->
  <script src="http://localhost/laravel/resources/js/Charts/usersGrowth.js"></script>
  <!-- <script src="./assets/js/Charts/usersGrowth.js"></script> -->
  <script src="http://localhost/laravel/resources/js/Charts/tutorsGrowth.js"></script>
  <!-- <script src="./assets/js/Charts/tutorsGrowth.js"></script> -->
</body>
</html>
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
</head>
<style>
body {
  background-color: #2F3242;
}
svg {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -250px;
  margin-left: -400px;
}
.message-box {
  height: 200px;
  width: 380px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -100px;
  margin-left: 50px;
  color: #FFF;
  font-family: Roboto;
  font-weight: 300;
}
.message-box h1 {
  font-size: 60px;
  line-height: 46px;
  margin-bottom: 40px;
}
.buttons-con .action-link-wrap {
  margin-top: 40px;
}
.buttons-con .action-link-wrap a {
  background: #68c950;
  padding: 8px 25px;
  border-radius: 4px;
  color: #FFF;
  font-weight: bold;
  font-size: 14px;
  transition: all 0.3s linear;
  cursor: pointer;
  text-decoration: none;
  margin-right: 10px
}
.buttons-con .action-link-wrap a:hover {
  background: #5A5C6C;
  color: #fff;
}

#Polygon-1 , #Polygon-2 , #Polygon-3 , #Polygon-4 , #Polygon-4, #Polygon-5 {
  animation: float 1s infinite ease-in-out alternate;
}
#Polygon-2 {
  animation-delay: .2s; 
}
#Polygon-3 {
  animation-delay: .4s; 
}
#Polygon-4 {
  animation-delay: .6s; 
}
#Polygon-5 {
  animation-delay: .8s; 
}

@keyframes float {
	100% {
    transform: translateY(20px);
  }
}
@media (max-width: 450px) {
  svg {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -250px;
    margin-left: -190px;
  }
  .message-box {
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -190px;
    text-align: center;
  }
}
</style>
<script>

</script>
<body>

<svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
</svg>
<div class="message-box">
  <h1>404</h1>
  <p>Page not found</p>
  <div class="buttons-con">
    <div class="action-link-wrap">
      <a onclick="history.back(-1)" class="link-button link-back-button">Go Back</a>
      <a href="http://localhost/laravel/public/" class="link-button">Go to Home Page</a>
    </div>
  </div>
</div>
</body>
</html>
 
@endif

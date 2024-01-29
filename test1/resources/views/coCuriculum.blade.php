<!DOCTYPE html>
<html>


<style>
     @import url(https://fonts.googleapis.com/css?family=Sniglet|Raleway:900);
     @charset "UTF-8";
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import url(https://fonts.googleapis.com/css?family=Bree+Serif);

body {
    font-family: 'Open Sans', sans-serif;
    font-weight: 200;
    line-height: 3.42em;
    color:#A7A1AE;
  
  }
  

  .blue { color: #185875; }
  .yellow { color: #FFF842; }
  
  .container th h1 {
        font-weight: bold;
        font-size: 1em;
    text-align: center;
    color: #185875;
  }
  
  .container td {
        font-weight: normal;
        font-size: 1em;
    -webkit-box-shadow: 0 2px 2px -2px #0E1119;
         -moz-box-shadow: 0 2px 2px -2px #0E1119;
              box-shadow: 0 2px 2px -2px #0E1119;
  }
  
  .container {
        text-align: center;
        overflow: hidden;
        width: 30%;
        
        margin: 0 auto;
    display: table;
    padding: 0 0 8em 0;
  }
  
  .container td, .container th {
        padding-bottom: 20%;
        padding-top: 2%;
    padding-left:2%;  
  }
  
  /* Background-color of the odd rows */
  .container tr:nth-child(odd) {
        background-color: #323C50;
  }
  
  /* Background-color of the even rows */
  .container tr:nth-child(even) {
        background-color: #2C3446;
  }
  
  .container th {
        background-color: #1F2739;
  }
  
  .container td:first-child { color: #FB667A; }
  
  .container tr:hover {
     background-color: #464A52;
  -webkit-box-shadow: 0 6px 6px -6px #0E1119;
         -moz-box-shadow: 0 6px 6px -6px #0E1119;
              box-shadow: 0 6px 6px -6px #0E1119;
  }
  
  .container td:hover {
    background-color: #FFF842;
    color: #403E10;
    font-weight: bold;
    
    box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
    transform: translate3d(6px, -6px, 0);
    
    transition-delay: 0s;
        transition-duration: 0.4s;
        transition-property: all;
    transition-timing-function: line;
  }
  
 
body, html{
    height: 100%;
    padding: 0;
    margin: 0;
    font-family: 'Sniglet', cursive;
}
h1{
    font-weight: normal;
    font-size: 3em;
    font-family: 'Raleway', sans-serif;
    margin: 0 auto;
    margin-top: 10px;
    width: 500px;
    color: #F90;
    text-align: center;

}

/* Animation webkit */
@-webkit-keyframes myfirst
{
    0% {margin-left: -235px}
    90% {margin-left: 100%;}
    100% {margin-left: 100%;}
}

/* Animation */
@keyframes myfirst
{
    0% {margin-left: -235px}
    70% {margin-left: 100%;}
    100% {margin-left: 100%;}
}

.fish{
    background-image: url('http://www.geertjanhendriks.nl/codepen/form/fish.png');
    width: 235px;
    height: 104px;
    margin-left: -235px;
    position: absolute;	
    animation: myfirst 24s;
    -webkit-animation: myfirst 24s;
    animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
    animation-timing-function: linear;
    -webkit-animation-timing-function: linear;
}

#fish{
    top: 120px;
}

#fish2{
    top: 260px;
    animation-delay: 12s;
    -webkit-animation-delay: 12s;
}


header{
    height: 160px;
    background: url('http://www.geertjanhendriks.nl/codepen/form/golf.png') repeat-x bottom;
}

#form{
    height: 90%;	
    background-color: #98d4f3;
    overflow: hidden;
    position: relative;
    
}
form{
    margin: 0 auto;
    width: 500px;
    padding-top: 40px;
    color: white;
    position: relative;
    
    
}
label, input, textarea{
    display: block;	
}
input, textarea{
    width: 500px;	
    border: none;
    border-radius: 20px;
    outline: none;
    padding: 10px;
    font-family: 'Sniglet', cursive;
    font-size: 1em;
    color: #676767;
    transition: border 0.5s;
    -webkit-transition: border 0.5s;
    -moz-transition: border 0.5s;
    -o-transition: border 0.5s;
    border: solid 3px #98d4f3;	
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
    
}
input:focus, textarea:focus{
    border: solid 3px #77bde0;	
}

textarea{
    height: 100px;	
    resize: none; 
    overflow: auto;
}
input[type="submit"]{
    background-color: #F90;
    color: white;
    height: 50px;
    cursor: pointer;
    margin-top: 30px;
    font-size: 1.29em;
    font-family: 'Sniglet', cursive;
    -webkit-transition: background-color 0.5s;
    -moz-transition: background-color 0.5s;
    -o-transition: background-color 0.5s;
    transition: background-color 0.5s;
}
input[type="submit"]:hover{
    background-color: #e58f0e;
    
}
label{
    font-size: 1.5em;
    margin-top: 20px;
    padding-left: 20px;
}
.formgroup, .formgroup-active, .formgroup-error{
    background-repeat: no-repeat;
    background-position: right bottom;
    background-size: 10.5%;
    transition: background-image 0.7s;
    -webkit-transition: background-image 0.7s;
    -moz-transition: background-image 0.7s;
    -o-transition: background-image 0.7s;
    width: 566px;
    padding-top: 2px;
}

.formgroup{
    background-image: url('http://www.geertjanhendriks.nl/codepen/form/pixel.gif');	
}
.formgroup-active{
    background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo.png');
}
.formgroup-error{
    background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo-error.png');
    color: red;
}

.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 20px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #8e3e3ee0}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 3px solid #ddd;
  padding: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<header>
	<h1>CoCuriculum Information</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform">

    <div style="width:100px"  class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table style="width: 25vw;"  class="table">
                        <table id="customers">
                            <tr>
                              <th>No</th>
                              <th>Code</th>
                              <th>Description</th>
                              
                            </tr>
                        <tbody>
                            @foreach ($co_curiculums as $co_curiculum)
                                
                           
                            <tr>
                                <td>{{ $co_curiculum->id }}</td>
                                <td>{{ $co_curiculum->code }}</td>
                                <td>{{ $co_curiculum->description }}</td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
               
                </div>
            </div>
        </div>

<br>


        <a href="/studProfile/{{ $stud->matricNo }}" class="button">Back</a>

</form>


</div>


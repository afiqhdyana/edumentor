
    <style>
        @import url(https://fonts.googleapis.com/css?family=Sniglet|Raleway:900);
    
    
    body, html{
        height: 100%;
        padding: 0;
        margin: 0;
        font-family: 'Sniglet', cursive;
    }
    h1{
        font-weight: normal;
        font-size: 4em;
        font-family: 'Raleway', sans-serif;
        margin: 0 auto;
        margin-top: 30px;
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
        height: 250%;	
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
    </style>

<header>
	<h1>Student Details</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform" method="post">

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Matric No*</label>
    <input type="text" placeholder={{ $details->matricNo }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Course*</label>
    <input type="text" placeholder={{ $details->course }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Status*</label>
    <input type="text" placeholder={{ $details->status }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">IC No*</label>
    <input type="text" placeholder={{ $details->icNo }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Program*</label>
    <input type="text" placeholder={{ $details->program }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Semester*</label>
    <input type="text" placeholder={{ $details->semester }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Faculty*</label>
    <input type="text" placeholder={{ $details->faculty }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Citizenship*</label>
    <input type="text" placeholder={{ $details->citizenship }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Passport*</label>
    <input type="text" placeholder={{ $details->passport }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Date Of Birth*</label>
    <input type="text" placeholder={{ $details->DOB }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Place Of Birth*</label>
    <input type="text" placeholder={{ $details->placeOfBirth }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Birth State*</label>
    <input type="text" placeholder={{ $details->birthState }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Gender*</label>
    <input type="text" placeholder={{ $details->gender }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Race*</label>
    <input type="text" placeholder={{ $details->race }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Marital Status*</label>
    <input type="text" placeholder={{ $details->marital }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : 300px;">
    <label for="name">Religion*</label>
    <input type="text" placeholder={{ $details->religion }} id="name" name="name" />
</div>

<div class="formgroup" id="name-form" style="margin-left : -300px;">
    <label for="name">Mode*</label>
    <input type="text" placeholder={{ $details->mode }} id="name" name="name" />
</div>

<br>

<a href="/studProfile/{{ $stud->matricNo }}" class="button">Back</a>
</form>
</div>





               
               
              
                       
         
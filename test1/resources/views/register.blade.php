<html>

<head>
  <title>Form Validation</title>
</head>

<style>
    
		body{
			background-image: url(bg.jpg);
			background-color: skyblue;
			background-repeat: no-repeat;
			background-size: 1500px 620px;
			text-align: center;
			font-size: 22px;
			color: White;
		}
		h1{
			color: white;
			font-size: 60px;
			font-family: cursive;
		}
		.form1{
			background:rgba(0,0,0,0.6);
			padding: 24px;
			margin-top:0px;
			width: 28%;
			position: absolute;
			left:34%;
			border-radius: 15px;
		}
		input{
			width: 330px;
			height: 30px;
			border-radius: 7px;
			text-align: center;
		}
		input[type="text"]{
			font-size: 18px;
		}
		input[type="email"]{
			font-size: 18px;
		}
		input[type="submit"]{
			font-size: 20px;
			height: 40px;
			background-color: #00FF7F;

		}

		input[type="submit"]:hover{
			color:white;	
			background-color: blue;	
		}
		select{
			size:400px;
			height: 30px;
			width: 252px;
			border-radius: 20px;
			text-align: center;
			font-size: 18px;
		}
		input[type="radio"]
		{
			font-size: 14px;
			size: 10px;
			height:12px;
		}
</style>
<body>
	<div class="main">
		<h1>Registration</h1>
		<div class="form1">
		<!--	Registration Form<br>!-->
			<form  method="POST" action="/register">
                {{ csrf_field() }}
				<input type="text" id="name" name="name" placeholder="Firstname"><br><br>		
				<!--<input type="text" id="req2" placeholder="Lastname"><br><br>-->
				<input type="text" id="email" name="email" placeholder="Email address"><br><br>
				<!--<input type="text" id="req4" placeholder="Contact number" name="phone"><br><br>-->
				<input type="password" id="password" name="password" placeholder="Password"><br><br>

				<a class="color: white" href="login">Login</a>
				<div class="row">
					<br>

				<input type="submit" value="Submit" >


			</form>
		</div>	
	</div>


</body>


</html>
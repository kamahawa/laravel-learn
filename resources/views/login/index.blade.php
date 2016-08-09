<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<style type="text/css">
	.error {width: 220px;height: 30px;background: #F25252;color:white;line-height: 30px;text-align: center; float: right}
	</style>
</head>
<body>
<form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
	<table>
		<tr>
			<td>Username</td>
			<td>
			    <input type="text" name="user" />
			    @if($errors->first('user') != '')
			    {!! "<div class='error'>".$errors->first('user')."</div>" !!}
			    @endif
            </td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
			    <input type="password" name="pass" />
			    @if($errors->first('pass') != '')
			    {!! "<div class='error'>".$errors->first('pass')."</div>" !!}
			    @endif
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnLogin" value="Login" /></td>
		</tr>
	</table>
</form>
</body>
</html>
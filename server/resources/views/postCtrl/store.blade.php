<!DOCTYPE html>
<html>
<head>
	<title>Create Blog Laravel</title>
</head>
<body>
	<h1> Testing Creating Blog Ability</h1>
	<form action="{{route('createPost')}}" method="post">
		Title: <input type="text" name="title" value="title"><br>
		Post: <input type="text" name="post" value="body"><br>
		User_id: <input type="number" name="user_id" value=1><br>
		Type: <input type="number" name="type" value=1><br>
		Primary: <input type="number" name="primary" value=1><br>
		<input type="submit">
	</form>
</body>
</html>
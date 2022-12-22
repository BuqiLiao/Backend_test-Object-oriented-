<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
</head>

<body> 
    <div style="text-align:center; padding:auto;">
    <h2>User Management----Add User</h2>
    <a href="?c=UserList">Turn Back</a>
    </div>

    <form method="POST" action="?c=UserList&a=insert">
    <table width="400" border="1" align="center" rules="all" cellpadding="10">
    <tr>
    <td>Username:</td>
    <td><input type="text" name="Username"></td>
    </tr>
    <tr>
    <td>Email:</td>
    <td><input type="text" name="Email"></td>
    </tr>
    </tr>
    <tr>
    <td>Password:</td>
    <td><input type="password" name="Password"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit">
        <input type="reset" value="reset"></td>
    </tr>

</form>

</body>

</html>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
</head>

<body> 
    <div style="text-align:center; padding:auto;">
    <h2>User Management----Edit User</h2>
    <a href="?c=UserList">Turn Back</a>
    </div>

    <table width="400" border="1" align="center" rules="all" cellpadding="10">
    <form method="POST" action="?c=UserList&a=update">
        <tr>
            <td>Old Username:</td>
            <td><input type="text" name="old_Username" readonly="readonly" value="<?php echo $data['username'] ?>"></td>
        </tr>
        <tr>
            <td>New Username:</td>
            <td><input type="text" name="new_Username"></td>
        </tr>
        <tr>
            <td>Old Email:</td>
            <td><input type="text" name="old_Email" readonly="readonly" value="<?php echo $data['email'] ?>"></td>
        </tr>
        <tr>
            <td>New Email:</td>
            <td><input type="text" name="new_Email"></td>
        </tr>
        <tr>
            <td>Old Password:</td>
            <td><input type="password" name="old_Password"></td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td><input type="text" name="new_Password"></td>
        </tr>
        <tr>
        <td><input type="hidden" name="id" value="<?php echo $data['id']?>"</td>
        <td><input type="submit" name="Change" value="Change">
            <input type="reset" value="reset"></td>
        </tr>
    </form>
    </table>

</body>

</html>
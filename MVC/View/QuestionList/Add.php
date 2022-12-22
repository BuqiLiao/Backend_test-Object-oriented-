<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Question</title>
</head>

<body> 
    <div style="text-align:center; padding:auto;">
    <h2>Question Management----Add Question</h2>
    <a href="?c=QuestionList">Turn Back</a>
    </div>

    <form method="POST" action="?c=QuestionList&a=insert">
    <table width="400" border="1" align="center" rules="all" cellpadding="10">
    <tr>
    <td>Title:</td>
    <td><input type="text" name="title"></td>
    </tr>
    <tr>
    <td>Content:</td>
    <td><input type="text" name="content"></td>
    </tr>
    </tr>
    <tr>
    <td>Keywords:</td>
    <td><input type="text" name="keywords"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit">
        <input type="reset" value="reset"></td>
    </tr>

</form>

</body>

</html>

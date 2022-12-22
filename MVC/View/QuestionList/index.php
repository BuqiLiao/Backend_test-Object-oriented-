<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back-end</title>
    <style type="text/css">
        .pagination_list{margin: 10px;}
        .pagination_list span{padding: 3px 5px;margin: 0 3px;}
        .pagination_list a{padding: 3px 5px;text-decoration: none;margin: 0 3px;
        border: 1px solid #ccc;}
        .pagination_list a:hover{background-color:powderblue; border-color:blue;}
        
    </style>

    <script type="text/javascript">
    function Del(qid){

        if(window.confirm("Are you sure to delete " + qid + "?")){

            location.href = "?c=QuestionList&a=delete&qid=" + qid;
        }
    }

    function Muti_Del(){
        if(window.confirm("Are you sure to delete all of the questions you choose?")){

            location.href = "?c=QuestionList&a=delete";
        }
    }
    </script>
</head>

<body>
    <a href="?c=UserList">User Management</a>
    <a href="?c=QuestionList">Question Management</a>  
    <div style="text-align:center; padding:auto;">
        <h2>Question Management</h2>
        <a href="?c=QuestionList&a=add">Add Question</a>
        <p>Total:<font color=red><?php echo $records ?></font>users</p>
    </div>

    <form action="?a=delete" method="POST" align="center">
        <table width="800" border="1" align="center" rules="all" cellpadding="10" >
            <tr>
            <td>Checkbox</td>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Keywords</td>
            <td>Hits</td>
            <td>Create Time</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>

            <?php
            foreach($arrs as $arr){
            ?>

            <tr>
            <td><input type="checkbox" name="qid[]" value="<?php echo $arr['qid']?>" /></td>
            <td><?php echo $arr['qid'] ?></td>
            <td><?php echo $arr['title'] ?></td>
            <td><?php echo $arr['content'] ?></td>
            <td><?php echo $arr['keywords'] ?></td>
            <td><?php echo $arr['hit'] ?></td>
            <td><?php echo date('Y-m-d H:i:s', $arr['date']) ?></td>
            <td><a href="edit.php?qid=<?php echo $arr['qid']?>">edit</a></td>
            <td><a href="#" onClick="Del('<?php echo $arr['qid'] ?>')" >delete</a></td>
            </tr>

            <?php
            }
            ?>
        </table>
        <input type="submit" value="multiple delete" name="multi_delete" onclick="Muti_Del()" />
        <br>
        <div height="50" class="pagination_list">
            <?php
                $c = isset($_GET['c']) ? $_GET['c'] : 'UserList';   
                $page_obj = new Page($page,$total,$c);
                $page_obj->Pagination();
            ?>
        </div>
    </form>


</body>

</html>

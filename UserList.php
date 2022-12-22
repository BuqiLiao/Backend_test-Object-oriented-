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
    function Del(username){

        if(window.confirm("Are you sure to delete " + username + "?")){

            location.href = "?ac=delete&username=" + username;
        }
    }

    function Muti_Del(){
        if(window.confirm("Are you sure to delete all of the users you choose?")){

            location.href = "?ac=delete";
        }
    }
    </script>
</head>

<body> 
    <a href="./UserListController.php">User Management</a>
    <a href="./QuestionListController.php">Question Management</a>
    <div style="text-align:center; padding:auto;">
        <h2>User Management</h2>
        <a href="add.php">Add User</a>
        <p>Total:<font color=red><?php echo $records ?></font>users</p>
    </div>

    <form action="?ac=delete" method="POST" align="center">
        <table width="800" border="1" align="center" rules="all" cellpadding="10" >
            <tr>
            <td>Checkbox</td>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Create Time</td>
            <td>Edit User</td>
            <td>Delete user</td>
            </tr>

            <?php
            foreach($arrs as $arr){
            ?>

            <tr>
            <td><input type="checkbox" name="username[]" value="<?php echo $arr['username']?>" /></td>
            <td><?php echo $arr['id'] ?></td>
            <td><?php echo $arr['username'] ?></td>
            <td><?php echo $arr['email'] ?></td>
            <td><?php echo date('Y-m-d H:i:s', $arr['time']) ?></td>
            <td><a href="edit.php?username=<?php echo $arr['username']?>&email=<?php echo $arr['email']?>">edit</a></td>
            <td><a href="#" onClick="Del('<?php echo $arr['username'] ?>')" >delete</a></td>
            </tr>

            <?php
            }
            ?>
        </table>
        <input type="submit" value="multiple delete" name="multi_delete" onclick="Muti_Del()" />
        <br>
        <div height="50" class="pagination_list">
            <?php
                $page_obj = new Page($page,$total);
                $page_obj->Pagination();
            ?>
        </div>
    </form>


</body>

</html>

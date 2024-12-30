
<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\AdminController.php');
    $getAllUser = $data['getAllUser'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/freshleaf_website/public/css/users.css?v=<?php echo time();?>">
    <title>Users Manager</title>
</head>
<body>
    <div class="title">
        <h1>Users Manager</h1>
    </div>
    <div class="content">
        <div class="navigation">
            <button class="btn">
                <a href="#">Users Manager</a>
            </button>
            <button class="btn">
                <a href="#">Products Manager</a>
            </button>
        </div>
        <div class="tableContent">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows -->
                    <tr>
                        <td><?php $getAllUser['user_id'] ?></td>
                        <td><?php $getAllUser['user_name'] ?></td>
                        <td>johndoe@example.com</td>
                        <td><img src="avatar.jpg" alt="Avatar" class="avatar"></td>
                        <td>********</td>
                        <td>123-456-7890</td>
                        <td>
                            <button class="edit-btn"><i class="fa fa-pencil-square-o" style="font-size:30px"></i></button>
                            <button class="delete-btn"><i class="fa fa-trash-o" style="font-size:30px"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

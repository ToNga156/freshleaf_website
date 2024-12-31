<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\AdminController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/freshleaf_website/public/css/categories.css?v=<?php echo time();?>">
    <title>Users Manager</title>
</head>
<body>
    <div class="title">
        <img src="/freshleaf_website/public/images/logo_website.png" alt="">
        <h1>Users Manager</h1>
        <div class="logout"><a href="/freshleaf_website/User/Logout"><i class="fa fa-sign-out" style="font-size:36px"></i></a></div>
    </div>
    <div class="content">
        <div class="navigation">
            <button class="btn">
                <a href="/freshleaf_website/Admin/UserManager"><i class="fa fa-user-circle-o" style="font-size:36px"></i>Users Manager</a>
            </button>
            <button class="btn">
            <a href="/freshleaf_website/Admin/ProductManager">
            <i class="fas fa-cube" style="font-size:36px"></i>
                Product Manager
            </a>
            </button>
            <button class="btn">
                <a href="">
                <i class="fa fa-list-alt" style="font-size:36px;"></i>Categories
                </a>
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
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Users as $user): ?>
                        <tr class="tableBody">
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['user_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><img src="/Public/Image/<?php echo htmlspecialchars($user['avatar']) ?>" alt="avatar" class="avatar"></td>
                            <td class="password"><?php echo str_repeat('*', strlen($user['password'])); ?></td>
                            <td>0<?php echo $user['phone']; ?></td>
                            <td><?php echo $user['address'] ?></td>
                            <td class="btn">
                            <form method="POST" action="/freshleaf_website/Admin/deleteUser" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                <button type="submit" class="delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                                <div class="contentDetail"><a href=""><i class="fa fa-eye" style="font-size:20px"></i>Xem chi tiết</a></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
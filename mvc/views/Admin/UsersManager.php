
<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\AdminController.php');
    $Users = $data['user'];
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
                        <th>Adress</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows -->
                    <?php foreach ($Users as $user): ?>
                        <tr class="tableBody">
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['user_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><img src="/Public/Image/<?php echo htmlspecialchars($user['avatar']) ?>" alt="avt"></td>
                            <td class="password"><?php echo str_repeat('*', strlen($user['password'])); ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['address'] ?></td>
                            <td>action</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

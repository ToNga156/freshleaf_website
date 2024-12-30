<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/freshleaf_website/public/css/productManager.css?v=<?php echo time();?>">
    <title>Products Manager</title>
</head>
<body>
    <div class="title">
        <h1>Products Manager</h1>
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Decription</th>
                        <th>Unit</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows -->
                    <tr>
                        <td>1</td>
                        <td>Bok Choy</td>
                        <td>25.000</td>
                        <td class="decription">Bok choy is a vegetable very close to Vietnamese and Chinese dishes... It is easy to eat, not too flavorful like other vegetables... Bok choy is known by other names: bok choy, bok choy. Because each leaf sheath bends to look like a spoon. Cabbage has a beautiful green color in the leaves, the stem is fat, a bit short but the sheath is large, the base of the sheath is white. Bok choy is easy to eat, not too flavorful like other vegetables, so it is very popular. Furthermore, this is not an expensive food, but it is good for the body.</td>
                        <td>Bunch</td>
                        <td><img src="" alt="img"></td>
                        <td>Vegestable</td>
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

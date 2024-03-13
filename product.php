<?php
$products = [
    
    ["name" => "Bánh Chocolate", "price" => 10],
    ["name" => "Bánh Red Velvet", "price" => 12],
    ["name" => "Bánh Cheesecake", "price" => 15],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
        <h1>Tiệm Bánh Ngọt</h1>
        <nav>
            <ul>
                <li><a href="home.php">Trang chủ</a></li>
                <li><a href="product.php">Sản phẩm</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
        </nav>
    </header>
    <main>

    <section>
            <h1>Tìm kiếm sản phẩm</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
                <input type="text" name="keyword" placeholder="tìm sản phẩm">
                <button type="submit">Tìm kiếm</button>
            </form>
    </section>

        <section>
            <h2>Sản Phẩm</h2>
    <div class="card" style="width: 10rem;">
  <img src="img/banh 1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 4.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 5.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 6.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 7.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 8.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 9.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 10.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 11.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 12.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 13.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 14.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>

<div class="card" style="width: 10rem;">
  <img src="img/banh 15.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bánh cartoon</h5>
    <p class="card-text">Bánh sinh nhật siêu ngon được làm theo phong cách hoạt hình</p>
    <a href="#" class="btn btn-primary">buy</a>
  </div>
</div>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Tiệm Bánh Ngọt Ngon Nhất Thế Giới</p>
    </footer>
</body>
</html>

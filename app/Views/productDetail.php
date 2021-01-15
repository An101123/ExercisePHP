<div class="row cart">
  <div class="col-6 showCart">
    <a href="http://localhost:8080?action=showCart"><button class="btn btn-primary"><i class="bi bi-cart-plus-fill"></i>Xem giỏ hàng</button> </a>

  </div>
  <div style="text-align: right;" class="col-6">
      <a href="http://localhost:8080"><button class="btn btn-danger"><i class="bi bi-x"></i> </button></a>
    </div>
</div>
<div class="row product-detail">
    <div class="col-4">
        <div class="img-product">
            <img class="product-img" src="<?= $product['image'] ?>" alt="">
        </div>

    </div>
    <div class="col-8 detail">
        <h1><?= $product['name'] ?></h1>
        <h2 style="    color: rgb(230,30,30);
"> $<?= $product['price'] ?></h2>
        <!-- <p><strong>Description:</strong></p> -->
        <p> <?= $product['description'] ?></p>
        <!-- <p><strong>Options:</strong></p> -->
    <form action="http://localhost:8080?action=detail&id=<?= $product['id']?>" method="post">
        <p><strong>Size:</strong></p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="size" value="S" checked>
            <label class="form-check-label" for="inlineRadio1">S</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="size" value="M">
            <label class="form-check-label" for="inlineRadio2">M</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="size" value="L">
            <label class="form-check-label" for="inlineRadio3">L</label>
        </div>
        <p style="margin-top:20px;"><strong>Quantity</strong></p>
        <input type="number" name="quantity" value="1">
        <button type="submit" name="addToCart" style="display:block; margin-top:45px" class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button> 
    </form>
    </div>
</div>
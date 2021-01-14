<div class="row cart">
  <div class="showCart">
    <a href="http://localhost:8080?action=showCart"><button class="btn btn-primary"><i class="bi bi-cart-plus-fill"></i>Xem giỏ hàng</button> </a>

  </div>

</div>
<div class="row">
  <?php foreach ($listProduct as $item) { ?>
    <div class="col-3 product">
      <a href="http://localhost:8080?action=detail&id=<?= $item['id'] ?>">
        <div class="card">
          <img class="card-img-top" src="<?= $item['image'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $item['name'] ?> </h5>
            <p style="color: red">Price: $<?= $item['price'] ?></p>
            <div class="button">
              <button class="btn btn-warning addCart"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button>
              <form action="http://localhost:8080/?action=showCart" method="post">
                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
              <button type="submit" name="buyNow" class="btn btn-danger">Mua ngay</button>
              </form>
            </div>

          </div>
          <img src="" <?= $item['image'] ?>" alt="">
        </div>
      </a>
    </div>
  <?php } ?>
</div>
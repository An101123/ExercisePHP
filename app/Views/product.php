<div class="row cart">
  <div class="showCart">
    <a href="http://localhost:8080?action=showCart"><button class="btn btn-primary"><i class="bi bi-cart-plus-fill"></i>Xem giỏ hàng</button> </a>

  </div>

</div>
<div class="row">
  <?php foreach ($listProduct as $item) { ?>
    <div class="col-3">
      <a href="http://localhost:8080?action=detail&id=<?= $item['id'] ?>">
        <div class="card">
          <img class="card-img-top" src="<?= $item['image'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $item['name'] ?> </h5>
            <p style="color: red">Price: $<?= $item['price'] ?></p>
            <div style="display: flex; justify-content:space-around" class="button">
              <button class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button>
              <button type="button" class="btn btn-danger">Mua ngay</button>
            </div>

          </div>
          <img src="" <?= $item['image'] ?>" alt="">
        </div>
      </a>
    </div>
  <?php } ?>
</div>
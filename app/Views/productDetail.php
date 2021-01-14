<div class="row">
    <div class="col-4">
        <div class="img-product">
            <img class="product-detail" src="<?= $product['image'] ?>" alt="">
        </div>

    </div>
    <div class="col-8">
        <h2><?= $product['name'] ?></h2>
        <p><strong>Description:</strong></p>
        <p> <?= $product['description'] ?></p>
        <p><strong>Options:</strong></p>
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
        <p><strong>Quantity</strong></p>
        <input type="number" name="quantity">
        <button type="submit" name="addToCart" style="display:block; margin-top:100px" class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button> 
    </form>
    </div>
</div>
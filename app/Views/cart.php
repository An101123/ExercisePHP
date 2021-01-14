<div class="container-fluid">
  <div class="row cart-title">
    <div class="col-8">
      <h2 class="cart-title">GIỎ HÀNG</h2>
    </div>
    <div class="col-4">
      <a href="http://localhost:8080"><button class="btn btn-danger"><i class="bi bi-x"></i> </button></a>
    </div>
  </div>



  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Product</th>
        <th scope="col">Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th style="text-align:end" scope="col">Total</th>
        <th scope="col">Action</th>



      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($_SESSION['shoppingCart'])) {
        // var_dump($_SESSION['shoppingCart']);   
        $total = 0;
        foreach ($_SESSION['shoppingCart'] as $values) { ?>
          <tr>
            <td><?= $values['item_name'] ?></td>

            <td><?= $values['item_size'] ?></td>
            <td><?= $values['item_quantity'] ?></td>
            <td><?= $values['item_price'] ?></td>
            <td style="text-align:end"><?php echo ($values['item_quantity'] * $values['item_price']) ?></td>
            <td>
              <form method="post">
                <input type="hidden" name="delete_item_id" value="<?= $values['item_id'] ?>">
                <button type="submit" name="deleteItem" class="btn btn-danger">Delete</button>
              </form>
            </td>

          </tr>
          <?php $total = $total + $values['item_quantity'] * $values['item_price'] ?>

        <?php } ?>
        <tr>
          <td colspan="4" style="text-align:end">Total: </td>
          <td style="text-align:end">
            <?= $total ?></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:end">Discount: </td>
          <td style="text-align:end">
            <?php echo $getVoucher['discount'] ?>%</p>
          </td>
        </tr>

      <?php } ?>



    </tbody>
  </table>
  <div style="margin-bottom:100px;" class="row">
    <div class="col-2">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Thêm voucher</button>
    </div>
    <div class="col-4">
      <div class="show-voucher">
        <p>Voucher đã chọn: <?php echo $getVoucher['title'] ?></p>
      </div>
    </div>
  </div>


  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chọn voucher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="http://localhost:8080/?action=showCart" method="post">
            <?php foreach ($vouchers as  $voucher) { ?>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="voucher" id="exampleRadios1" value="<?php echo $voucher['id'] ?>" />
                <label class="form-check-label" for="exampleRadios1">
                  <?php echo $voucher['title']; ?>
                </label>
              </div>
            <?php } ?>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submitVoucher" class="btn btn-primary">Xác nhận</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="row fixed-bottom order">
    <div class="col-6">
      <strong>Total: <?php echo $total * (100 - $getVoucher['discount']) / 100 ?>$</strong>
    </div>
    <div class="col-6">
      <button type="button" class="btn btn-danger">Mua hàng</button>
    </div>


  </div>
</div>

<script>
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })
</script>
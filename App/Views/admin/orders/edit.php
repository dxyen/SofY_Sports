<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Điều chỉnh và cập nhật đơn hàng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/order">Đơn hàng</a></li>
          <li class="breadcrumb-item active">Điều chỉnh</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<form action="<?= DOCUMENT_ROOT ?>/admin/order/update/<?=  $data['order']['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Thông tin khách hàng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
             <div class="form-group">
               <label for="id">Mã đơn đặt hàng</label>
               <input readonly type="text" id="id_order" name="id_order" class="form-control" value="#<?=  $data['order']['id'] ?>"></input>
             </div>
             <div class="form-group">
               <label for="MSNV">Mã khách hàng</label>
               <input readonly type="text" id="id_name" name="id_name" class="form-control" value="#<?=  $data['order']['idUser'] ?>"></input>
               <input hidden type="hidden" id="idname" name="idname" class="form-control" value="<?=  $data['order']['idUser'] ?>"></input>
             </div>
             <div class="form-group">
               <label for="MSKH">Tên khách hàng</label>
               <input readonly type="text" id="name" name="name" class="form-control" value="<?=  $data['order']['fullname'] ?>"></input>
             </div>
             <div class="form-group">
               <label for="MSKH">Địa chỉ giao hàng</label>
               <input readonly type="text" id="address" name="address" class="form-control" value="<?=  $data['order']['address'] ?>"></input>
             </div>
             <div class="form-group">
               <label for="MSKH">Ngày đặt hàng</label>
               <input readonly type="text" id="orderDate" name="orderDate" class="form-control" value="<?=  $data['order']['orderdate'] ?>"></input>
             </div>
           </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div>
        <!-- right column -->
        <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
            <h3 class="card-title">Điều chỉnh và cập nhật</h3>
            </div>
            <div class="card-body">
            <div class=" form-group">
               <label for="TrangThai">Chọn trạng thái đơn hàng</label>
               <select required class="form-control custom-select" name="status" id="status">
                 <option disabled selected value="" class="text-secondary"><?=  $data['order']['status'] ?></option>
                 <?php foreach($data['status'] as $index => $status) :?>
                 <option value="<?= $status['id'] ?>"><?= $status['name'] ?></option>
                 <?php endforeach ?>
               </select>
             </div>
             <div class=" form-group">
               <label for="NgayGH">Chọn ngày giao hàng</label>
               <input required type="date" id="deliverydate" name="deliverydate" class="form-control" value="<?= date_format(date_create(str_replace("/", "-",  $data['order']['deliverydate'])), "Y-m-d") ?>" onchange="orderValidate()"></input>
             </div>
             <div class="form-group">
               <label for="id">Số loại hàng hóa</label>
               <input readonly type="text" id="id_order" name="id_order" class="form-control" value="<?= $data['amuontOrder']['amount'] ?>"></input>
             </div>
             <div id="orderDetail">
               <?php foreach ($data['ordersById'] as $key => $order) : ?>
                 <div class="form-group">
                   <h4 class="font-weight-bold text-info">Sản phẩm <?= $key + 1 ?></h4>
                   <div class="row">
                     <div class="col-6"><label for="orderDetail">Mã sản phẩm <?= $key + 1 ?></label><input type="text" id="idItem" name="idItem[]" class="form-control" readonly value=#<?= $order['iditem'] ?>></div>
                     <div class="col-6"><label for="orderDetail">Số lượng</label><input type="number" id="orderAmount" name="amountItem[]" class="form-control" required value=<?= $order['amount'] ?> min="0" max="99"></div>
                   </div>

                   <div class="row mt-2">
                    <div class="col-2">
                      <img src="<?= IMAGES_ITEMS_URL ?>/<?= $order['image']?>" class="rounded float-left w-100">
                    </div>
                    <div class="col-10">
                        <div>
                          Tên sản phẩm: <span class="text-dark"><?= $order['itemname']?></span>
                        </div>
                        <div>
                          Đơn giá: <span class="text-dark"><?= number_format($order['price'], 0, '', ',') ?>đ</span>
                        </div>
                    </div>
                  </div>
                 </div>
               <?php endforeach; ?>
             </div>
             <div class="d-flex">
               <b>Tổng tiền: </b>
             <b class="price__total ml-1" id="total"><?=number_format($data['total'], 0, '', ',') ?>đ</b>
             </div>
             <div class=" row">
               <div class="col-12">
                 <a class="btn btn-secondary" href="<?= DOCUMENT_ROOT ?>/admin/order">
                   Hủy
                 </a>
                 <input type="submit" value="Lưu" class="btn btn-success float-right">
               </div>
             </div>
        </div>
        </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </form>
</section>
<!-- /.content -->
<script>
    function onNumOfProductChange() {
        var total = document.getElementById("total");
        var totalNumber = 0;
        if (total != undefined) {
            for (var i = 0; i < <?= count($data['item']) ?>; i++) {
            var numOfItem = document.getElementById("numOfItem" + i).value;
            var priceOfItem = document.getElementById("priceOfItem" + i).value;
            totalNumber += parseInt(numOfItem) * parseInt(priceOfItem);
            }
            total.innerText = new Intl.NumberFormat().format(totalNumber) + "đ";
        }
        return;
    }
    onNumOfProductChange();
</script>
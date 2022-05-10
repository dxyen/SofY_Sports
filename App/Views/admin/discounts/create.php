<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sản phẩm khuyến mãi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/discounts">Sản phẩm khuyến mãi</a></li>
          <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nhập giá sản phẩm khuyến mãi</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= DOCUMENT_ROOT ?>/admin/discounts/store" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="form-group col">
              <label for="exampleInputPassword1">Tên sản phẩm</label>
              <select name="itemId" class="form-control" id="items">
                <option value="" disabled selected>Chọn tên sản phẩm khuyến mãi</option>
                  <?php foreach ($data['item'] as $index => $item) : ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="price">Giá khuyến mãi tùy chọn</label>
              <input name="price_discount" type="number" class="form-control" id="price" placeholder="Giá khuyến mãi" />
            </div>
            <div class="form-group col">
              <label for="exampleInputPassword1">Giá khuyến mãi sản phẩm theo phần trăm</label>
              <select name="discountIdPercent" class="form-control" id="discount">
                <option value="" disabled selected>Chọn phần trăm khuyến mãi</option>
                    <option value="0.1"><p>10% giá sản phẩm</p></option>
                    <option value="0.2"><p>20% giá sản phẩm</p></option>
                    <option value="0.3"><p>30% giá sản phẩm</p></option>
                    <option value="0.4"><p>40% giá sản phẩm</p></option>
                    <option value="0.5"><p>50% giá sản phẩm</p></option>
                    <option value="0.6"><p>60% giá sản phẩm</p></option>
                    <option value="0.7"><p>70% giá sản phẩm</p></option>
                    <option value="0.8"><p>80% giá sản phẩm</p></option>
                    <option value="0.9"><p>90% giá sản phẩm</p></option>
                    <option value="1"><p>100% giá sản phẩm</p></option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class=" form-group">
              <label for="deliverydate">Chọn ngày bắt đầu</label>
              <input required type="date" id="date_start" name="date_start" class="form-control"></input>
            </div>
          </div>
          <div class="row">
            <div class=" form-group">
              <label for="deliverydate">Chọn ngày kết thúc</label>
              <input required type="date" id="date_end" name="date_end" class="form-control"></input>
            </div>
          </div> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer float-right">
          <button type="submit" class="btn btn-success">Hoàn tất</button>
        </div>
      </form>
    </div>
  </div>
</section>
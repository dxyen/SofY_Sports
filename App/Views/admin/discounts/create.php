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
              <select name="itemId" class="form-control" id="category">
                <option value="" disabled selected>Chọn tên sản phẩm khuyến mãi</option>
                  <?php foreach ($data['item'] as $index => $item) : ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col">
              <label for="price">Giá khuyến mãi</label>
              <input name="price_discount" type="number" class="form-control" id="price" placeholder="Giá khuyến mãi" required />
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
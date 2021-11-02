<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Thêm khách hàng</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/customer">Khách hàng</a></li>
          <li class="breadcrumb-item active">Thêm khách hàng</li>
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
        <h3 class="card-title">Nhập thông tin khách hàng mới</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= DOCUMENT_ROOT ?>/admin/customer/store" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
          <div class="form-group col">
            <label for="exampleInputEmail1">Tên khách hàng</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Tên">
          </div>
          <div class="form-group col">
            <label for="exampleInputPassword1">Loại khách hàng</label>
            <select name="categoryId" class="form-control" id="category">
              <option value="" disabled selected>Chọn Loại</option>
                <?php foreach ($data['categories'] as $index => $category) : ?>
                  <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="price">Giá</label>
              <input name="price" type="number" class="form-control" id="price" placeholder="Giá khách hàng" required />
            </div>
            <div class="form-group col">
              <label for="image">Hình khách hàng</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <label class="custom-file-label" for="image">chọn file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="description">Chi tiết sản phẩm</label>
              <textarea class="form-control" name="description" id="description" required></textarea>
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
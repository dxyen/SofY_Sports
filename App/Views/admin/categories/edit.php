<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Điều chỉnh thông tin loại sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/items">Loại sản phẩm</a></li>
          <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thông tin điều chỉnh</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= DOCUMENT_ROOT ?>/admin/categories/update/<?= $data['categories']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="form-group col">
              <label for="name">Tên loại sản phẩm</label>
              <input value="<?= $data['categories']['name'] ?>" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col">
              <label for="image">Hình loại sản phẩm</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <input type="hidden" value="<?=$data['categories']['image']?>" name="image-old" id="image">
                  <label class="custom-file-label" for="image">Chọn file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="description">Chi tiết loại sản phẩm</label>
              <textarea class="form-control" name="description" id="description" required><?= $data['categories']['description'] ?></textarea>
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
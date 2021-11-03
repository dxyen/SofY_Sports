<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Điều chỉnh thông tin admin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/admin">Quản lí admin</a></li>
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
      <form action="<?= DOCUMENT_ROOT ?>/admin/admin/update/<?= $data['admin']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="form-group col">
              <label for="name">Tên đăng nhập admin</label>
              <input value="<?= $data['admin']['name'] ?>" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col">
              <label for="name">Họ và tên</label>
              <input value="<?= $data['admin']['fullname'] ?>" type="text" class="form-control" id="name" name="fullname" required>
            </div>
          </div>
          <div class="row">
          <div class="form-group col">
              <label for="name">Số điện thoại</label>
              <input value="<?= $data['admin']['phone'] ?>" type="number" class="form-control" id="name" name="phone" required>
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
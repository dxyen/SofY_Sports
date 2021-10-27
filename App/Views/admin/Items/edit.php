<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Điều chỉnh thông tin sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/items">Sản phẩm</a></li>
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
      <form action="<?= DOCUMENT_ROOT ?>/admin/items/update/<?= $data['item']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="form-group col">
              <label for="name">Tên sản phẩm</label>
              <input value="<?= $data['item']['name'] ?>" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col">
              <label for="category">Loại sản phẩm</label>
              <select name="categoryId" class="form-control" id="category" required>
                <?php foreach ($data['categories'] as $index => $category) : ?>
                  <option value="<?= $category['id'] ?>" <?= $category['id'] == $data['item']['id_sport_type'] ? "selected" : "" ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="price">Price</label>
              <input value="<?= $data['item']['price'] ?>" name="price" type="number" class="form-control" id="price" required />
            </div>
            <div class="form-group col">
              <label for="image">Hình sản phẩm</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <input type="hidden" value="<?=$data['item']['image']?>" name="image-old" id="image">
                  <label class="custom-file-label" for="image">Chọn file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="description">Chi tiết sản phẩm</label>
              <textarea class="form-control" name="description" id="description" required><?= $data['item']['description'] ?></textarea>
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
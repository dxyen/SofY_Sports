    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Điều chỉnh Banners</h1>
            <div class="alert">
              <?php require_once(VIEW . DS . "/shared/notification.php") ?>
            </div>
          </div>    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Trang chủ</a></li>
              <li class="breadcrumb-item active">Điều chỉnh banners</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5>Danh sách Banners</h5>
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT?>/admin/banners/create">Thêm Banners</a>
                  </div>
                </div>

              <div class="card-body">
                <table id="Mytable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên Banner</th>
                    <th>Hình Banner</th>>
                    <th>Tùy chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['banner'] as $index => $banner) : ?>
                      <tr>
                        <td><?=$index +1 ?></td>
                        <td><?=$banner['name']?></td>
                        <td><img style="max-width: 100px;" class="rounded img-thumbnail" src="<?=IMAGES_URL?>/<?= $banner['image']?>" alt="image banner"/></td>
                        <td> 
                          <div class=" btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="ml-1 btn btn-danger identifyingClass" data-toggle="modal" data-target="#modal-delete<?=$index?>" data-id="my_id_value"><i class="far fa-trash-alt"></i> Xóa</button>
                            <!-- modal -->
                            <div class="modal fade" id="modal-delete<?=$index?>" aria-labelledby="my_modalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle<?= $index ?>">Xác nhận xóa</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Xóa <?= $banner['name']?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                            <a href="<?=DOCUMENT_ROOT?>/admin/banners/delete/<?=$banner['id']?>"><button type="button" class="btn btn-success">Xóa</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loại Sảm Phẩm</h1>
          </div>    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Trang chủ</a></li>
              <li class="breadcrumb-item active">Loại sản phẩm</li>
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
                    <h5>Danh sách loại sản phẩm</h5>
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT?>/admin/categories/create">Thêm loại</a>
                  </div>
                </div>

              <div class="card-body">
                <table id="Mytable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên loại</th>
                    <th>Chi tiết</th>
                    <th>Hình ảnh </th>
                    <th>Tùy chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['categories'] as $index => $categories) : ?>
                        <tr>
                            <td><?=$index +1 ?></td>
                            <td><?=$categories['name']?></td>
                            <td><?=$categories['description']?></td>
                            <td><img style="max-width: 100px;" class="rounded img-thumbnail" src="<?=IMAGES_URL?>/<?= $categories['image']?>" alt="image categories"/></td>
                            <td>
                              <div class="d-block justify-content-center btn-group" role="group" aria-label="Basic example">
                                  <a href="<?=DOCUMENT_ROOT?>/admin/categories/edit/<?=$categories['id']?>"><button type="button" class="ml-3 btn btn-info"><i class="fas fa-tools"></i> Sửa</button></a>
                                  <button type="button" class="ml-1 btn btn-danger identifyingClass" data-toggle="modal" data-target="#modal-delete<?=$index?>" data-id="my_id_value"><i class="far fa-trash-alt"></i> Xóa</button>
                              </div>
                              <!-- modal -->
                              <div class="modal fade" id="modal-delete<?=$index?>" aria-labelledby="my_modalLabel">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle<?= $index ?>">Xác nhận xóa</h5>
                                          </div>
                                          <div class="modal-body">
                                              <p>Xóa <?= $categories['name']?></p>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                              <a href="<?=DOCUMENT_ROOT?>/admin/categories/delete/<?=$categories['id']?>"><button type="button" class="btn btn-success">Xóa</button></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end modal -->
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
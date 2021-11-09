    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bình luận</h1>
          </div>    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Trang chủ</a></li>
              <li class="breadcrumb-item active">Bình luận</li>
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
                    <h5>Danh sách bình luận</h5>
                  </div>
                </div>

              <div class="card-body">
                <table id="Mytable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên người dùng</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung bình luận</th>
                    <th>Tùy chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['comment'] as $index => $comment) : ?>
                        <tr>
                            <td><?=$index +1 ?></td>
                            <td><?=$comment['fullname']?></td>
                            <td><?=$comment['name']?></td>
                            <td><?=$comment['comment']?></td>
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
                                                  <p>Xóa bình luận:<?= $comment['comment']?></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                                  <a href="<?=DOCUMENT_ROOT?>/admin/comment/delete/<?=$comment['id']?>"><button type="button" class="btn btn-success">Xóa</button></a>
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

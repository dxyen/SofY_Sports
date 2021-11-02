    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Khách hàng</h1>
          </div>    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý Khách hàng</li>
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
                    <h5>Danh sách khách hàng</h5>
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT?>/admin/customer/create">Thêm khách hàng</a>
                  </div>
                </div>

              <div class="card-body">
                <table id="Mytable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên user</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ 1</th>
                    <th>Địa chỉ 2</th>
                    <th>Email</th>
                    <th>Tùy chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['customer'] as $index => $customer) : ?>
                        <tr>
                            <td><?=$index +1 ?></td>
                            <td><?=$customer['name']?></td>
                            <td><?=$customer['fullname']?></td>
                            <td><?=$customer['phone']?></td>
                            <td><?=$customer['address']?></td>
                            <td><?=$customer['address2']?></td>
                            <td><?=$customer['email']?></td>
                            <td>
                              <div class="justify-content-center btn-group" role="group" aria-label="Basic example">
                                  <a href="<?=DOCUMENT_ROOT?>/admin/categories/edit/<?=$customer['id']?>"><button type="button" class="ml-3 btn btn-info"><i class="fas fa-tools"></i> Sửa</button></a>
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
                                              <p>Xóa <?= $customer['name']?></p>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                              <a href="<?=DOCUMENT_ROOT?>/admin/categories/delete/<?=$customer['id']?>"><button type="button" class="btn btn-success">Xóa</button></a>
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
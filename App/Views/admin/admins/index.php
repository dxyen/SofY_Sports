    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
            <div class="alert">
              <?php require_once(VIEW . DS . "/shared/notification.php") ?>
            </div>
          </div>    
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý Admin</li>
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
                    <h5>Danh sách Admin</h5>
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
                    <th>Tùy chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['admins'] as $index => $admins) : ?>
                        <tr>
                            <td><?=$index +1 ?></td>
                            <td><?=$admins['name']?></td>
                            <td><?=$admins['fullname']?></td>
                            <td><?=$admins['phone']?></td>
                            <td>
                              <div class="justify-content-center btn-group" role="group" aria-label="Basic example">
                                  <a href="<?=DOCUMENT_ROOT?>/admin/admin/edit/<?=$admins['id']?>"><button type="button" class="ml-3 btn btn-info"><i class="fas fa-tools"></i> Sửa</button></a>
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
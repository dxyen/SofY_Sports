    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
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
                    <a class="btn btn-primary" href="<?=DOCUMENT_ROOT?>/admin/admin/create">Thêm admin</a>
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
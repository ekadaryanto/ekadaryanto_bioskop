<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('username')?></span>
                    <img class="img-profile rounded-circle"
                        src="<?=base_url()?>assets/sb-admin-2/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <!-- START-DATA-TABLE -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="col-12">
            <form action="<?=site_url('admin/tayang/doUpdate')?>" method="POST" role="form">
                <legend>Form Update Tayang</legend>
            
                <div class="form-group">
                    <label for="">Nama Bioskop</label>
                    <select name="kd_bioskop" id="input" class="form-control" required="required">
                        <?php foreach ($bioskop as $b): ?>
                            <option value="<?=$b->kd_bioskop?>" <?php echo ($b->kd_bioskop == $data[0]->kd_bioskop) ? ' selected="selected"' : '';?> ><?=$b->nama_bioskop?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Judul Film</label>
                    <select name="judul_film" id="input" class="form-control" required="required">
                        <?php foreach ($film as $f): ?>
                            <option value="<?=$f->kd_film?>" <?php echo ($f->kd_film == $data[0]->kd_film) ? ' selected="selected"' : '';?> ><?=$f->judul_film?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Waktu Tayang</label>
                    <input name="tgl_waktu_tayang" type="text" class="form-control" id="datetimepicker1" value="<?php
                                            $date = date_create($data[0]->tgl_waktu_tayang);
                                            echo date_format($date,'d-m-Y H:i');
                                        ?>">
                </div>

                <div class="form-group">
                    <label for="">Jumlah Kursi</label>
                    <input name="jml_kursi" type="text" class="form-control" value="<?=$data[0]->jml_kursi?>">
                    <input name="id" type="hidden" class="form-control" value="<?=$data[0]->id?>">
                </div>
            
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <!-- END-DATA-TABLE -->

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
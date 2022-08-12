<!-- Content Start -->
<div class="content">
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <!-- <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
                <span class="d-none d-lg-inline-flex"><?=$this->session->userdata('username')?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
        <a href="<?=site_url('admin/film/create')?>" type="button" class="btn btn-primary mb-3">Input Film</a>
            
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Film</th>
                            <th scope="col">Judul Film</th>
                            <th scope="col">Tanggal Launching</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($data as $val): ?>
                        <tr>
                            <td scope="row"><?=$no++?></td>
                            <td><?=$val->kd_film?></td>
                            <td><?=$val->judul_film?></td>
                            <td><?=$val->tgl_launch?></td>
                            <td><?=$val->synopsis?></td>
                            <td>
                                <a href="<?=site_url('admin/film/update/').$val->id?>" type="button" class="btn btn-warning">Update</a>
                                <a href="<?=site_url('admin/film/doDelete/').$val->id?>" type="button" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
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
        <a href="<?=site_url('admin/tayang/create')?>" type="button" class="btn btn-primary mb-3">Input Tayang</a>
            
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Tayang</th>
                            <th scope="col">Judul Film</th>
                            <th scope="col">Waktu Tayang</th>
                            <th scope="col">Jumlah Kursi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $no=1;
                            foreach ($data as $d): ?>
                            <tr>
                                <td scope="row"><?=$no++?></td>
                                <td><?=$d->kd_tayang?></td>
                                <td><?=$d->judul_film?></td>
                                <td>
                                    <?php
                                        $date = date_create($d->tgl_waktu_tayang);
                                        echo date_format($date,'d-m-Y H:i');
                                    ?>
                                </td>
                                <td><?=$d->jml_kursi?></td>
                                <td>
                                    <a href="<?=site_url('admin/tayang/update/').$d->id?>" type="button" class="btn btn-warning">Update</a>
                                    <a href="<?=site_url('admin/tayang/doDelete/').$d->id?>" type="button" class="btn btn-danger">Delete</a>
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
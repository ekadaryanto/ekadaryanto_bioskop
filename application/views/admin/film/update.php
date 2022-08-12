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
                <a href="<?=site_url('admin/login/doLogout')?>" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <form action="<?=site_url('admin/film/doUpdate')?>" method="POST" role="form">
                <h6 class="mb-4">Form Update Film</h6>
                <div class="form-floating mb-3">
                    <input type="hidden" name="id" class="form-control" value="<?=$data[0]->id?>">
                    <input type="text" name="judul_film" class="form-control" id="floatingInput" value="<?=$data[0]->judul_film?>">
                    <label for="floatingInput">Judul Film</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tgl_launch" class="form-control" id="datepicker" value="<?php
                                            $date = date_create($data[0]->tgl_launch);
                                            echo date_format($date,'d-m-Y');
                                        ?>">   
                    <label for="floatingInput">Tanggal Launch</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="synopsis"
                        id="floatingTextarea" style="height: 150px;"><?=$data[0]->synopsis?></textarea>
                    <label for="floatingTextarea">Synopsis</label>
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
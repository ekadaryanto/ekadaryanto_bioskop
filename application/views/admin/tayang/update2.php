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
            <form action="<?=site_url('admin/tayang/doUpdate')?>" method="POST" role="form">
                <h6 class="mb-4">Form Update Tayang</h6>
                <div class="form-floating mb-3">
                    <select name="kd_bioskop" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <?php foreach ($bioskop as $b): ?>
                            <option value="<?=$b->kd_bioskop?>" <?php echo ($b->kd_bioskop == $data[0]->kd_bioskop) ? ' selected="selected"' : '';?> ><?=$b->nama_bioskop?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="floatingSelect">Nama Bioskop</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="judul_film" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <?php foreach ($film as $f): ?>
                            <option value="<?=$f->kd_film?>" <?php echo ($f->kd_film == $data[0]->kd_film) ? ' selected="selected"' : '';?> ><?=$f->judul_film?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="floatingSelect">Judul Film</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tgl_waktu_tayang" class="form-control" id="datetimepicker1" value="<?php
                                            $date = date_create($data[0]->tgl_waktu_tayang);
                                            echo date_format($date,'d-m-Y H:i');
                                        ?>">
                    <label for="floatingInput">Waktu Tayang</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="jml_kursi" class="form-control" value="<?=$data[0]->jml_kursi?>">  
                    <input name="id" type="hidden" class="form-control" value="<?=$data[0]->id?>"> 
                    <label for="floatingInput">Jumlah Kursi</label>
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
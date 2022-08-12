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
                <span class="d-none d-lg-inline-flex"><?=$this->session->userdata('username');?></span>
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
            <form action="<?=site_url('admin/bioskop/doUpdate')?>" method="POST" role="form">
                <h6 class="mb-4">Form Update Bioskop</h6>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_bioskop" class="form-control"
                        value="<?=$data[0]->nama_bioskop?>">
                    <input type="hidden" name="id" class="form-control" value="<?=$data[0]->id?>">
                    <label for="floatingInput">Nama Bioskop</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="alamat_bioskop" placeholder="Leave a comment here"
                        id="floatingTextarea" style="height: 150px;"><?=$data[0]->alamat_bioskop?></textarea>
                    <label for="floatingTextarea">Alamat Bioskop</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" name="kota" class="form-control" id="floatingInput" value="<?=$data[0]->kota?>">
                    <label for="floatingInput">Kota</label>
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
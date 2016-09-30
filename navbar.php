
<!--Navbar-->
<nav class="navbar navbar-dark bg-primary">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand">Aplikasi Pembayaran</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Pembayaran</a>
                </li>
     
                <li class="nav-item btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master Data</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1"> 
                        <a href="aplikasi.php" class="dropdown-item ">Aplikasi</a>                      
                        <a href="jabatan.php" class="dropdown-item ">Jabatan</a>
                        <a href="kas.php" class="dropdown-item ">Kas</a>
                        <a class="dropdown-item">Otoritas</a>
                        <a href="user.php" class="dropdown-item">User</a>
                    </div>
                </li>
                 <li class="nav-item">
                    <a href="www.andaglos.com" class="nav-link">About</a>
                </li>
            </ul>
            <!--Search form-->
            <form class="form-inline">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navbar-->

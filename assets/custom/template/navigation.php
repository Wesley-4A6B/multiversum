<nav class="navbar navbar-expand-lg navbar-light bg-light custom-mb">
    <div class="container">
    <a class="navbar-brand" href="/home">Multiversum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/home"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cat"><i class="fas fa-book"></i> Catalogus</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/contact"><i class="fas fa-envelope"></i> Contact</a>
        </li> -->
        </ul>
        <ul class="navbar-nav mr-right">
        <?php
            if(!isset($_SESSION['uid'])) :
        ?>
            <li class="nav-item">
                <a class="nav-link" href="/login"><i class="fas fa-user"></i> Login</a>
            </li>
        <?php endif; ?>    
        <?php
            if(isset($_SESSION['uid']) && $_SESSION['uid'] != '') : 
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> <?php echo $_SESSION['uid']['admin_first_name'].' '.$_SESSION['uid']['admin_last_name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/admin">Admin Panel</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/afmelden">Afmelden</a>
            </div>
        </li>
        <?php endif; ?>
        </ul>
    </div>
    </div>
</nav>

<div class="container custom-mb">
    <div class="row">
        <div class="col-md-3">
            <img src="assets/custom/img/mvm-300x224.png" class="logo" alt="Multiversum">
        </div>  
        <div class="col-md-6" style="margin-top: 20px;">
        <form action="/search" method="post" class="form-inline my-2 my-lg-0 max-width">
            <input class="form-control mr-sm-2 search max-width" type="text" name="searchinfo" placeholder="Zoek producten.." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" name="search" style="height: 50px; width: 50px; margin-left: -12px; border-color: #e5e5e5; border-left: none;" type="submit"><i class="fas fa-search"></i></button>
        </form>
        </div>  
        <div class="col-md-1 offset-md-2" style="margin-top: 30px;">
            <a href="/cart">
                <i class="fas fa-shopping-cart" style="font-size: 30px; color: #2C3E50;"></i>
                <?php 
                    if (isset($_SESSION['amountInCart'])) {
                        $amount = $_SESSION['amountInCart'];
                    } else {
                        $amount = 0;
                    }
                ?>
                <span class="badge badge-secondary"><?= $amount; ?></span>
            </a>
        </div>
    </div>
</div>
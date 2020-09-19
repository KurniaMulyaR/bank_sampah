<style type="text/css">
    .brand1{
      height: 100px;
    }
    .logout{
    margin-left: 250px;
    }
  @media (max-width: 765px) {
    .logout{
      margin-left: 0px;
    } 
    .brand{
    height: 68px;
    padding-right: 280px;
    }
    .btuin{
      margin-left: 20px;
      } }
    @media (max-width: 429px) { 
    .brand{
    margin-left: 18px;
    padding-right: 20px;
    }
  .tggl{
      margin-left: 80px !important;
      }
      .btuin{
        margin-left: 15px;
        } }
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success">
    <div class="container">
    <div class="row">
  <a class="navbar-brand" href="index.php"><img src="../img/bsip3.png" class="brand1 brand"></a>
  <button class="navbar-toggler tggl" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">      
        <a href="profile_bank_sampah.php" class="nav-item nav-link ml-3 text-light" style="font-size: 20px;">Tentang Bank Sampah</a>
      </li>
      <li class="nav-item">
      <a href="profile_user.php" class="nav-item nav-link ml-3 text-light" style="font-size: 20px;">Tentang <?= $_SESSION["nama"]; ?></a>
      </li>
      <li class="logout btn-secondary">
      <a href="logout.php" class="nav-item nav-link text-light btuin" style="font-size: 20px;">Keluar Akun</a>
     </li>
    </ul>
  </div>
  </div>
  </div>
</nav>
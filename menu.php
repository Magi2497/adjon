<?php include 'includes/data.php';?>

<nav id="topmenu" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/cars/">Cars</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/cars/">Listado <span class="sr-only">(current)</span></a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Modelos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <?php
foreach ($cotxes as $cotxe) {
    echo '<a class="dropdown-item" href="ficha.php?code=', $cotxe["code"], '">', $cotxe['name'], '</a>';
}
?>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link"  href="preus.php" tabindex="-1" >Preus</a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0" action="resultats.php" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">cercar</button>
          </form>
        </div>
      </nav>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#"><h5>Home</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><h5>Catatan Perjalanan</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><h5>Isi Data</h5></a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>   

      {{-- text area --}}
      <div class="perjalanan">
        <h1>PEDULI DIRI</h1>
        <p>Catatan Perjalanan</p>
        <textarea name="" id="" cols="100" rows="10" >Selamat Datang nama 'User' di Aplikasi ini</textarea>
        <br><br>
        <button type="submit">Lanjut</button>
      </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>



<?php
session_start();
require_once 'Database.php';
require_once 'Crud.php';

// inisialisasi object
$obj = new Crud();

// handle Form Registrasi
if (isset($_POST['register'])) {
  // cek datanya ada apa nggak
  if ($_POST['username'] === "" && $_POST['email'] === "" && $_POST['password'] === "") {
    echo "<script>alert('data tidak boleh kosong');</script>";
  } else {
    // ambil data
    $data = [
      "username" => $_POST['username'],
      "nama_depan" => "",
      "nama_belakang" => "",
      "email" => $_POST['email'],
      "organisasi" => "",
      "nomor_hp" => "",
      "alamat" => "",
      "password" => $_POST['password'],
      "image" => "ibabs.png",
    ];

    // simpan ke database
    $obj->post("users", $data);
    echo "<script>
            alert('user berhasil ditambahkan');
            document.location.href='../login.php';
          </script>";
  }
}
// end handle Form Registrasi


// handle Form Login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // cek apakah datanya ada
  if ($email === "" && $password === "") {
    echo "<script>alert('data tidak boleh kosong');</script>";
  } else {
    // ambil data dari database
    $data_user = $obj->get("users", ["email = '$email'"]);
    $data_user = $data_user->fetch(PDO::FETCH_ASSOC);

    // cek apakah email benar
    if (strcmp($email, $data_user['email']) === 0) {
      // cek apakah password benar
      if (strcmp($password, $data_user['password']) === 0) {
        // set session
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data_user['id'];

        // pindahkan ke halaman admin
        header("Location: ../admin/index.php");
      } else {
        echo "<script>
                alert('username atau password ada masalah');
                document.location.href='../login.php';
              </script>";
      }
    } else {
      echo "<script>
                alert('username atau password ada masalah');
                document.location.href='../login.php';
              </script>";
    }
  }
}


// handle Form Setting Account
if (isset($_POST['edit-account'])) {
  $id_user = $_POST['id'];
  $password = $_POST['password'];
  $gambar_akun_lama = $_POST['gambar_akun_lama'];

  // ambil data user dari database
  $data_user = $obj->get("users", ["id = $id_user"]);
  $data_user = $data_user->fetch(PDO::FETCH_ASSOC);

  // cek apakah password sesuai dengan didatabase
  if (strcmp($password, $data_user['password']) === 0) {
    // ambil property image
    $nama_file = $_FILES['gambar_akun']['name'];
    $ukuran_gambar = $_FILES['gambar_akun']['size'];
    $tipe = $_FILES['gambar_akun']['type'];
    $error_image = $_FILES['gambar_akun']['error'];
    $tmp_name = $_FILES['gambar_akun']['tmp_name'];

    // cek apakah gambar sudah di upload
    if ($error_image === 4) {
      // ambil data form
      $data = [
        "username" => $_POST['username'],
        "nama_depan" => $_POST['nama_depan'],
        "nama_belakang" => $_POST['nama_belakang'],
        "email" => $_POST['email'],
        "organisasi" => $_POST['organisasi'],
        "nomor_hp" => $_POST['nomor_hp'],
        "alamat" => $_POST['alamat'],
        "password" => $password,
        "image" => $gambar_akun_lama,
      ];

      // update data user
      $obj->put("users", $data, ["id = $id_user"]);
      
      echo "<script>
              alert('Profile anda berhasil diupdate!');
              document.location.href='../admin/account.php';
            </script>";
    } else {
      // cek tipe file yang diupload
      $extensi_dibolehkan = ["jpg", "png", "jpeg"];
      $extensi_file = explode(".", $nama_file);
      $extensi_file = strtolower(end($extensi_file));
      if (!in_array($extensi_file, $extensi_dibolehkan)) {
        echo "<script>
              alert('format gambar anda tidak diijinkan');
              document.location.href='../admin/account.php';
            </script>";
      }
  
      // validasi ukuran gambar
      if ($ukuran_gambar > 5000000) {
        echo "<script>
              alert('gambar anda terlalu besar');
              document.location.href='../admin/account.php';
            </script>";
      }
  
      // generate nama baru
      $nama_file_baru = uniqid();
      $nama_file_baru .= ".";
      $nama_file_baru .= $extensi_file;
  
      // pindahkan ke folder uploads
      move_uploaded_file($tmp_name, "../admin/uploads/" . $nama_file_baru);
  
      // ambil data form
      $data = [
        "username" => $_POST['username'],
        "nama_depan" => $_POST['nama_depan'],
        "nama_belakang" => $_POST['nama_belakang'],
        "email" => $_POST['email'],
        "organisasi" => $_POST['organisasi'],
        "nomor_hp" => $_POST['nomor_hp'],
        "alamat" => $_POST['alamat'],
        "password" => $password,
        "image" => $nama_file_baru,
      ];
  
      // update data user
      $obj->put("users", $data, ["id = $id_user"]);
      
      echo "<script>
              alert('Profile anda berhasil diupdate!');
              document.location.href='../admin/account.php';
            </script>";
    }
  } else {
    echo "<script>
            alert('password anda bermasalah! Gagal update data profile.');
            document.location.href='../admin/account.php';
          </script>";
  }
}


// handle Form Ubah Password
if (isset($_POST['ubah_pw'])) {
  $id_user = $_POST['id'];
  $password_lama = $_POST['password_lama'];
  $password_baru = $_POST['password_baru'];
  $password_baru2 = $_POST['password_baru2'];

  // ambil data dari database
  $data_user = $obj->get('users', ["id = $id_user"]);
  $data_user = $data_user->fetch(PDO::FETCH_ASSOC);

  // cek apakah password lama sudah sesuai dengan database
  if (strcmp($password_lama, $data_user['password']) === 0) {
    // cek apakah password baru dua duanya sudah sama
    if (strcmp($password_baru, $password_baru2) === 0) {
      $data = [
        "username" => $_POST['username'],
        "nama_depan" => $_POST['nama_depan'],
        "nama_belakang" => $_POST['nama_belakang'],
        "email" => $_POST['email'],
        "organisasi" => $_POST['organisasi'],
        "nomor_hp" => "+62" . $_POST['nomor_hp'],
        "alamat" => $_POST['alamat'],
        "password" => $password_baru,
        "image" => $_POST['image'],
      ];

      // update database
      $obj->put("users", $data, ["id = $id_user"]);

      echo "<script>
            alert('Password anda berhasil diupdate!');
            document.location.href='../admin/index.php';
          </script>";
    } else {
      echo "<script>
            alert('Password baru anda tidak sama! Password gagal di update.');
            document.location.href='../admin/change_pw.php';
          </script>";
    }
  } else {
    echo "<script>
            alert('Password lama anda salah! Password gagal di update.');
            document.location.href='../admin/change_pw.php';
          </script>";
  }
}


// handle Form Tambah Product
if (isset($_POST['tambah_product'])) {
  // ambil atribute file dan post
  $nama_product = $_POST['nama_product'];
  $harga_product = $_POST['harga_product'];
  $ketersediaan = $_POST['ketersediaan'];

  $nama_file = $_FILES['gambar_product']['name'];
  $ukuran_gambar = $_FILES['gambar_product']['size'];
  $tipe = $_FILES['gambar_product']['type'];
  $error_image = $_FILES['gambar_product']['error'];
  $tmp_name = $_FILES['gambar_product']['tmp_name'];

  // cek apakah gambar di upload
  if($error_image === 4) {
    echo "<script>
            alert('anda harus upload gambar terlebih dulu');
            document.location.href='../admin/tambah_product.php';
          </script>";
  }

  // cek extensi file
  $extensi_dibolehkan = ["jpg", "png", "jpeg"];
  $extensi_file = explode(".", $nama_file);
  $extensi_file = strtolower(end($extensi_file));
  if(!in_array($extensi_file, $extensi_dibolehkan)) {
    echo "<script>
            alert('format gambar anda tidak diijinkan');
            document.location.href='../admin/tambah_product.php';
          </script>";
  }

  // cek ukuran gambar
  if ($ukuran_gambar > 5000000) {
    echo "<script>
            alert('gambar anda terlalu besar');
            document.location.href='../admin/tambah_product.php';
          </script>";
  }

  // generate nama baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= ".";
  $nama_file_baru .= $extensi_file;

  // pindahkan gambar ke folder tujuan
  move_uploaded_file($tmp_name, "../admin/uploads/product/" . $nama_file_baru);

  // siapkan data
  $data = [
    "nama_product" => $nama_product,
    "harga_product" => $harga_product,
    "ketersediaan" => $ketersediaan,
    "image" => $nama_file_baru,
  ];

  // update data user
  $obj->post("product", $data);
  
  echo "<script>
          alert('Data Product berhasil ditambahkan!');
          document.location.href='../admin/index.php';
        </script>";
}


// handle Form Edit Product
if (isset($_POST['edit_product'])) {
  // ambil atribute file dan post
  $id_product = $_POST['id_product'];
  $nama_product = $_POST['nama_product'];
  $harga_product = $_POST['harga_product'];
  $ketersediaan = $_POST['ketersediaan'];
  $gambar_product_lama = $_POST['gambar_product_lama'];

  $nama_file = $_FILES['gambar_product']['name'];
  $ukuran_gambar = $_FILES['gambar_product']['size'];
  $tipe = $_FILES['gambar_product']['type'];
  $error_image = $_FILES['gambar_product']['error'];
  $tmp_name = $_FILES['gambar_product']['tmp_name'];

  // cek apakah gambar di upload
  if($error_image === 4) {
    // siapkan data
    $data = [
      "nama_product" => $nama_product,
      "harga_product" => $harga_product,
      "ketersediaan" => $ketersediaan,
      "image" => $gambar_product_lama,
    ];

    // update data user
    $obj->put("product", $data, ["id_product = $id_product"]);
    
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href='../admin/index.php';
          </script>";
  } else {
    // cek extensi file
    $extensi_dibolehkan = ["jpg", "png", "jpeg"];
    $extensi_file = explode(".", $nama_file);
    $extensi_file = strtolower(end($extensi_file));
    if(!in_array($extensi_file, $extensi_dibolehkan)) {
      echo "<script>
              alert('format gambar anda tidak diijinkan');
              document.location.href='../admin/tambah_product.php';
            </script>";
    }

    // cek ukuran gambar
    if ($ukuran_gambar > 5000000) {
      echo "<script>
              alert('gambar anda terlalu besar');
              document.location.href='../admin/tambah_product.php';
            </script>";
    }

    // generate nama baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= ".";
    $nama_file_baru .= $extensi_file;

    // pindahkan gambar ke folder tujuan
    move_uploaded_file($tmp_name, "../admin/uploads/product/" . $nama_file_baru);

    // siapkan data
    $data = [
      "nama_product" => $nama_product,
      "harga_product" => $harga_product,
      "ketersediaan" => $ketersediaan,
      "image" => $nama_file_baru,
    ];

    // update data user
    $obj->put("product", $data, ["id_product = $id_product"]);
    
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href='../admin/index.php';
          </script>";
  }
}
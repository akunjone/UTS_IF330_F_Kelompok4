<?php

define('HOSTNAME', 'localhost');
define('MYSQLUSER', 'root');
define('MYSQLPASS', '');
define('MYSQLDB', 'event');

try {
    $koneksi = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . MYSQLDB, MYSQLUSER, MYSQLPASS);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $EventID = $_POST['EventID'];
    $NamaEvent = $_POST['NamaEvent'];
    $Tanggal = $_POST['Tanggal'];
    $Waktu = $_POST['Waktu'];
    $Lokasi = $_POST['Lokasi'];
    $Deskripsi = $_POST['Deskripsi'];
    $Kapasitas = $_POST['Kapasitas'];
    
    if (!empty($_FILES["Foto"]["name"])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["Foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        $check = getimagesize($_FILES["Foto"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1 && move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
            $Foto = basename($_FILES["Foto"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            $Foto = ''; //klo fail
        }
    } else {
        //klo gaada foto yg diupload
        $query = "SELECT Foto FROM events WHERE EventID = :EventID";
        $statement = $koneksi->prepare($query);
        $statement->bindParam(':EventID', $EventID);
        $statement->execute();
        $existingEvent = $statement->fetch(PDO::FETCH_ASSOC);
        $Foto = $existingEvent['Foto']; //pake yg sudah ada
    }

    $query = "UPDATE events 
              SET NamaEvent = :NamaEvent, 
                  Tanggal = :Tanggal, 
                  Waktu = :Waktu, 
                  Lokasi = :Lokasi, 
                  Deskripsi = :Deskripsi, 
                  Kapasitas = :Kapasitas,
                  Foto = :Foto
              WHERE EventID = :EventID";

    $statement = $koneksi->prepare($query);
    $statement->bindParam(':NamaEvent', $NamaEvent);
    $statement->bindParam(':Tanggal', $Tanggal);
    $statement->bindParam(':Waktu', $Waktu);
    $statement->bindParam(':Lokasi', $Lokasi);
    $statement->bindParam(':Deskripsi', $Deskripsi);
    $statement->bindParam(':Kapasitas', $Kapasitas);
    $statement->bindParam(':Foto', $Foto);
    $statement->bindParam(':EventID', $EventID);

    if ($statement->execute()) {
        if ($statement->rowCount() > 0) {
            echo "<script>
                    alert('Event successfully updated!');
                    window.location.href = '../admin/viewregistrant.php';
                  </script>";
        } else {
            echo "<script>
                    alert('No changes were made.');
                    window.location.href = '../admin/viewevent.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Update failed! Please try again.');
                window.location.href = '../admin/viewevent.php';
              </script>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$koneksi = null;

?>

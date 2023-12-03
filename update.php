<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        
        $nama = isset($_POST['nama']) ? $_POST['nama'] : NULL;
        $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        
        
        $stmt = $pdo->prepare('UPDATE kontak SET nama = ?, jurusan = ?, email = ?, password = ?, jenis_kelamin = ?, tanggal_lahir = ?, alamat = ? WHERE nama = ?');
        $stmt->execute([$nama, $jurusan, $email, $password, $jenis_kelamin, $tanggal_lahir, $alamat, $_GET['nama']]);
        $msg = 'Updated Successfully!';
    }
    
    $stmt = $pdo->prepare('SELECT * FROM kontak WHERE nama = ?');
    $stmt->execute([$_GET['nama']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update <?=$contact['nama']?></h2>
    <form action="update.php?id=<?=$contact['nama']?>" method="post">
        <label for="nama">Nama</label>
        <label for="jurusan">Jurusan</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <input type="text" name="jurusan" value="<?=$contact['jurusan']?>" id="jurusan">
        <label for="email">Email</label>
        <label for="password">Password</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <input type="text" name="password" value="<?=$contact['password']?>" id="paassword">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="text" name="jenis_kelamin" value="<?=$contact['jenis_kelamin']?>" id="title">
        <input type="date" name="tanggal_lahir" value="<?=$contact['tanggal_lahir']?>" id="title">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?=$contact['alamat']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $nama = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
     
    $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

    
    $stmt = $pdo->prepare('INSERT INTO kontak VALUES (nama, jurusan, email, password, jenis_kelamin, tanggal_lahir, alamat)');
    $stmt -> execute ([$nama, $jurusan, $email, $password, $jenis_kelamin, $tanggal_lahir, $alamat]);
    
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Form formulir')?>

<div class="content update">
	<h2>Form formulir </h2>
    <form action="read.php" method="post">
        <label for="nama">Nama</label>
        <label for="jurusan">Jurusan</label>
        <input type="text" name="nama"  id="nama">
        <input type="text" name="jurusan" id="jurusan">
        <label for="email">Email</label>
        <label for="password">Password</label>
        <input type="text" name="email" id="email">
        <input type="text" name="password" id="password">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin">
        <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat">
        <input type="submit" value="Kirim">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
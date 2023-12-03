<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 7;


$stmt = $pdo->prepare('SELECT * FROM kontak ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);


$formulir = $stmt->fetchAll(PDO::FETCH_ASSOC);


$num_formulir = $pdo->query('SELECT COUNT(*) FROM kontak')->fetchColumn();
?>


<?=template_header('read')?>

<div class="content read">
	<h2>Read Formulir</h2>
	<a href="form_formulir.php" class="create-contact">Form Formulir</a>
	<table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Jurusan</td>
                <td>Email</td>
                <td>Password</td>
                <td>Jenis Kelamin</td>
                <td>Tanggal Lahir</td>
                <td>Alamat</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formulir as $formulir): ?>
            <tr>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['jurusan']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['password']?></td>
                <td><?=$contact['jenis_kelamin']?></td>
                <td><?=$contact['tanggal_lahir']?></td>
                <td><?=$contact['alamat']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_formulir): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>
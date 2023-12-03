<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM kontak WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            
            $stmt = $pdo->prepare('DELETE FROM kontak WHERE nama = ?');
            $stmt->execute([$_GET['nama']]);
            $msg = 'You have deleted the contact!';
        } else {
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Form<?=$contact['nama']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete form <?=$contact['nama']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['nama']?>&confirm=yes">Ya</a>
        <a href="delete.php?id=<?=$contact['nama']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>
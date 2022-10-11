<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$stmt = $pdo->prepare('SELECT * FROM mahasiswa ORDER BY nim LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_contacts = $pdo->query('SELECT COUNT(*) FROM tb_mahasiswa')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Daftar</h2>
	<a href="create.php" class="create-contact">Create account</a>
	<table>
        <thead>
            <tr>
                <td>Nim</td>
                <td>Nama</td>
                <td>Email</td>
                <td>jurusan</td>
                <td>fakultas</td>
                <td>gambar</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['nim']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['jurusan']?></td>
                <td><?=$contact['fakultas']?></td>
                <td><img src="gambar/<?php echo $contact['gambar'] ; ?>" width="80"></td>
                <td class="actions">
                    <a href="update.php?nim=<?=$contact['nim']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?nim=<?=$contact['nim']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>
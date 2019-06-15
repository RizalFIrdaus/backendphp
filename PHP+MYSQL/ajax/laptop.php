<?php 
require"../function.php";

$keyword = $_GET["Keyword"];
$que = "SELECT * FROM product_laptops WHERE 
			nama LIKE '%$keyword%' OR 
			brand LIKE '%$keyword%' OR 
			processor LIKE '%$keyword%' OR 
			ram LIKE '%$keyword%' OR 
			vga LIKE '%$keyword%' 
			";
$laptop = query($que);

 ?>

<table class="table table-hover">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Gambar</th>
        <th scope="col">Edit</th>
        <th scope="col">Nama Laptop</th>
        <th scope="col">Brand</th>
        <th scope="col">Processor</th>
        <th scope="col">RAM</th>
        <th scope="col">VGA</th>
      </tr>
    
        <?php $i = 1; ?>

        <?php foreach($laptop as $lap) :?>
        <tr>
          <td scope="row"><?= $i; ?></td>
          <td><img src="img/<?= $lap["gambar"]; ?>" width="200" class="img-thumbnail"></td>
          <td class="edit">
            <a href="update.php?id=<?= $lap["id"]; ?>" class="badge badge-primary">Ubah</a> |
            <a href="del.php?id=<?= $lap["id"]; ?>" class="badge badge-primary">Hapus</a>
          </td>
          <td><?= $lap["nama"]; ?></td>
          <td><?= $lap["brand"]; ?></td>
          <td><?= $lap["processor"]; ?></td>
          <td><?= $lap["ram"]; ?></td>
          <td><?= $lap["vga"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>

    </table>
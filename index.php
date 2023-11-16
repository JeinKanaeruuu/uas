<?php 
require 'vendor/autoload.php';

use UAS\Database;
use UAS\User;

try {
    $db = new Database();
    $user = new User($db);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $user->createUser($_POST['nama']);
        }elseif(isset($_POST['update'])){
            $user->updateUser($_POST['id'],$_POST['name']);
    }

    header("Location: index.php");
    exit();
    }elseif(isset($_GET['delete'])){
        $user->deleteUser($_GET['delete']);
        header("Location: index.php");
        exit();
    }

    $users = $user->getUser();
    ?>

    <form method="post">
        <input type="text" name="nama" >
        <button type="submit" name="create">Tambah</button>
    </form>
    <?php foreach ($users as $row): ?>
        <div>
            <form method="post" style="display:inline;">
            <?=$row['name']?>
            <a href="?delete=<?=$row['name']?>"></a>
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="text" name="name" value="<?=$row['name']?>">
            <button type="submit" name="update">Update</button>
            </form>
        </div>
        <?php endforeach; 
} catch(Exception $e){
    echo $e->getMessage();
}
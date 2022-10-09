<form>
<input type="text" name="username">
<input type="submit" value="ค้นหา">
</form>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM member");

$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
    if (!empty($_GET))
    $value = '%' . $_GET["username"] . '%';
    $stmt->bindParam(1, $value);
    $stmt->execute();

$stmt->execute();
while ($row = $stmt->fetch()) {
    ?>
    ชื่อสมาชิก:  <?=$row ["name"]?> <br>
    ที่อยู่:  <?=$row ["address"]?> <br>
    อีเมล์:  <?=$row ["email"]?> <br>
    <img src="member_pic/<?=$row["username"]?>.jpg" width='100'><br>
    <hr>
    <?php
}

?>

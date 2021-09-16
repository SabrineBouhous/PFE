<?php	

$dsn = 'mysql:host=localhost;dbname=personnel;port=3306;charset=utf8';
try {
$pdo = new PDO($dsn, 'root' , '');
}
catch (PDOException $exception) {
 exit('Erreur de connexion à la base de données');
 }


 $id=$_GET['id'];

echo $id;
/*$resquete=$pdo->prepare ("DELETE FROM  employé WHERE idemp=:id LIMIT 1");
$resquete->bindValue('id',$_GET['id']);
$resquete->execute() ?>
	 <html>
<head>
<meta http-equiv="refresh" content="0;url=empp.php">
</html>
*/
?>
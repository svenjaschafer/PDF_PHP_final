<?php

// Datenbank Verbindung aufbauen
// Siehe: https://www.php-einfach.de/mysql-tutorial/crashkurs-pdo/
// Siehe: https://www.php-einfach.de/mysql-tutorial/verbindung-aufbauen/
// Siehe: https://phpdelusions.net/pdo#dsn

function get_db_connection(){

  /* Die in config.php festgelegten Variablen gelten innerhalb einer Funktion standardmässig NICHT.
    Um sie innerhalb einer Funktion zugänglich zu machen, müssen sie mit dem Schlüsselwort global innerhalb der Funktion gekennzeichnet werden.
    Siehe: https://www.php.net/manual/de/language.variables.scope.php
  */
  global $db_host, $db_name, $db_user, $db_pass, $db_charset;

  $dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset"; // siehe https://en.wikipedia.org/wiki/Data_source_name
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false
  ];

  // Einfache Version der DB-Verbindung
  //$db = new PDO($dsn, $user, $pass, $options);

  // Ausführliche Version der DB-Verbindung
  try {
       $db = new PDO($dsn, $db_user, $db_pass, $options);
  } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  // Wir geben die in der Variablen $db gespeicherte Datenbankverbindung
  //   als Ergebnis der Funktion zurück.
  return $db;
}

/************************ GRUNDLEGENDE BEFEHLE ************************/
// Einloggen
// Funktion benötigt 2 Parameter $email und $password
function login($email, $password){
  $db = get_db_connection();
  $sql = "SELECT * FROM user WHERE email='$email' AND password='$password';";
  $result = $db->query($sql);
  if($result->rowCount() == 1){
    $row = $result->fetch();
    return $row;
  }else{
    return false;
  }
}

/************************ INSERT BEFEHLE ************************/

/************************ SELECT BEFEHLE ************************/
//Userdaten aus DB auslesen
function get_user_by_id($id){
  $db = get_db_connection();
  $sql = "SELECT * FROM user WHERE id = '$id';";
  $result = $db->query($sql);
  return $result->fetch();
}

/************************ UPDATE BEFEHLE ************************/
//Fortschritt updaten
function update_fortschritt($vorbereitung, $umsetzung, $praesentation, $id){
  $db = get_db_connection();
  $sql = "UPDATE user SET vorbereitung = ? , umsetzung = ? , praesentation = ? WHERE id = ?;";
  $stmt = $db->prepare($sql);
  return $stmt->execute(array($vorbereitung, $umsetzung, $praesentation, $id));
}
?>

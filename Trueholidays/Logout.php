<?PHP
session_start();
unset( $_SESSION['TrueHolidays']); 
header('Location:../');
?>
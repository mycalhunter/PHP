<?
include 'connect.php';

$pop_name = $_POST['name'];
$pop_number = $_POST['number'];
$pop_collection = $_POST['collection'];
$pop_upc = $_POST['upc'];

$sql = "INSERT INTO pop_items (pop_name, pop_number, pop_collection, upc)
VALUES ('".$_POST["name"]."','".$_POST["number"]."','".$_POST["collection"]."','".$_POST["upc"]."')";

if (mysqli_query($con, $sql)) {
    header('Location: http://idevhunter.com/files/index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>
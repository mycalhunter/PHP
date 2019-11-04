<?
  include('connect.php');
  include('head.html');
?>


<form action="collection-insert.php" method="post">
<input type="text" name="name" required placeholder="POP Name">
<input pattern="[0-9]*" type="number" inputmode="numeric" name="number" required placeholder="POP Number">
<?
if ($result = mysqli_query($con, "SELECT DISTINCT pop_collection FROM pop_items ORDER BY pop_collection ASC")) {
  echo "<select name='collection'>";
  echo "<option value=''>Choose a Collection</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['pop_collection'] . "'>".$row['pop_collection']."</option>";
  }
  echo "</select>";
}
?>
<!--<input type="text"  placeholder="POP Collection">-->
<input pattern="[0-9]*" maxlength="12" type="text" inputmode="numeric" name="upc" id="upc" required placeholder="UPC">
<input type="submit" name="submit">
</form>
<style>
#upc {
  transition: background-color ease-in-out 250ms;
}
</style>
<script>
$('#upc').on('keyup',function(){
      if ($('#upc').val().length === 12) {
        //alert ('12 characters');
        $('#upc').css("background-color", "rgb(82, 251, 83)");
      } else {
        $('#upc').css("background-color", "white");
      }
});
</script>
<?
  include('collection-get.php');
?>
<?
  include('footer.html');

  mysqli_close($con);
?>
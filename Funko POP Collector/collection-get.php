<?
if ($result = mysqli_query($con, "SELECT * FROM pop_items ORDER BY pop_number")) {
$row_cnt = mysqli_num_rows($result);
  echo "<div class='header'><h2>Quantity of Collection: ". $row_cnt . "</h2></div>";
  echo "<table cellspacing='0'>
        <thead>
        <tr class='item-row'>
        <!--<td>id</td>-->
        <td>Name</td>
        <td>Number</td>
        <td>Collection</td>
        <td>UPC</td>
        </tr>
        </thead>
        <tbody>";
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($result)) {

    $ebayUrlPrefix = "https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=";
    $ebayUrlSuffix = "&_sacat=0";
    $amazonUrlPrefix = "https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias=aps&field-keywords=";

    $num_padded = sprintf("%02d", $row["pop_number"]); // adds leading 0 if number is a single digit

    echo "<tr>";
      //echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["pop_name"] . "</td>";
      echo "<td>" . $num_padded . "</td>";
      echo "<td>" . $row["pop_collection"] . "</td>";
      
      if(!empty($row["upc"])) {
        echo "<td>" . $row["upc"] . "<br><a href='" . $ebayUrlPrefix . $row["upc"] . $ebayUrlSuffix . "' target='_blank'>Ebay</a> | <a href='" . $amazonUrlPrefix . $row["upc"] . "' target='_blank'>Amazon</a></td>";
      } else {
        echo "<td></td>";
      }
      echo "</tr>";
  }
  echo "</tbody></table>";
  /* free result set */
  mysqli_free_result($result);
}
?>
<?php


function price_rubber($conn, $d)
{
  $y = date("Y");
  $dd = "{$y}-$d";

  $sql = "SELECT * FROM price_rubber pr WHERE pr.date LIKE '{$dd}'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      return $row["price"];
    }
  } else {
    return 0;
  }
}
function weight_rubber($conn, $d)
{
  $y = date("Y");
  $dd = "{$y}-$d";

  $sql = "SELECT * FROM sale s WHERE s.SaleDate LIKE '{$dd}'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      return $row["weightItem"];
    }
  } else {
    return 0;
  }
}
// function checkinsert($conn, $MD_id, $date)
// {

//   // $date = date("Y-m-d");

//   $sql = "SELECT * FROM pricemiddleman p WHERE p.MD_id='{$MD_id}' AND p.date='{$date}'";
//   $result = mysqli_query($conn, $sql);
//   if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//       return 1;
//     }
//   } else {
//     return 0;
//   }
// }
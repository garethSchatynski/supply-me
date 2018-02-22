<?php
include ("db.php");
$pagename="Listings";
echo "<link rel=stylesheet type=text/css href=foundation.css>";

echo "<title>".$pagename."</title>";
include ("headfile.html");

echo "<h2>".$pagename."</h2>";
echo "<p><i> Current Supply Contracts </i><br><br><hr>";

$SQL="select listId, listProd, description, supplyQuant  from Listings";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysql_query($SQL) or die (mysql_error());
echo "<div class='grid-x grid-padding-x'>";
echo            "<div class='large-12 cell'>";
echo              "<div class='primary callout'>";

//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed. 
//loop through the array i.e while the end of the array has not been reached go through it
while ($arrayprod=mysql_fetch_array($exeSQL))
{
	
	echo "<p><a href=listinfo.php?u_listid=".$arrayprod['listId'].">";
	//Display name of the product
              echo $arrayprod['listProd']."<br>", "<b>Supply Needed: </b>".strtoupper($thearrayprod['supplyQuant']);
				echo $arrayprod['supplyQuant'];
}
echo              "</div>";
echo            "</div>";
echo          "</div>";

//include head layout
include ("footfile.html");
?>


<table class="dashboard-table">
  <colgroup>
    <col width="150">
    <col width="80">
    <col width="200">
    <col width="60">
    <col width="220">
    <col width="170">
  </colgroup>
  <thead>
    <tr>
      <th><a href="#">Column 1 <i class="fa fa-caret-down"></i></a></th>
      <th><a href="#">Column 2 <i class="fa fa-caret-down"></i></a></th>
      <th><a href="#">Column 3 <i class="fa fa-caret-down"></i></a></th>
      <th><a href="#">Column 4 <i class="fa fa-caret-down"></i></a></th>
      <th><a href="#">Column 5 <i class="fa fa-caret-down"></i></a></th>
      <th><a href="#">Column 6 <i class="fa fa-caret-down"></i></a></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
    <tr>
      <td>
        <div class="flex-container align-justify align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/50/50/people/">
          </div>
          <div class="flex-child-grow">
            <h6 class="dashboard-table-text">A Person</h6>
            <span class="dashboard-table-timestamp">03/04/2017</span>
          </div>
        </div>
      </td>
      <td>Single Line</td>
      <td class="bold">A Bold Line</td>
      <td>A Date</td>
      <td>
        <div class="flex-container align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/50/50/people/">
          </div>
          <div class="flex-child">
            <h6 class="dashboard-table-text">Another person did something</h6>
            <span class="dashboard-table-timestamp">03/08/2017</span>
          </div>
        </div>
      </td>
      <td class="listing-inquiry-status">
      
        <div class="flex-container align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/25/25/abstract/">
          </div>
          <div class="flex-child">
            <h6 class="dashboard-table-text"><a href="#">A longer wrapping item with an image that is aligned to the top</a></h6>
          </div>
        </div>
      
      </td>
    </tr>
    <tr>
      <td>
        <div class="flex-container align-justify align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/50/50/people/">
          </div>
          <div class="flex-child-grow">
            <h6 class="dashboard-table-text">A Person</h6>
            <span class="dashboard-table-timestamp">03/04/2017</span>
          </div>
        </div>
      </td>
      <td>Single Line</td>
      <td class="bold">A Bold Line</td>
      <td>A Date</td>
      <td>
        <div class="flex-container align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/50/50/people/">
          </div>
          <div class="flex-child">
            <h6 class="dashboard-table-text">Another person did something</h6>
            <span class="dashboard-table-timestamp">03/08/2017</span>
          </div>
        </div>
      </td>
      <td class="listing-inquiry-status">
      
        <div class="flex-container align-top">
          <div class="flex-child-shrink">
            <img class="dashboard-table-image" src="http://lorempixel.com/25/25/abstract/">
          </div>
          <div class="flex-child">
            <h6 class="dashboard-table-text"><a href="#">A longer wrapping item with an image that is aligned to the top</a></h6>
          </div>
        </div>
      
      </td>
    </tr>
  </tbody>
</table>

<?php
//Include jQuery
Yii::app()->clientScript->registerCoreScript('jquery');

$this->pageTitle=Yii::app()->name;

?>

<center>
    <p>HeBSdigital</p>
	    
<table class="tablesorter" id="digi">
<thead>  
    <th class="dd">Name</th>
    <th class="dd">Email</th>
    <th class="dd">Address</th>
    <th class="dd">City</th>
    <th class="dd">State</th>
    <th class="dd">Zip</th>
    <th class="dd">Country</th>
    <th class="dd">AcctBalance</th>
</thead> 
<tbody>
<?php
    //Outputs everything from the xml document into a table
    for($cnt=1;$cnt<=$count;$cnt++){
	
	/*If statement to see whether row is even number or odd. Used to assign color of rows
	 *Assigns this if block to a black background with white colored strings
	 */
	if($cnt%2==0){
	    echo "<tr id='zdark'> <td >" . $xmlFNAME[$cnt] . " " . $xmlLNAME[$cnt] . "</td>";
	    echo "<td >" . "<form method='post' action='/yii/HeBSdigital/index.php?r=email/index' id='EMAIL' class='EMAL'>" .
	    "<input type='hidden' value=$xmlEMAIL[$cnt] id='EMAIL' name='EMAIL'>" .
	    CHtml::submitButton($xmlEMAIL[$cnt]) . "</form>" . "</td>";
	    
	    echo "<td >" . $xmlADDRESS[$cnt] . "</td>";
	    echo "<td >" . $xmlCITY[$cnt] . "</td>" . "<td >" . $xmlSTATE[$cnt] . "</td>";
	    echo "<td >" . $xmlZIP[$cnt] . "</td>" . "<td >" . $xmlCC[$cnt] . "</td>";
	    
	    //Checks to see if account balance number should be green or red	
	    if($xmlAccColor[$cnt]==="green")
		echo "<td ><span id='green'>" . $xmlACCBAL[$cnt] . "</span></td>" . "</tr>";
	    elseif($xmlAccColor[$cnt]==="red")
		echo "<td ><span id='red'>" . $xmlACCBAL[$cnt] . "</span></td>" . "</tr>";
	}//End if
	
	//This else statement assigns row color to white with black colored strings
	else{
	    echo "<tr id='zlight'> <td>" . $xmlFNAME[$cnt] . " " . $xmlLNAME[$cnt] . "</td>";
	    echo "<td >" . "<form method='post' action='/yii/HeBSdigital/index.php?r=email/index' id='EMAIL' class='EMAL'>" .
	    "<input type='hidden' value=$xmlEMAIL[$cnt] id='EMAIL' name='EMAIL'>" .
	    CHtml::submitButton($xmlEMAIL[$cnt]) . "</form>" . "</td>";
	    
	    echo "<td>" . $xmlADDRESS[$cnt] . "</td>";
	    echo "<td>" . $xmlCITY[$cnt] . "</td>" . "<td>" . $xmlSTATE[$cnt] . "</td>";
	    echo "<td>" . $xmlZIP[$cnt] . "</td>" . "<td>" . $xmlCC[$cnt] . "</td>";
	    
	    //Checks to see if account balance number should be green or red
	    if($xmlAccColor[$cnt]==="green")
		echo "<td ><span id='green'>" . $xmlACCBAL[$cnt] . "</span></td>" . "</tr>";
	    elseif($xmlAccColor[$cnt]==="red")
		echo "<td ><span id='red'>" . $xmlACCBAL[$cnt] . "</span></td>" . "</tr>";
	}
    }//End for loop 
?>
</tbody>
</table>
 
    <div>
    <button class="submit" 
    style="background-color:grey;color:white;width:100px;height:30px;border:3px outset #2F4F4F;">Next Page
    </button>
    </div>
 
</center>

<!--Sort table headers-->
<script>
$(document).ready(function() 
    { 
        $("#digi").tablesorter(); 
    } 
);
</script>

<!--Attempt to hide and show table rows-->
<script>
$(document).ready(function() 
    {
    $('.submit').click(function() {  
	var e = document.getElementById('d');//firstpage
	var d = document.getElementById("hide");//secondpage
          e.style.display = 'none';
          d.style.display = 'block';           
    })
});
</script>
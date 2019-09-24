<?php
require_once ('../../functions.php');
function ganttChart($id)
{
$sql=queryMysql("select datediff(endDate,startDate) as difference,name,startDate,endDate from milestones where projectId='$id'");
if($sql->num_rows>0)
{ 
	$i=-1;
	while($row=$sql->fetch_assoc())
	{
		$i++;
		$startdate[$i]=$row['startDate'];
		$enddate[$i]=$row['endDate'];
		$duration[$i]=$row['difference'];
		$label[$i]=$row['name'];
	}
    sort($startdate);
    sort($enddate);
	for($j=0;$j<=$i;$j++)
	{
	$sql=queryMysql("select datediff('$startdate[$j]','$startdate[0]') as difference");
	$row=$sql->fetch_assoc();
	$diff[$j]=$row['difference'];

	}
?>

    new Chartist.Bar('#ct-chart4', {
                labels: [
                <?php
                for($j=0;$j<=$i;$j++)
                	echo "'".$label[$j]."',";
                ?>],
                series: [
                    [
                    <?php
                    for($j=0;$j<=$i;$j++)
                    echo $duration[$j].",";
                    ?>                    
                    ],
                    [                    
                    <?php
                    for($j=0;$j<=$i;$j++)
                    echo $diff[$j].",";
                    ?>
                   ]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: true,
                horizontalBars: true,
                 stackBars: true,
                axisY: {
                    offset: 70,
                     onlyInteger: true,
                },
                axisX: {
               
                labelInterpolationFnc: function(value) {
                return 'Day' + value
                },
                scaleMinSpace: 15,
                     onlyInteger: true,
                }
            });
<?php	
	}
	else
	{
		echo "<div class='alert alert-info'>No milestones have been added yet.</div>";
	}

}

?>



    <?php
$dataPoints = array( 
    
    
        array("y" =>$teacher[0]->count2, "label" => $teacher[0]->name  ),
        array("y" =>$teacher[1]->count2, "label" => $teacher[1]->name  ),
        array("y" =>$teacher[2]->count2, "label" => $teacher[2]->name  ),
        array("y" =>$teacher[3]->count2, "label" => $teacher[3]->name  ),
        array("y" =>$teacher[4]->count2, "label" => $teacher[4]->name  ),
        array("y" =>$teacher[5]->count2, "label" => $teacher[5]->name  )
    
	
	
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "statistics"
	},
	axisY: {
		title: "Count of project"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
@extends('layouts.app')

@section('content')
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
</body>
</html>              

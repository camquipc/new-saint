
        <?php
                $arrChartConfig = array(
                  "chart" => array(

                    "caption" => "Paises con mas reserva de petroleo [2017-18]",
                    "subCaption" => "In MMbbl = One Million barrels", 
                    "xAxisName" => "Paises",
                    "yAxisName" => "Reservas (MMbbl)", 
                    "numberSuffix" => "K", 
                    "theme" => "fusion"
                    )
                );

              // An array of hash objects which stores data
              $arrChartData = array(
                ["Venezuela", "290"],
                ["Saudi", "260"],
                ["Canada", "180"],
                ["Iran", "140"],
                ["Russia", "115"],
                ["UAE", "100"],
                ["US", "30"],
                ["China", "13"]
              );

              $arrLabelValueData = array();

            // Pushing labels and values
            for($i = 0; $i < count($arrChartData); $i++) {
                array_push($arrLabelValueData, array(
                    "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
                ));
            }

      $arrChartConfig["data"] = $arrLabelValueData;

      // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
      $jsonEncodedData = json_encode($arrChartConfig);

      // chart object
$Chart = new FusionCharts("column2d", "Grafica de ejemplo" , "400", "300", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $Chart->render();

?>
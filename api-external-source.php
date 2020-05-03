<?php
  $pageTitle = 'API PHP ASSIGNMENT';
?><?php
  // Submit a request to the API endpoint.
  $covid19DataJSONString = file_get_contents( 'https://api.covid19api.com/summary' );

  // Convert the response to a PHP object.
  $covid19DataObject = json_decode( $covid19DataJSONString );

  // Collect the Global Data into a variable.
  $covid19DataSummary = $covid19DataObject->Global;

  // Collect the Countries Data into an array.
  $covid19Data = $covid19DataObject->Countries;

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle ?></title>
</head>
<body>
  <h1><?php echo $pageTitle ?></h1>
  <?php include './includes/navigation.php'; ?>
  <h2>COVID-19 Data Summary</h2>
  <!-- Displaying the global data  -->
  
  <h3>Global Summary</h3>
  
  <ul>     
      <li>New Confirmed Cases: <?php echo $covid19DataSummary->NewConfirmed; ?></li>
      <li>Total Confirmed Cases: <?php echo $covid19DataSummary->TotalConfirmed; ?></li>
      <li>New Deaths: <?php echo $covid19DataSummary->NewDeaths; ?></li>
      <li>New Recovered: <?php echo $covid19DataSummary->NewRecovered; ?></li>
      <li>Total Recovered: <?php echo $covid19DataSummary->TotalRecovered; ?></li>
    </ul>
    <h2>CoVID-19 Data by Country</h2>
    
    <ul>
    <!-- Displaying each country data in the $covid19Data array using a foreach loop -->
    <?php foreach( $covid19Data as $covid19Data) : ?>
        <li>Country: <?php echo $covid19Data->Country; ?>  </li>
        <li>New Confirmed: <?php echo $covid19Data->NewConfirmed; ?>  </li>
        <li>Total Confirmed: <?php echo $covid19Data->TotalConfirmed; ?>  </li>
        <li>New Deaths: <?php echo $covid19Data->NewDeaths; ?>  </li>
        <li>New Recovered: <?php echo $covid19Data->NewRecovered; ?>  </li>
        <li>Total Recovered: <?php echo $covid19Data->TotalRecovered; ?>  </li>
        <li>  ***************************  </li>
    <?php endforeach; ?>
    </ul>

</body>
</html>
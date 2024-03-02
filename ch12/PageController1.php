<?php
namespace popp\ch12\batch07;
try {
    $venuemapper = new VenueMapper();
    $venues = $venuemapper->findAll();
} catch (\Exception) {
    include('error.php');
    exit(0);
}
// default page follows
?>
<html>
<head>
    <title>Venues</title>
</head>
<body>
<h1>Venues</h1>
<?php foreach ($venues as $venue) { ?>
    <?php print $venue->getName(); ?><br />
<?php } ?>
</body>
</html>

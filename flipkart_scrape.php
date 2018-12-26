<html>
<head>
    <title>
        Flipkart Scraper
    </title>
</head>
<body>
    <center><h2 style="font-family:Arial;color:red;">FLIPKART SCRAPER</h2></center>
    <center>
    <form method="get" name="f1" style="display: inline;">
    <input type="text" name="q"    placeholder="Search Option 1">
    <input type="submit" name="submit">
    </form>
    <form method="get" name="f2" style="display: inline;">
    <input type="text" name="query"    placeholder="Search Option 2">
    <input type="submit" name="submit">
    </form>
</center>
<?php
error_reporting(0);
require 'scrape_engine.php';

if (isset($_GET['q']))                       //Scraping for multi-listed pages
    {
    $search_term = $_GET['q'];
    $search_term = urlencode($search_term);
echo '<h3>Searched for:<i style="color: blue;">'.urldecode($search_term).'</i></h3>';
  $cl_price = "_1vC4OE";
    $cl_name = "_2cLu-l";
   flip_scrape($search_term,$cl_name,$cl_price);
}
if (isset($_GET['query']))                //Scraping for single-list pages
    {
    $search_term = $_GET['query'];
    $search_term = urlencode($search_term);
echo '<h3>Searched for:<i style="color: blue;">'.urldecode($search_term).'</i></h3>';
    $cl_price = "_1vC4OE";
    $cl_name = "_3wU53n";
    flip_scrape($search_term,$cl_name,$cl_price);
    }
?>
</body>
</html>

<?php
function flip_scrape($search_term,$cl_name,$cl_price){
      $doc = file_get_contents("https://www.flipkart.com/search?q=$search_term&otracker=search&otracker1=search&marketplace=FLIPKART&as-show=on&as=off");
    $domdocument = new DOMDocument();
    $domdocument->loadHTML($doc);
    $a = new DOMXPath($domdocument);
    $price_class = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $cl_price ')]");
    $name_class = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $cl_name ')]");
    $link_class = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $cl_name')]");
    for ($i = $name_class->length - 1; $i > - 1; $i--)
        {
        $price[] = $price_class->item($i)->firstChild->nodeValue;
        $name[] = $name_class->item($i)->firstChild->nodeValue;
        $link[] = $link_class->item($i)->getAttribute("href");
        }    
    print "<pre>";
    $result = [];
    $count = count($name);
    for ($i = 0; $i < $count; $i++)
        {
        $result[$i] = ['name' => $name[$i], 'price' => $price[$i], 'link' => "https://www.flipkart.com" . $link[$i]];
        }
    $result = array_reverse($result);
    print_r($result);
}
?>

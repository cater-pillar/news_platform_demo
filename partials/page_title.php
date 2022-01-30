<?php

if(!isset($_GET['category']) && 
    !isset($_GET['town']) && 
    !isset($_GET['search'])
         ) {
    $page_title = "Naslovna";
} elseif(isset($_GET['search'])) {
    $page_title = "Pretraga";
}  
elseif (isset($_GET['category'])) {
    foreach($categories as $category) {
        if($category->getId() == $_GET['category']) {
            $page_title = $category->getName();
            break;
        }
    }
} else {
    foreach($towns as $town) {
        if($town->getId() == $_GET['town']) {
            $page_title = $town->getName();
            break;
        }
    }
}
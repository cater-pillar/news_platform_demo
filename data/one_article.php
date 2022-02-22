<?php
  if(isset($_GET['id'])) {
    
      $res = $conn->getOneArticle();
     
    if(!is_null($res)) {
      $one_article = new Article($res['id'], 
                               $res['category_id'], 
                               $res['town_id'], 
                               $res['title'], 
                               $res['published_at'], 
                               $res['photo'], 
                               $res['abstract'], 
                               $res['body'], 
                               $categories, 
                               $towns, 
                               $comments);  
    }
  }
  
  
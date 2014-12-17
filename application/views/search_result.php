<div class="am-g" id ="search_results">  
<div class="am-list-news am-list-news-default am-u-sm-0"> </div>
<div class=" am-u-sm-6">
 <div data-am-widget="list_news" class="am-list-news am-list-news-default">
<!--列表标题-->
  <div class="am-list-news-bd">
    <ul class="am-list">
      <?php echo '共有'.$result['hits'].'个结果返回'; ?>
      <?php foreach ($result as $key => $row) { 
      $keyword = $search_data['keyword'];
      $pattern = '/(' . $keyword .')/i';
      $replacement = "<span class='highlight'>$1</span>";
      $title = preg_replace($pattern , $replacement , $row['title']);
      $text = preg_replace($pattern , $replacement , $row['text']);
      ?>
      <li class="am-g am-list-item-desced" >
        <a href="<?=$row['url']?>" class="am-list-item-hd"><?php echo $title ;?></a>
        <div class="am-list-item-text"><?php echo $text;?></div>
        <div class="am-list-item-text"><?=$row['url']?> <?=$row['modified_time']?></div>
        <div class="am-list-item-text"><?=$row['score']?></div>
      </li>
      <?php } ?>
    </ul>
  </div>
 </div>
 </div>
<div class="am-u-sm-5 am-list-news am-list-news-default"> </div>
</div>

  <ul class="pagination">
    <div class="am-g">
      <div class="am-u-sm-7">
        <div class="am-g">
    <?php
    foreach ($link_array as $key => $value) {
      echo $value;
    }   
    ?>  
    </div>
      </div>
    <div class="am-u-sm-2"></div> 
    <!-- <div class="am=u-sm-6"></div> -->
    </div>
  </ul>


</div>
</div>


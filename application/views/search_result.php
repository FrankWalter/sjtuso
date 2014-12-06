    
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
<!--列表标题-->

  <div class="am-list-news-bd">
    <ul class="am-list">
      <?php foreach ($result as $key => $row) { ?>
      <li class="am-g am-list-item-desced">
        <a href="<?=$row['baseUrl']?>" class="am-list-item-hd"><?=$row['title']?></a>
        <div class="am-list-item-text"><?=$row['text']?></div>
        <div class="am-list-item-text"><?=$row['baseUrl']?> <?=$row['fetchTime']?></div>
      </li>
      <?php } ?>
    </ul>
  </div>

  <ul class="pagination">
    <?php
    foreach ($link_array as $key => $value) {
      echo $value;
    }
    ?>
  </ul>


</div>
</div>


<div class="am-g" id ="search_results">  
<div class="am-list-news am-list-news-default am-u-sm-0"> </div>
<div class=" am-u-sm-6">
 <div data-am-widget="list_news" class="am-list-news am-list-news-default">
<!--列表标题-->
  <div class="am-list-news-bd">
    <ul class="am-list">
      <?php foreach ($result as $key => $row) { ?>
      <li class="am-g am-list-item-desced" >
        <a href="<?=$row['baseUrl']?>" class="am-list-item-hd"><?=$row['title']?></a>
        <div class="am-list-item-text"><?=$row['text']?></div>
        <div class="am-list-item-text"><?=$row['baseUrl']?> <?=$row['fetchTime']?></div>
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


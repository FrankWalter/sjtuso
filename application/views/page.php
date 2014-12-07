<body>

  <div id="container">
    <div class="am-g">
      <!-- the main search form -->
      <form role="search" method="GET" action=<?php echo base_url()."welcome/search";?>>
        <div class="am-u-sm-1 am-form-group">
          <h1>SJTUso</h1>
        </div>

        <div class="am-u-sm-6 am-form-group">
          <input type="text" name="q" class="am-form-field am-input-sm" placeholder="Ready to Search">

        </div>

        <div class="am-u-sm-5 am-form-group">
          <button type="submit" class="am-btn am-btn-default am-btn-sm">Search</button>
        </div>
      </form>
    </div>
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
</div>
</div>
</body>
</html>

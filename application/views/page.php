<body>

<div id="container">
  <h1>交大搜索</h1>

  <form class="am-form" method="GET" action="">

    <div class="am-form-group">
      <input type="text" class="" name="q" placeholder="关键字" value="<?=$q?>" >
    </div>

    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
  </form>

  <div data-am-widget="list_news" class="am-list-news am-list-news-default">
    <!--列表标题-->
    <div class="am-list-news-hd am-cf">
      <!--带更多链接-->
        <span class="am-list-news-more am-fr">搜索结果 &raquo;</span>
    </div>
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

</body>
</html>

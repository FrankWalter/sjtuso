    <div class="am-g" id="search">
      <!-- the main search form -->
      <form role="search" method="GET" action="<?php echo site_url('index.php/search_news'); ?>">
        <div class="am-u-sm-1 am-form-group" id="search_logo">
          <h1><a href="<?php echo site_url();?>">SJTUso1</a></h1>
        </div>

        <div class="am-u-sm-6 am-form-group" id="search_form">
          <input type="text" name="keyword" class="am-form-field am-input-sm" placeholder="Ready to Search" value="<?=$search_data['keyword'];?>" >
        </div>

        <div class="am-u-sm-5 am-form-group" id="search_button">
          <button type="submit" class="am-btn am-btn-default am-btn-sm">NewsSearch</button>
        </div>
      </form>
    </div>
 <div class="am-g">
    <div class="am-u-sm-3"> </div>
    <div class="am-u-sm-9"> 

      <nav data-am-widget="menu" class="am-menu  am-menu-default">

        <ul class="am-menu-nav am-avg-sm-3">
          <li class="">
            <a href="##">新闻</a>
          </li>
          <li class="">
            <a href="##">教师</a>
          </li>
          <li class="">
            <a href="##">实验室</a>
          </li>
        </li>
        <li class="">
          <a href="##">论文</a>
        </li>
        <li class="">
          <a href="##">图书</a>
        </li>
        <li class="">
          <a href="##">课程</a>
        </li>
      </li>
      <li class="">
        <a href="##">学生活动</a>
      </li>
    </li>
    <li class="">
      <a href="##">竞赛</a>
    </li>
  </ul>
</nav>
</div>
</div>
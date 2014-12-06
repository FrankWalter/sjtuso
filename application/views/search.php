<!-- the header of the web -->
<body>
  <div class="header">
    <div class="am-g">
      <h1>SJTUso</h1>
      <img src="<?php echo base_url()?>/src/img/header.png">
    </div>
    <hr />
  </div>

  <!-- the nvabar -->
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


<div class="am-g">
  <!-- the main search form -->
  <form role="search" method="GET" action="<?php echo site_url('index.php/search'); ?>">
    <div class="am-u-sm-3 am-form-group">
    </div>

    <div class="am-u-sm-6 am-form-group">
      <input type="text" name="keyword" class="am-form-field am-input-sm" placeholder="Ready to Search">

    </div>

    <div class="am-u-sm-3 am-form-group">
      <button type="submit" class="am-btn am-btn-default am-btn-sm">Search</button>
    </div>
  </form>
</div>
</br>
</br>
</br>
</br>
</br>
<!-- 友情链接 -->
<div class="am-g">
  <div class="am-u-sm-8">
  </div>
  <div class="am-u-sm-4">
    <section data-am-widget="accordion" class="am-accordion am-accordion-basic"
    data-am-accordion='{  }'>


    <dl class="am-accordion-item am-active">
      <dt class="am-accordion-title">友情链接</dt>
      <dd class="am-accordion-bd am-collapse am-in">
        <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
        <div class="am-accordion-content">
          <ul style="list-style-type:none">
            <li><a href="http://bookex.org/">BookEx</a></li>
            <li><a href="http://www.tongqu.me/">同去网</a></li>
            <li><a href="https://bbs.sjtu.edu.cn/file/bbs/index/index.htm">饮水思源BBS</a></li>
            <li><a href="http://tieba.baidu.com/f?kw=%C9%CF%BA%A3%BD%BB%CD%A8%B4%F3%D1%A7">上海交通大学吧</a></li>
            <li><a href="https://pt.sjtu.edu.cn/index.php">葡萄</a></li>
          </ul>
        </dd>
      </dl>
    </section>
  </div>
</div>


    <div class="am-g">
      <!-- the main search form -->
      <form role="search" method="GET" action="<?php echo site_url('index.php/search'); ?>">
        <div class="am-u-sm-1 am-form-group">
          <h1><a href="<?php echo site_url();?>">SJTUso</a></h1>
        </div>

        <div class="am-u-sm-6 am-form-group">
          <input type="text" name="keyword" class="am-form-field am-input-sm" placeholder="Ready to Search" value="<?=$search_data['keyword'];?>" >
        </div>

        <div class="am-u-sm-5 am-form-group">
          <button type="submit" class="am-btn am-btn-default am-btn-sm">Search</button>
        </div>
      </form>
    </div>
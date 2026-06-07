
  <footer class="site-footer">
    <div class="content clearfix">
      <p class="copyright">
        <strong>&copy; <a href="index.php">Clan B5TA</a></strong>
        &nbsp;|&nbsp; Founded September 30th, 2014
        &nbsp;|&nbsp; <a href="discord.php">Discord</a>
        &nbsp;|&nbsp; <a href="about.php">About</a>
        &nbsp;|&nbsp; <a href="guides.php">Guides</a>
      </p>
    </div>
  </footer>

</div><!-- /.container-fluid -->

<!-- =====================================================
     RIGHT ASIDE — always open on 1200px+, off-canvas below
     ===================================================== -->
<aside class="site-aside" id="siteAside">
  <div class="aside-container">
    <div class="dynamicSidebar">
      <div class="widget">
        <h4 class="widgetTitle">Pages</h4>
        <ul>
          <?php
          $pages = [
            'home'      => ['href' => 'index.php',              'label' => 'Home'],
            'about'     => ['href' => 'about.php',              'label' => 'About'],
            'discord'   => ['href' => 'discord.php',            'label' => 'Discord'],
            'guides'    => ['href' => 'guides.php',             'label' => 'Guides'],
            'flipchart' => ['href' => '#',                      'label' => 'Flip Chart'],
          ];
          foreach ($pages as $key => $page):
            $active = ($activePage === $key) ? ' current_page_item' : '';
          ?>
          <li class="page_item<?php echo $active; ?>">
            <a href="<?php echo htmlspecialchars($page['href']); ?>"><?php echo htmlspecialchars($page['label']); ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="widget">
        <h4 class="widgetTitle">External Links</h4>
        <ul>
          <li class="page_item"><a href="http://services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA" target="_blank" rel="noopener">Official Clan Page</a></li>
          <li class="page_item"><a href="http://www.runeclan.com/clan/B5TA" target="_blank" rel="noopener">Runeclan</a></li>
          <li class="page_item"><a href="http://www.zazzle.com/clanb5ta/products" target="_blank" rel="noopener">Merchandise</a></li>
        </ul>
      </div>

    </div>
  </div>
</aside>

<!-- Scroll-to-top button -->
<a href="#" id="scrollTop" style="display:none;position:fixed;bottom:20px;right:20px;z-index:9998;background:#2487d7;color:#fff;width:36px;height:36px;border-radius:50%;text-align:center;line-height:36px;font-size:18px;text-decoration:none;" title="Back to top">&uarr;</a>

<script src="js/site.js"></script>
<script src="js/externalscript.js"></script>
</body>
</html>

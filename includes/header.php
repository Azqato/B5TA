<?php if (!isset($activePage)) $activePage = ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo htmlspecialchars($pageTitle ?? 'Clan B5TA'); ?></title>
  <link rel="icon" href="Logos/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="B5TA is a social, skilling and bossing clan. Founded September 30, 2014.">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/site.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>

<!-- =====================================================
     FIXED HEADER
     ===================================================== -->
<header class="headerMain">
  <div class="header-content">
    <div id="logo">
      <a href="index.php" id="site-logo" title="Clan B5TA" rel="home">
        <img class="logo-img" src="Logos/0jK9PZV.png" alt="Clan B5TA">
      </a>
      <span class="blog-description">Founded September 30th, 2014</span>
    </div>
  </div>
</header>

<!-- =====================================================
     MOBILE HAMBURGER — Left nav
     ===================================================== -->
<div class="navMenuButton" id="navMenuButton" title="Menu" aria-label="Open navigation">
  <span></span>
  <span></span>
  <span></span>
</div>

<!-- =====================================================
     MOBILE HAMBURGER — Right aside
     ===================================================== -->
<div class="asideMenuButton" id="asideMenuButton" title="Sidebar" aria-label="Open sidebar">
  <span></span>
  <span></span>
  <span></span>
</div>

<!-- =====================================================
     LEFT SIDEBAR NAVIGATION
     ===================================================== -->
<div class="primary-menu" id="primaryMenu">
  <div class="primary-menu-container">
    <nav class="nav-container">
      <ul class="main-menu">

        <li class="menu-item <?php echo $activePage === 'home' ? 'current-menu-item current_page_item' : ''; ?>">
          <a href="index.php">Home</a>
        </li>

        <li class="menu-item <?php echo $activePage === 'about' ? 'current-menu-item current_page_item' : ''; ?>">
          <a href="about.php">About</a>
        </li>

        <li class="menu-item <?php echo $activePage === 'discord' ? 'current-menu-item current_page_item' : ''; ?>">
          <a href="discord.php">Discord</a>
        </li>

        <li class="menu-item menu-item-has-children <?php echo $activePage === 'guides' ? 'current-menu-item current_page_item' : ''; ?>">
          <a href="guides.php">Guides</a>
          <ul class="sub-menu">
            <li class="menu-item"><a href="guides-bossing.php">Bossing</a></li>
            <li class="menu-item"><a href="guides-money-making.php">Money Making</a></li>
            <li class="menu-item"><a href="guides-quests.php">Quests</a></li>
            <li class="menu-item"><a href="guides-skilling.php">Skilling</a></li>
          </ul>
        </li>

        <li class="menu-item <?php echo $activePage === 'flipchart' ? 'current-menu-item current_page_item' : ''; ?>">
          <a href="#">Flip Chart</a>
        </li>

        <div class="menu-section-divider"></div>

        <li class="menu-item">
          <a href="http://services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA" target="_blank" rel="noopener">Official Clan Page</a>
        </li>

        <li class="menu-item">
          <a href="http://www.runeclan.com/clan/B5TA" target="_blank" rel="noopener">Runeclan</a>
        </li>

        <li class="menu-item">
          <a href="http://www.zazzle.com/clanb5ta/products" target="_blank" rel="noopener">Merchandise</a>
        </li>

      </ul>
    </nav>
  </div>
</div><!-- /.primary-menu -->

<!-- =====================================================
     OVERLAY (dims page when sidebar open on mobile)
     ===================================================== -->
<div class="site-overlay" id="siteOverlay"></div>

<!-- =====================================================
     MAIN CONTAINER  (meta bar + page content)
     ===================================================== -->
<div class="container-fluid">

  <div class="meta clearfix">
    <div class="meta-search-form">
      <form role="search" method="get" class="search-form" action="index.php">
        <label>
          <span class="screen-reader-text">Search</span>
          <input type="search" class="search-field" placeholder="Search&hellip;" name="s">
        </label>
      </form>
    </div>
  </div>

  <!-- page-specific content is output between header.php and footer.php -->

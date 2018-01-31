<html>
  <head>
  <title><?= $title ?></title>
  <?php $this->load->view('partial/_assets'); ?>
  </head>
  <body>
    <!-- NAVIGATION -->
    <div id="navigation-menu">
      <ul>
        <li>Home</li>
        <li>Archives</li>
        <li>Contact</li>
        <li>About</li>
      </ul>
    </div>
    <div id="searchResult"></div>
    <!-- NAVIGATION -->

    <!-- MAIN CONTENT -->
    <div id="main-content">
      <?php $this->load->view($content) ?>
    </div>
    <!-- MAIN CONTENT -->

    <!-- FOOTER -->
    <div id="footer-menu">
      <span>Footer info goes here</span>
    </div>
    <!-- FOOTER -->
  </body>
</html>

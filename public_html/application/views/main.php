<html>
  <head>
  <title><?= $title ?></title>
  <?php $this->load->view('partial/_assets'); ?>
  </head>
  <body>
    <!-- NAVIGATION -->
    <div class="handheld-header">
      <button class="hamburger hamburger--emphatic is-active" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
     </button>
    </div>
    <div class="floating-menu">
      <div class="commet">
        <div class="commet-core">
          <span></span>
        </div>
      </div>
      <div class="commet-tail">
        <div class="child-tail-1">
          <span class="child-tail-inner-1"></span>
          <span class="child-tail-inner-2"></span>
        </div>
        <div class="child-tail-2">
          <span class="child-tail-inner-1"></span>
        </div>
        <div class="child-tail-3">
          <span class="child-tail-inner-1"></span>
        </div>
        <div class="child-tail-4">
          <span class="child-tail-inner-1"></span>
        </div>
      </div>
    </div>
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
    <script>
      var $hamburger = $(".hamburger");
      $hamburger.on("click", function(e) {
        $hamburger.toggleClass("is-active");
        // Do something else, like open/close menu
      });
   </script>
  </body>
</html>

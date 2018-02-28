<?php $this->load->helper('url'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/select2.css"/>
<link rel="stylesheet" href="assets/css/app.css"/>

<!-- Jquery library from cdn -->
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

<?php if (ENVIRONMENT == 'development'){ echo '<script type="text/javascript" src="assets/js/debug/debug.js"></script>';} ?>
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/select2.js"></script>

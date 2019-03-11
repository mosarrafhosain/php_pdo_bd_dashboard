<?php require_once __DIR__ . '/partial/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once __DIR__ . '/partial/sidebar.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $title; ?></h1>
      </div>

      <div class="row">
        <div class="col-md-12">
          <input type="text" id="searchbox" class="form-control" placeholder="">
          <p id="target"></p>
        </div>
      </div>
    </main>
  </div>
</div>

<?php require_once __DIR__ . '/partial/script.php'; ?>

<script type="text/javascript">

  setPlaceholder();

  function setPlaceholder() {
    var message = 'This is a message to be rendered'.split('').reverse();

    // Set the frequency of your 'pops'
    var timeout = 100;

    var output = setInterval(function () {

      var currentPlaceholder = $("#searchbox").attr("placeholder");
      var newPlaceholder = currentPlaceholder + message.pop();

      // Add text to the target element
      $('#searchbox').prop("placeholder", newPlaceholder);

      // No more characters - exit
      if (message.length === 0) {
        clearInterval(output);
        $("#searchbox").attr("placeholder", "");
        setPlaceholder();
      }

    }, timeout);
  }

  jQuery(document).ready(function ($) {
    var placeHolder = ['one...............', 'two...............', 'three...............', 'four...............', 'five...............'];
    var n = 0;
    var loopLength = placeHolder.length;

    /*setInterval(function () {
     if (n < loopLength) {
     var newPlaceholder = placeHolder[n].split('');
     n++;
     setInterval(function () {
     $('input').prop('placeholder', newPlaceholder);
     }, 100);
     } else {
     $('input').prop('placeholder', placeHolder[0]);
     n = 0;
     }
     }, 2000);*/
  });

</script>

<!--<script type="text/javascript">
  //var ph = "Search Website e.g. \"Dancing Cats\"";
  var searchBar = $('#searchbox');
  var phCount = 0;
  var ph = ["Search Invoice No e.g. 'INV-123'", "Search Invoice ID e.g. 'BI-0000-1234'", "Search PAN Code e.g. '1900123'", "Search Supplier Name e.g. 'Global Brand'"];
  // function to return random number between
  // with min/max range
  function randDelay(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }

  // function to print placeholder text in a 
  // 'typing' effect
  function printLetter(string, el) {
    // split string into character seperated array
    var arr = string.split(''),
            input = el,
            // store full placeholder
            origString = string,
            // get current placeholder value
            curPlace = $(input).attr("placeholder"),
            // append next letter to current placeholder
            placeholder = curPlace + arr[phCount];

    setTimeout(function () {
      // print placeholder text
      $(input).attr("placeholder", placeholder);
      $(input).addClass('input-class');
      // increase loop count
      phCount++;
      // run loop until placeholder is fully printed
      if (phCount < arr.length) {
        printLetter(origString, input);
      }
      // use random speed to simulate
      // 'human' typing
    }, randDelay(50, 90));
  }

  // function to init animation
  var i = 0;
  function placeholder() {
    setTimeout(function () {
      $(searchBar).attr("placeholder", "");
      if (i < ph.length) {
        phCount = 0;
        printLetter(String(ph[i]), searchBar);

        placeholder();
        i++;
      }
    }, 4000)
    //printLetter(ph, searchBar);
  }

  placeholder();
</script>-->

<!--<script type="text/javascript">
  // Consturct a message, transform it to an array using .split() and reverse it
  // If you want to print out one word at a time instead of a character at a time
  // Change .split('') to .split(' ')
  var $message = 'This is a message to be rendered'.split('').reverse();

  // Set the frequency of your 'pops'
  var $timeout = 1000;

  var outputSlowly = setInterval(function () {

    // Add text to the target element
    $('#target').append($message.pop());

    // No more characters - exit
    if ($message.length === 0) {
      clearInterval(outputSlowly);
    }

  }, $timeout);
</script>-->

<?php require_once __DIR__ . '/partial/footer.php'; ?>

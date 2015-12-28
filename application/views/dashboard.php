<?=$header;?>
<?=$header_nav;?>
 <section class="content">
      <div class="main col-md-9 col-md-offset-3">
        <div class="page-header">
          <h1>Digital Online Shop</h1>
        </div>
        <?php
        $url = "https://bitpay.com/api/rates";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $rate = $data[0]["rate"];
        $rate1 = $data[1]["rate"];
        $rate2 = $data[2]["rate"];
        $rate145 = $data[145]["rate"];
        ?>
        BTC/USD: <?=$rate?>
        <br>
        BTC/EURO: <?=$rate1?>
        <br>
        BTC/GBP: <?=$rate2?>
        <br>
        BTC/VND : <?=$rate145?>
      </div>
    </section>
<?php echo $footer; ?>
<?php echo get_header()?>
    <?php
        the_post();
    ?>
    <div class="post-header" style="background: url('<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-6k0VD3xNw6U-unsplash.jpg')?>');">
        <p class="txt-md txt-light">Home / <?php echo the_title()?></p>
    </div>
    <div class="main">
        <div class="donation-box mx-auto rounded shadow">
            <p class="txt-normal txt-lg txt-dark txt-bold mx-auto text-center"><?php echo rwmb_meta('page_title')?></p>
            <p class="txt-normmal txt-sm txt-light mx-auto text-center"><?php echo rwmb_meta('page_description')?></p>
            <hr>
            <?php
                $payment_methods_settings = rwmb_meta('payment_methods_settings');
            ?>
            <div class="d-flex w-70 py-3">
                <?php
                    $paypal = $payment_methods_settings['paypal'] ?? '';
                ?>
                <div class="col-md-3 txt-bold txt-md">Paypal:</div>
                <div class="col-md-5">
                    <div class="row pb-2 mb-3 txt-normal txt-light txt-sm" style="border-bottom:1px solid grey;">
                        Email: <?php echo $paypal['email'] ?? '';?>
                    </div>
                    <div class="row pb-2 mb-3 txt-normal txt-light txt-sm" style="border-bottom:1px solid grey;">
                        Phone: <?php echo $paypal['phone_number'] ?? '';?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex w-70 py-3">
                <?php
                    $bitcoin = $payment_methods_settings['bitcoin'] ?? '';
                ?>
                <div class="col-md-3 txt-bold txt-md">BTC:</div>
                <div class="col-md-5">
                    <div class="row pb-2 mb-3 txt-normal txt-light txt-xsm" style="border-bottom:1px solid grey;">
                        <?php echo $bitcoin['btc_wallet_address'] ?? '';?>
                    </div>
                </div>
            </div>
            <div class="d-flex w-70 py-3">
                <?php
                    $ethereum = $payment_methods_settings['ethereum'] ?? '';
                ?>
                <div class="col-md-3 txt-bold txt-md">ETH:</div>
                <div class="col-md-5">
                    <div class="row pb-2 mb-3 txt-normal txt-light txt-xsm" style="border-bottom:1px solid grey;">
                        <?php echo $ethereum['eth_wallet_address'] ?? '';?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="py-3">
                <?php
                    $paystack = $payment_methods_settings['paystack'] ?? '';
                    $flutterwave = $payment_methods_settings['flutterwave'] ?? '';
                ?>
                <p class="txt-normal txt-md txt-bold mx-auto text-center">You can also make your donations with debit/credit card</p>
                <div class="row justify-content-center py-3">
                    <a href="<?php echo $paystack['paystack_payment_link'] ?? '';?>" target="_blank" class="btn btn-primary txt-sm mr-3">Pay with paystack</a>
                    <a href="<?php echo $flutterwave['flutterwave_payment_link'] ?? '';?>" target="_blank" class="btn btn-primary txt-sm">Pay with flutterwave</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    ?>
<?php echo get_footer()?>
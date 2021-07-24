<?php echo get_header();?>
    <div class="post-header" style="background: url('<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-6k0VD3xNw6U-unsplash.jpg')?>');">
        <p class="txt-xlg text-dark txt-bold">CONTACT US</p>
        <p class="txt-md text-dark">Home/Contact Us</p>
    </div>
    <div class="contact-section shadow mx-auto px-4">
        <?php
            if(isset($_SESSION["msg"])){
                echo '<div class="alert alert-info">'.$_SESSION['msg'].'</div>';
                unset($_SESSION['msg']);
            }
        ?>
        <div class="mx-auto justify-content-center">
            <p class="txt-sm mx-auto text-center txt-red">HAVE A QUESTION</p>
            <p class="txt-lg mx-auto txt-bold text-center txt-dark">SEND US A MESSAGE</p>
            <form action="" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Name" class="w-100 mb-3">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" placeholder="Email" class="w-100 mb-3">
                    </div>
                </div>
                <div class="row">
                    <textarea name="message" id="" cols="30" rows="10" class="mx-auto txt-light">Enter Your Message</textarea>
                </div>
                <div class="row mt-3 mx-auto justify-content-center">
                    <button type="submit" name="submit_contact" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php echo get_footer();?>
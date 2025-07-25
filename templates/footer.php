<?php
$instagram_link = get_field('instagram_link', 'option');
$footer_logo = get_field('footer_logo', 'option');
$mail_heading = get_field('mail_heading', 'option');
$work_with_icon = get_field('work_with_icon', 'option');
$social_footer_icon = get_field('social_footer_icon', 'option');

$buttons = get_field('buttons', 'option');
$footer_text = get_field('footer_text', 'option');
$footer_link_group = get_field('footer_link_group', 'option');
?>

<footer class="footer">
    <div class="footer-slider-content bg-white position-relative z-3 overflow-hidden dpb-55 tpb-35">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center dmb-25">
                <a class="sans-medium font30 space-0_9 leading20 res-font25 res-space-0_72 res-leading30 text-center text-decoration-none text-1B2995"
                    href="  <?php echo $instagram_link['url'] ?>" target="_blank">
                    <?php echo $instagram_link['title'] ?>
                </a>
            </div>
            <div class="footer-slider">
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/insta-1.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/insta-2.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/insta-3.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/insta-4.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/insta-5.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/left-right-3.png" alt="">
                </div>
                <div class="footer-img radius15 overflow-hidden">
                    <img class="w-100 h-100 object-cover" src="/wp-content/uploads/2025/07/left-right-3.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-main position-sticky bottom-0 -0 bg-1B2995 dpt-120 dpb-40">
        <div class="container">
            <div class="footer-logo dmb-55">
                <img class="w-100" src="<?php echo $footer_logo; ?>" alt="footer-logo">
            </div>
            <div class="row justify-content-between">
                <div class="email-content col-xl-4 col-lg-4 col-sm-8 col-12">
                    <div class="sans-medium font30 space-0_9 leading20 res-font25 res-space-0_72 res-leading30 text-white dmb-25 tmb-20">
                        <?php echo $mail_heading; ?>
                    </div>
                    <div class="position-relative">
                        <?php echo do_shortcode('[contact-form-7 id="d47be5f" title="Subscriber"]'); ?>
                    </div>
                </div>
                <div class="logo-content col-xl-3 col-lg-3">
                    <div class="font14 space-0_42 leading20 text-white dmb-30 tmb-20">
                        Proud to work with
                    </div>
                    <div class="col-xl-9 col-lg-10">
                        <div class="footer-brand-logo d-flex justify-content-between justify-content-lg-start row row8">
                            <?php foreach ($work_with_icon as $work_with_icon_single) : ?>
                                <div class="col-xl-6 col-lg-6 col-sm-2 col-4 dmb-15">
                                    <div
                                        class="logo-bg bg-white radius10 px-2 d-flex justify-content-center align-items-center">
                                        <div class="brand-img">
                                            <img class="w-100 h-100 object-fit-contain"
                                                src="<?php echo $work_with_icon_single; ?>" alt="brand-logo">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="social-content col-xl-3 col-lg-4">
                    <div class="social-img-content d-flex justify-content-lg-start justify-content-xl-end dmb-55 tmb-50">
                        <?php foreach ($social_footer_icon as $social_footer_icon_single) :
                            $social_footer_icon_single_icon = $social_footer_icon_single['icon'];
                            $social_footer_icon_single_link = $social_footer_icon_single['link'];
                        ?>
                            <a href="<?php echo $social_footer_icon_single_link; ?>" class="social-bg radius8 d-flex justify-content-center align-items-center me-2">
                                <div class="social-img d-flex justify-content-center align-items-center">
                                    <img class="" src="<?php echo $social_footer_icon_single_icon; ?>" alt="">
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="d-flex justify-content-start justify-content-xl-end">
                        <?php foreach ($buttons as $button) :
                            $button_link = $button['link'];
                        ?>
                            <div class="footer-btn me-xl-3 me-lg-2 me-3">
                                <a class="btnA white-border-btn sans-medium font16 space-0_48 leading26 rounded-pill text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                    href="  <?php echo $button_link['url']; ?>">
                                    <?php echo $button_link['title']; ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="footer-inner-content row d-flex d-lg-row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-6 sans-normal font12 leading20 text-white dmt- 20">
                    <?php echo $footer_text; ?>
                </div>
                <div class="col-xl-6 col-lg-6 footer-links">
                    <ul class="list-none d-flex justify-content-start justify-content-lg-end justify-content-xl-end align-items-center mb-0 ps-0">
                        <?php foreach ($footer_link_group as $footer_link_group_single) :
                            $footer_link_group_single_link = $footer_link_group_single['link'];
                        ?>
                            <li class="me-xl-4 me-2">
                                <a class="sans-normal font12 leading20 res-font12 res-leading20 text-decoration-none text-white" href="<?php echo $footer_link_group_single_link['url'] ?>"><?php echo $footer_link_group_single_link['title'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</footer>
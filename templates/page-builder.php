<?php
/*
 * Template Name: Page Builder
 */
?>
<?php if (have_rows('flexible_content')):
    while (have_rows('flexible_content')):
        the_row();
        if (get_row_layout() == 'hero_section'):
            $media_list = get_sub_field("media_list");
            $image = get_sub_field("image");
            $video = get_sub_field("video");
            $youtube = get_sub_field("youtube");
            $vimeo = get_sub_field("vimeo");
            $heading = get_sub_field("heading");
            $link = get_sub_field("link");

?>

            <!-- hero-section -->
            <section class="hero-section position-relative overflow-hidden tpt-195 dpt-210">
                <div class="container">
                    <div class="col-lg-7 tmb-65 dmb-50">
                        <div class="garamond font89 leading95 space-1_78 res-font40 res-leading55 text-white tmb-30 dmb-25">
                            <?php echo $heading; ?>
                        </div>
                        <a href="<?php echo $link['url']; ?>"
                            class="text-decoration-none btnA white-border-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                            <?php echo $link['title']; ?>
                        </a>
                    </div>
                    <div class="pattern-img position-fixed top-0 dmt-135">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pattern-1.svg" alt="" class="h-100">
                    </div>
                    <div class="hero-img">
                        <div class="h-100 radius15 overflow-hidden position-relative">
                            <?php if ($media_list == "image"): ?>
                                <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="" class="w-100 h-100 object-cover">
                            <?php endif; ?>

                            <!-- video -->
                            <?php if ($media_list == "video"): ?>
                                <video autoplay loop muted class="w-100 h-100 object-cover">
                                    <source src="<?php echo $video; ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>

                            <!-- youtube -->
                            <?php if ($media_list == "youtube"): ?>
                                <iframe width="560" height="315" class="w-100 h-100 object-cover" src="<?php echo $youtube; ?>"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            <?php endif; ?>

                            <!-- vimeo -->
                            <?php if ($media_list == "vimeo"): ?>
                                <iframe width="560" height="315" class="w-100 h-100 object-cover" src="<?php echo $vimeo; ?>"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "center_content"):
            $heading = get_sub_field("heading");
            $content = get_sub_field("content");
            $link = get_sub_field("link");
        ?>

            <!-- center-content-section -->
            <section class="center-content-section position-relative bg-white z-3">
                <div class="container">
                    <div class="col-lg-6 mx-auto">
                        <div class="garamond font57 leading55 res-font30 res-leading38 text-1B2995 text-center tmb-15 dmb-20"><?php echo $heading; ?></div>
                        <div class="sans-normal font18 leading24 res-font16 res-leading24 text-191919 text-center dmb-35"><?php echo $content; ?></div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo $link['url']; ?>"
                            class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                            <?php echo $link['title']; ?>
                        </a>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "image_content"):
            $image_position = get_sub_field("image_position");
            $image = get_sub_field("image");
            $heading = get_sub_field("heading");
            $content = get_sub_field("content");
            $buttons = get_sub_field("buttons");
        ?>
            <?php if ($image_position == 'left'): ?>
                <section class="left-right-section position-relative bg-white z-3">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 pe-lg-2 tmb-25">
                                <div class="left-right-slider-section position-relative">
                                    <div class="left-right-slider">
                                        <div class="left-right-img position-relative z-2 radius10 overflow-hidden">
                                            <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt=""
                                                class="w-100 h-100 object-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="col-lg-10 pe-lg-3 ms-auto">
                                    <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25"><?php echo $heading; ?></div>
                                    <div class="sans-normal font18 leading24 res-font16 text-191919 dmb-30 pe-3 pe-lg-0"><?php echo $content; ?></div>
                                    <?php foreach ($buttons as $links_item):
                                        $link = $links_item['link'];
                                    ?>
                                        <?php if (!empty($link['url'])):
                                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3">
                                                <?php echo $link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>


            <?php if ($image_position == 'right'): ?>
                <section class="left-right-hero-section">
                    <div class="container">
                        <div class="row flex-lg-row flex-column flex-column-reverse align-items-center">
                            <div class="col-lg-6">
                                <div class="garamond font72 leading95 space-1_44 res-font30 res-leading36 res-space-0_6 text-1B2995 dmb-15"><?php echo $heading; ?></div>
                                <div class="col-lg-8">
                                    <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-35 dmb-30 pe-3 pe-lg-5">
                                        <?php echo $content; ?>
                                    </div>
                                </div>
                                <div>
                                    <?php foreach ($buttons as $links_item):
                                        $link = $links_item['link'];
                                    ?>
                                        <?php if (!empty($link['url'])):
                                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-lg-3 tmb-10">
                                                <?php echo $link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-2 tmb-25">
                                <div class="left-right-hero-img radius10 overflow-hidden">
                                    <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php elseif (get_row_layout() == "events_cards"):
            $heading = get_sub_field("heading");
            $content = get_sub_field("content");
            $link = get_sub_field("link");

        ?>
            <!-- upcoming-slider-section -->
            <section class="upcoming-slider-section position-relative bg-white z-3">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between tmb-35 dmb-45">
                        <div class="col-lg-6 pe-lg-5">
                            <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 dmb-15">
                                <?php echo $heading; ?>
                            </div>
                            <div class="sans-normal font18 leading24 res-font16 text-191919">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <div class="d-lg-flex d-none">
                            <a href="<?php echo $link['url']; ?>"
                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $link['title']; ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-11 col-lg-12 upcoming-slider">
                        <?php

                        $events = tribe_get_events([
                            'posts_per_page' => 3,
                            'start_date' => current_time('Y-m-d H:i:s'),
                            'orderby' => 'event_date',
                            'order' => 'ASC',
                        ]);

                        foreach ($events as $event):
                            $event_id = $event->ID;
                            $title = get_the_title($event_id);
                            $permalink = get_permalink($event_id);
                            $image = get_the_post_thumbnail_url($event_id, 'full') ?: 'assets/images/default.png';
                            $excerpt = get_the_excerpt($event_id);
                            $start_date = tribe_get_start_date($event_id, false, 'd');
                            $start_month = tribe_get_start_date($event_id, false, 'M');
                            $start_year = tribe_get_start_date($event_id, false, 'Y');
                        ?>
                            <div class="upcoming-cards">
                                <a href="<?php echo esc_url($permalink); ?>" class="upcoming-card text-decoration-none">
                                    <div class="upcoming-img radius10 position-relative overflow-hidden tmb-25 dmb-30">
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                            class="w-100 h-100 object-cover">
                                        <div class="date-label position-absolute top-0 end-0">
                                            <div class="date radius8 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div class="garamond font38 leading55 res-font35 res-leading38 text-white">
                                                        <?php echo esc_html($start_date); ?>
                                                    </div>
                                                    <div class="ms-2">
                                                        <div class="sans-normal font14 leading20 text-white">
                                                            <?php echo esc_html($start_month); ?>
                                                        </div>
                                                        <div class="sans-normal font14 leading20 text-white">
                                                            <?php echo esc_html($start_year); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pe-5">
                                        <div class="garamond font22 leading26 text-1B2995 text-capitalize tmb-10 dmb-15">
                                            <?php echo esc_html($title); ?>
                                        </div>
                                        <div class="sans-normal font14 leading20 text-191919 tmb-25 dmb-15">
                                            <?php echo esc_html($excerpt); ?>
                                        </div>
                                        <div class="arrow-icon d-inline-flex">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/polygon-arrow.svg"
                                                alt="" class="w-100 h-100 object-cover">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach;

                        ?>


                    </div>
                    <div class="d-flex d-lg-none tmt-50">
                        <a href="<?php echo $link['url']; ?>"
                            class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                            <?php echo $link['title']; ?>
                        </a>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == "banners"):
            $single_banner = get_sub_field("single_banner");
        ?>
            <!-- two-card-section -->
            <section class="banners-card-section position-relative bg-white z-3">
                <div class="container">
                    <div class="row row8">
                        <?php foreach ($single_banner as $key => $single_banner_item):
                            $single_banner_item_image = $single_banner_item['image'];
                            $single_banner_item_heading = $single_banner_item['heading'];
                            $single_banner_item_link_slection = $single_banner_item['link_slection'];
                            $single_banner_item_links = $single_banner_item['links'];
                            $single_banner_item_modal_content_group = $single_banner_item['modal_content_group'];
                        ?>
                            <div class="col-lg-6">
                                <div class="two-cards tmb-15">
                                    <?php if ($single_banner_item_link_slection == "link"): ?>
                                        <a href=" <?php echo $single_banner_item_links['url']; ?>"
                                            class="two-card text-decoration-none w-100 h-100 d-inline-flex">
                                            <div class="card-hover h-100 radius15 overflow-hidden position-relative">
                                                <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                    class="w-100 h-100 object-cover img">
                                                <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                </div>
                                                <div
                                                    class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                    <div class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
                                                        <?php echo $single_banner_item_links['title']; ?>
                                                    </div>
                                                    <div class="arrow-icon d-inline-flex">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/polygon-arrow.svg"
                                                            alt="" class="w-100 h-100 object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($single_banner_item_link_slection == "modal"): ?>
                                        <a data-bs-toggle="offcanvas" href="#offcanvasExample-<?php echo $key; ?>" role="button"
                                            aria-controls="offcanvasExample-<?php echo $key; ?>"
                                            class="two-card text-decoration-none w-100 h-100 d-inline-flex">
                                            <div class="card-hover h-100 radius15 overflow-hidden position-relative">
                                                <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                    class="w-100 h-100 object-cover img">
                                                <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                </div>
                                                <div
                                                    class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                    <div class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
                                                        <?php echo $single_banner_item_heading; ?>
                                                    </div>
                                                    <div class="arrow-icon d-inline-flex">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/polygon-arrow.svg"
                                                            alt="" class="w-100 h-100 object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    <?php endif; ?>
                                </div>
                            </div>



                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <?php foreach ($single_banner as $key => $single_banner_item):
                $single_banner_item_image = $single_banner_item['image'];
                $single_banner_item_heading = $single_banner_item['heading'];
                $single_banner_item_link_slection = $single_banner_item['link_slection'];
                $single_banner_item_links = $single_banner_item['links'];
                $single_banner_item_modal_content_group = $single_banner_item['modal_content_group'];
                $single_banner_item_modal_content_group_description = $single_banner_item_modal_content_group['description'];
                $single_banner_item_modal_content_group_button = $single_banner_item_modal_content_group['button'];

            ?>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample-<?php echo $key; ?>"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-body">
                        <button type="button" class="close-btn bg-transparent border-0 p-0 d-flex justify-content-end w-100 tmb-35"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/modal-close.svg" alt="">
                        </button>
                        <div class="garamond font42 leading55 res-font30 res-leading38 text-1B2995 tmb-30 dmb-25">
                            <?php echo $single_banner_item_heading; ?>
                        </div>
                        <div class="offcanvas-img w-100 radius15 overflow-hidden tmb-25 dmb-55">
                            <img src="<?php echo $single_banner_item_image['sizes']['fullscreen']; ?>" alt=""
                                class="w-100 h-100 object-cover">
                        </div>
                        <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-35 dmb-25">
                            <?php echo $single_banner_item_modal_content_group_description; ?>
                        </div>
                        <a href="<?php echo $single_banner_item_modal_content_group_button['url']; ?>"
                            class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition"><?php echo $single_banner_item_modal_content_group_button['title']; ?></a>
                    </div>
                </div>

            <?php endforeach; ?>


        <?php elseif (get_row_layout() == "sub_hero_section"):
            $background_type = get_sub_field("background_type");
            $image = get_sub_field("image");
            $video = get_sub_field("video");
            $youtube = get_sub_field("youtube");
            $vimeo = get_sub_field("vimeo");
            $heading = get_sub_field("heading");
            $links = get_sub_field("links");
        ?>

            <!-- sub-hero-section -->
            <section class="sub-hero-section">
                <div class="container h-100">
                    <div class="h-100 position-relative overflow-hidden radius15">
                        <?php if ($background_type == "image"): ?>
                            <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="" class="w-100 h-100 object-cover">
                        <?php endif; ?>
                        <!-- <?php if ($background_type == "video"): ?>
                          
                        <?php endif; ?>
                        <?php if ($background_type == "youtube"): ?>
                          
                        <?php endif; ?>
                        <?php if ($background_type == "vimeo"): ?>
                          
                        <?php endif; ?> -->
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity36"></div>
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                            <div>
                                <div class="garamond font89 leading95 res-font35 res-leading38 res-space-0_72 space-1_78 text-white text-center tmb-20 dmb-15">
                                    <?php echo $heading; ?>
                                </div>
                                <div class="d-flex flex-lg-row flex-column align-items-center">
                                    <?php foreach ($links as $links_item):
                                        $link = $links_item['link'];
                                    ?>
                                        <?php if (!empty($link['url'])):
                                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="text-decoration-none btnA white-black-border-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition mx-2 tmb-10">
                                                <?php echo $link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "location_section"):
            $heading = get_sub_field("heading");
            $description = get_sub_field("description");
            $button = get_sub_field("button");
            $schedule = get_field('schedule', 'option');
            $map_image = get_field('map_image', 'option');

        ?>


            <section id="locationSection" class="location-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 pe-lg-2 tmb-25">
                            <div class="location-img radius10 overflow-hidden">
                                <img src="<?php echo $map_image; ?>" alt="" class="w-100 h-100 object-cover">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="col-lg-10 pe-lg-3 ms-auto">
                                <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25"><?php echo $heading; ?></div>
                                <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-20 dmb-15"><?php echo $description; ?></div>
                                <ul class="list-none ps-0 mb-0">
                                    <?php foreach ($schedule as $schedule_item):
                                        $schedule_item_day = $schedule_item['day'];
                                        $schedule_item_time = $schedule_item['time'];
                                    ?>
                                        <li class="sans-normal font18 leading24 res-font16 text-191919 dmb-10"><?php echo $schedule_item_day; ?>
                                            <?php echo $schedule_item_time; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <?php if (!empty($button['url'])):
                                    $target_2 = ($button['target'] == '_blank') ? "_blank" : ""; ?>

                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $target_2; ?>"
                                        class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition tmt-40 dmt-20">
                                        <?php echo $button['title']; ?>
                                    </a>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "left_content_section"):

            $heading = get_sub_field("heading");
            $description = get_sub_field("description");
            $button = get_sub_field("button");

        ?>
            <section class="left-content-section position-relative">
                <div class="container">
                    <div class="col-lg-8 pe-lg-2 z-3">
                        <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25"><?php echo $heading; ?></div>
                        <div class="sans-normal font18 leading24 res-font16 text-191919">
                            <?php echo $description; ?>
                        </div>
                    </div>
                </div>
                <div class="pattern-img position-absolute top-0 z-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pattern-2.svg" alt="" class="h-100">
                </div>
            </section>

        <?php elseif (get_row_layout() == "get_in_touch"):

            $heading = get_sub_field("heading");


        ?>

            <section id="getInTouchSection" class="get-in-touch-section position-relative">
                <div class="container">
                    <div class="col-lg-8 mx-auto">
                        <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 text-center tmb-40 dmb-20">
                            <?php echo $heading; ?>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="fc3afcf" title="Get in Touch"]'); ?>
                    </div>
                </div>
                <div class="pattern-img position-absolute bottom-0 z-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pattern-3.svg" alt="" class="h-100">
                </div>
            </section>

        <?php elseif (get_row_layout() == "left_right_hero_section"):
            $right_image = get_sub_field("right_image");
            $prefix = get_sub_field("prefix");
            $heading = get_sub_field("heading");
            $description = get_sub_field("description");
            $buttons = get_sub_field("buttons");
        ?>
            <section class="left-right-hero-section">
                <div class="container">
                    <div class="row flex-lg-row flex-column flex-column-reverse align-items-center">
                        <div class="col-lg-6">
                            <div
                                class="label bg-858AB5-label sans-medium font14 leading20 space-0_42 text-1B2995 radius8 d-inline-flex align-items-center justify-content-center px-3 tmb-20">
                                <?php echo $prefix; ?>
                            </div>
                            <div class="garamond font72 leading95 res-font30 res-leading38 res-space-0_6 space-1_44 text-1B2995 dmb-15"> <?php echo $heading; ?></div>
                            <div class="col-lg-8">
                                <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-35 dmb-30 pe-3 pe-lg-5">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                            <div>
                                <?php foreach ($buttons as $button):
                                    $button_single = $button['link'];
                                ?>
                                    <?php if (!empty($button_single['url'])):
                                        $target_2 = ($button_single['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a href="<?php echo $button_single['url']; ?>" target="<?php echo $target_2; ?>"
                                            class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3 tmb-10">
                                            <?php echo $button_single['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-2 tmb-25">
                            <div class="left-right-hero-img radius10 overflow-hidden">
                                <img src="<?php echo $right_image['sizes']['medium']; ?>" alt="" class="w-100 h-100 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "two_card_section"):
            $two_card_group = get_sub_field("two_card_group");
        ?>

            <section class="two-card-section position-relative bg-white z-3">
                <div class="container">
                    <div class="row row8">
                        <?php foreach ($two_card_group as $one_card_group):
                            $one_card_group_image = $one_card_group["image"];
                            $one_card_group_link = $one_card_group["link"];
                        ?>
                            <div class="col-lg-6">
                                <div class="two-cards tmb-15">
                                    <a href="<?php echo $one_card_group_link['url']; ?>" class="two-card text-decoration-none w-100 h-100 d-inline-flex">
                                        <div class="card-hover h-100 radius15 overflow-hidden position-relative">
                                            <img src="<?php echo $one_card_group_image['sizes']['fullscreen']; ?>" alt=""
                                                class="w-100 h-100 object-cover img">
                                            <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                            </div>
                                            <div
                                                class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                <div class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
                                                    <?php echo $one_card_group_link['title']; ?>
                                                </div>
                                                <div class="arrow-icon d-inline-flex">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/polygon-arrow.svg"
                                                        alt="" class="w-100 h-100 object-cover">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == "banner_section"):
            $banner_image = get_sub_field("banner_image");
            $heading = get_sub_field("heading");
            $description = get_sub_field("description");
            $buttons = get_sub_field("buttons");
        ?>
            <section class="banner-section">
                <div class="container">
                    <div class="banner-img radius15 overflow-hidden position-relative">
                        <img src="<?php echo $banner_image['sizes']['medium']; ?>" alt="" class="w-100 h-100 object-cover">
                        <div class="banner-data position-absolute top-0 start-0 h-100 w-100 px-3 px-lg-5 d-flex align-items-center tmb-15">
                            <div class="col-lg-5 pe-lg-4">
                                <div class="ps-lg-5 pe-lg-4 banner-content bg-white radius10 tpt-30 tpb-30 dpt-40 dpb-40">
                                    <div class="garamond font42 leading55 res-font30 res-leading38 text-1B2995 tmb-15 mb-2">
                                        <?php echo $heading; ?>
                                    </div>
                                    <div class="sans-normal font16 leading24 text-191919 tmb-25 dmb-20">
                                        <?php echo $description; ?>
                                    </div>



                                    <?php foreach ($buttons as $button):
                                        $button_single = $button['link'];
                                    ?>
                                        <?php if (!empty($button_single['url'])):
                                            $target_2 = ($button_single['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $button_single['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-lg-3 tmb-10">
                                                <?php echo $button_single['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "spacing"):
            $desktop = get_sub_field("desktop");
            $tablet = get_sub_field("tablet");
            $mobile = get_sub_field("mobile");
            $desktop_mb = $desktop["margin_bottom"];
            $desktop_mb_main = !empty($desktop["margin_bottom"]) ? " dpb-" : "";
            $tablet_mb = $tablet["margin_bottom"];
            $tablet_mb_main = !empty($tablet["margin_bottom"]) ? " tpb-" : "";
            $mobile_mb = $mobile["margin_bottom"];
            $mobile_mb_main = !empty($mobile["margin_bottom"]) ? " mpb-" : "";
        ?>

            <div class="spacing<?php
                                echo $desktop_mb_main;
                                echo $desktop_mb;
                                echo $tablet_mb_main;
                                echo $tablet_mb;
                                echo $mobile_mb_main;
                                echo $mobile_mb;
                                ?>"></div>






        <?php endif; ?>



<?php
    endwhile;
endif; ?>
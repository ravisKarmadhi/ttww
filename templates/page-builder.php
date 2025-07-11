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
            <section class="hero-section position-relative overflow-hidden dpt-210">
                <div class="container">
                    <div class="col-7 dmb-50">
                        <div class="garamond font89 leading95 space-1_78 text-white dmb-25">
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
                    <div class="col-6 mx-auto">
                        <div class="garamond font57 leading55 text-1B2995 text-center dmb-20"><?php echo $heading; ?></div>
                        <div class="sans-normal font18 leading24 text-191919 text-center dmb-35"><?php echo $content; ?></div>
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
            $link = get_sub_field("link");
            $button_2 = get_sub_field("button_2");
            ?>

            <section class="left-right-section position-relative bg-white z-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-7 pe-2">
                            <div class="left-right-slider-section position-relative">
                                <div class="left-right-slider">
                                    <div class="left-right-img position-relative z-2 radius10 overflow-hidden">
                                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt=""
                                            class="w-100 h-100 object-cover">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="col-10 pe-3 ms-auto">
                                <div class="garamond font57 leading67 text-1B2995 dmb-25"><?php echo $heading; ?></div>
                                <div class="sans-normal font18 leading24 text-191919 dmb-30"><?php echo $content; ?></div>
                                <a href="<?php echo $link['url']; ?>"
                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                    <?php echo $link['title']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "events_cards"):
            $heading = get_sub_field("heading");
            $content = get_sub_field("content");
            $link = get_sub_field("link");

            ?>
            <!-- upcoming-slider-section -->
            <section class="upcoming-slider-section position-relative bg-white z-3">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between dmb-45">
                        <div class="col-6 pe-5">
                            <div class="garamond font57 leading67 text-1B2995 dmb-15">
                                <?php echo $heading; ?>
                            </div>
                            <div class="sans-normal font18 leading24 text-191919">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <div>
                            <a href="<?php echo $link['url']; ?>"
                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $link['title']; ?>
                            </a>
                        </div>
                    </div>
                    <div class="upcoming-slider">

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
                                    <div class="upcoming-img radius10 position-relative overflow-hidden dmb-30">
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                            class="w-100 h-100 object-cover">
                                        <div class="date-label position-absolute top-0 end-0">
                                            <div class="date radius8 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div class="garamond font38 leading55 text-white">
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
                                        <div class="garamond font22 leading26 text-1B2995 text-capitalize dmb-15">
                                            <?php echo esc_html($title); ?>
                                        </div>
                                        <div class="sans-normal font14 leading20 text-191919 dmb-15">
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
                </div>
            </section>



        <?php elseif (get_row_layout() == "banners"):
            $single_banner = get_sub_field("single_banner");


            ?>

            <!-- two-card-section -->
            <section class="two-card-section position-relative bg-white z-3">
                <div class="container">
                    <div class="row row8">
                        <?php foreach ($single_banner as $key => $single_banner_item):
                            $single_banner_item_image = $single_banner_item['image'];
                            $single_banner_item_heading = $single_banner_item['heading'];
                            $single_banner_item_link_slection = $single_banner_item['link_slection'];
                            $single_banner_item_links = $single_banner_item['links'];
                            $single_banner_item_modal_content_group = $single_banner_item['modal_content_group'];
                            ?>
                            <div class="col-6">
                                <div class="two-cards">
                                    <?php if ($single_banner_item_link_slection == "link"): ?>
                                        <a href=" <?php echo $single_banner_item_links['url']; ?>"
                                            class="two-card text-decoration-none d-inline-flex">
                                            <div class="card-hover h-100 radius15 overflow-hidden position-relative">
                                                <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                    class="w-100 h-100 object-cover img">
                                                <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                </div>
                                                <div
                                                    class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                    <div class="garamond font38 leading55 text-white text-capitalize">
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
                                            class="two-card text-decoration-none d-inline-flex">
                                            <div class="card-hover h-100 radius15 overflow-hidden position-relative">
                                                <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                    class="w-100 h-100 object-cover img">
                                                <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                </div>
                                                <div
                                                    class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                    <div class="garamond font38 leading55 text-white text-capitalize">
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
                        <button type="button" class="close-btn bg-transparent border-0 p-0 d-flex justify-content-end w-100"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/modal-close.svg" alt="">
                        </button>
                        <div class="garamond font42 leading55 text-1B2995 dmb-25">
                            <?php echo $single_banner_item_heading; ?>
                        </div>
                        <div class="offcanvas-img w-100 radius15 overflow-hidden dmb-55">
                            <img src="<?php echo $single_banner_item_image['sizes']['fullscreen']; ?>" alt=""
                                class="w-100 h-100 object-cover">
                        </div>
                        <div class="sans-normal font18 leading24 text-191919 dmb-25">
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
                                <div class="garamond font89 leading95 space-1_78 text-white text-center dmb-15">
                                    <?php echo $heading; ?>
                                </div>
                                <div>
                                    <?php foreach($links as $links_item):
                                        $link = $links_item['link'];
                                        ?>
                                    <?php if (!empty($link['url'])):
                                        $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                            class="text-decoration-none btnA white-black-border-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition mx-2">
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
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
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font89 leading95 space-1_78 res-font40 res-leading55 text-white tmb-30 dmb-25 tmb-10">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($link)): ?>
                            <a href="<?php echo $link['url']; ?>"
                                class="text-decoration-none btnA white-border-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
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
            <section class="center-content-section position-relative bg-white z-3 overflow-hidden">
                <div class="container">
                    <div class="col-lg-6 mx-auto">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font57 leading55 res-font30 res-leading38 text-1B2995 text-center tmb-15 dmb-20">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($content)): ?>
                            <div class="sans-normal font18 leading24 res-font16 res-leading24 text-191919 text-center dmb-35">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if (!empty($link)): ?>
                            <a href="<?php echo $link['url']; ?>"
                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "left_right_section"):
            $image_position = get_sub_field("image_position");
            $images_videoes = get_sub_field("images_videoes");
            $heading = get_sub_field("heading");
            $content = get_sub_field("content");
            $buttons = get_sub_field("buttons");
        ?>
            <!-- left-right-section -->
            <?php if ($image_position == 'left'): ?>
                <section class="left-right-section position-relative bg-white z-3 overflow-hidden">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 pe-lg-2 tmb-25">
                                <div class="left-right-slider-section position-relative">
                                    <div class="left-right-slider">
                                        <?php if (!empty($images_videoes)):
                                            foreach ($images_videoes as $img):
                                                $image_or_video = $img['image_or_video'];
                                                $image = $img['image'];
                                                $video = $img['video'];
                                                $youtube = $img['youtube'];
                                                $vimeo = $img['vimeo'];
                                        ?>
                                                <div class="left-right-img position-relative z-2 radius10 overflow-hidden">
                                                    <?php if (!empty($image_or_video) && $image_or_video == 'Image' && $image): ?>
                                                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt=""
                                                            class="w-100 h-100 object-cover">
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Video' && $video): ?>
                                                        <!-- video -->
                                                        <video autoplay loop muted class="w-100 h-100 object-cover">
                                                            <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                                        </video>
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Youtube' && $youtube): ?>
                                                        <!-- youtube -->
                                                        <iframe class="w-100 h-100 object-cover"
                                                            src="<?php echo convert_youtube_to_embed($youtube); ?>?playlist=<?php echo get_youtube_video_id($youtube) ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                            allow="autoplay; fullscreen">
                                                        </iframe>
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Vimeo' && $vimeo): ?>
                                                        <!-- vimeo -->
                                                        <iframe class="w-100 h-100 object-cover"
                                                            src="<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                            allow="autoplay" allowfullscreen>
                                                        </iframe>
                                                    <?php endif; ?>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 z-3 px-3 dmb-20">
                                        <div class="slick-arrows d-flex align-items-center">
                                            <div
                                                class="prev-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg"
                                                    alt="">
                                            </div>
                                            <div
                                                class="next-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="col-lg-10 pe-lg-3 ms-auto">
                                    <?php if (!empty($heading)): ?>
                                        <div class="garamond font57 leading55 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25">
                                            <?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($content)): ?>
                                        <div class="sans-normal font18 leading24 res-font16 text-191919 dmb-30 pe-3 pe-lg-0">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($buttons)):
                                        foreach ($buttons as $links_item):
                                            $link = $links_item['link'];
                                    ?>
                                            <?php if (!empty($link['url'])):
                                                $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3">
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else: ?>
                <section class="left-right-section position-relative bg-white z-3 overflow-hidden">
                    <div class="container">
                        <div class="row flex-row-reverse align-items-center">
                            <div class="col-lg-7 ps-lg-2 tmb-25">
                                <div class="left-right-slider-section position-relative">
                                    <div class="left-right-slider">
                                        <?php if (!empty($images_videoes)):
                                            foreach ($images_videoes as $img):
                                                $image_or_video = $img['image_or_video'];
                                                $image = $img['image'];
                                                $video = $img['video'];
                                                $youtube = $img['youtube'];
                                                $vimeo = $img['vimeo'];
                                        ?>
                                                <div class="left-right-img position-relative z-2 radius10 overflow-hidden">
                                                    <?php if (!empty($image_or_video) && $image_or_video == 'Image' && $image): ?>
                                                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt=""
                                                            class="w-100 h-100 object-cover">
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Video' && $video): ?>
                                                        <!-- video -->
                                                        <video autoplay loop muted class="w-100 h-100 object-cover">
                                                            <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                                        </video>
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Youtube' && $youtube): ?>
                                                        <!-- youtube -->
                                                        <iframe class="w-100 h-100 object-cover"
                                                            src="<?php echo convert_youtube_to_embed($youtube); ?>?playlist=<?php echo get_youtube_video_id($youtube) ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                            allow="autoplay; fullscreen">
                                                        </iframe>
                                                    <?php elseif (!empty($image_or_video) && $image_or_video == 'Vimeo' && $vimeo): ?>
                                                        <!-- vimeo -->
                                                        <iframe class="w-100 h-100 object-cover"
                                                            src="<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                            allow="autoplay" allowfullscreen>
                                                        </iframe>
                                                    <?php endif; ?>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 z-3 px-3 dmb-20">
                                        <div class="slick-arrows d-flex align-items-center">
                                            <div
                                                class="prev-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg"
                                                    alt="">
                                            </div>
                                            <div
                                                class="next-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="col-lg-10 pe-lg-3 me-auto">
                                    <?php if (!empty($heading)): ?>
                                        <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25">
                                            <?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($content)): ?>
                                        <div class="sans-normal font18 leading24 res-font16 text-191919 dmb-30 pe-3 pe-lg-0">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($buttons)):
                                        foreach ($buttons as $links_item):
                                            $link = $links_item['link'];
                                    ?>
                                            <?php if (!empty($link['url'])):
                                                $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3">
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
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
            <section class="upcoming-slider-section position-relative bg-white z-3 overflow-hidden">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between tmb-35 dmb-45">
                        <div class="col-lg-6 pe-lg-5">
                            <?php if (!empty($heading)): ?>
                                <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 dmb-15">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($content)): ?>
                                <div class="sans-normal font18 leading24 res-font16 text-191919">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-lg-flex d-none">
                            <?php if (!empty($link)): ?>
                                <a href="<?php echo $link['url']; ?>"
                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif; ?>
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
                        if (!empty($events)):
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
                        endif; ?>
                    </div>
                    <div class="d-flex d-lg-none tmt-50">
                        <?php if (!empty($link)): ?>
                            <a href="<?php echo $link['url']; ?>"
                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "banners"):
            $single_banner = get_sub_field("single_banner");
        ?>
            <!-- two-card-section -->
            <section class="banners-card-section position-relative bg-white z-3 overflow-hidden">
                <div class="container">
                    <div class="row row8">
                        <?php if (!empty($single_banner)):
                            foreach ($single_banner as $key => $single_banner_item):
                                $single_banner_item_image = $single_banner_item['image'];
                                $single_banner_item_heading = $single_banner_item['heading'];
                                $single_banner_item_link_slection = $single_banner_item['link_slection'];
                                $single_banner_item_links = $single_banner_item['links'];
                                $single_banner_item_modal_content_group = $single_banner_item['modal_content_group'];
                        ?>
                                <div class="col-lg-6">
                                    <div class="two-cards w-100 tmb-15">
                                        <?php if ($single_banner_item_link_slection == "link"): ?>
                                            <a href=" <?php echo $single_banner_item_links['url']; ?>"
                                                class="two-card text-decoration-none w-100 h-100 d-inline-flex">
                                                <div class="card-hover w-100 h-100 radius15 overflow-hidden position-relative">
                                                    <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                        class="w-100 h-100 object-cover img">
                                                    <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2"> </div>
                                                    <div
                                                        class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                        <div
                                                            class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
                                                            <?php echo $single_banner_item_links['title']; ?>
                                                        </div>
                                                        <div class="arrow-icon d-inline-flex">
                                                            <img src="<?php echo get_template_directory_uri() ?>/templates/icon/polygon-arrow.svg"
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
                                                <div class="card-hover w-100 h-100 radius15 overflow-hidden position-relative">
                                                    <img src="<?php echo $single_banner_item_image['sizes']['medium']; ?>" alt=""
                                                        class="w-100 h-100 object-cover img">
                                                    <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                    </div>
                                                    <div
                                                        class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                        <div
                                                            class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
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
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>
            <?php if (!empty($single_banner)):
                foreach ($single_banner as $key => $single_banner_item):
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
            <?php endforeach;
            endif; ?>

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
            <section class="sub-hero-section overflow-hidden">
                <div class="container h-100">
                    <div class="h-100 position-relative overflow-hidden radius15">
                        <?php if ($background_type == "image"): ?>
                            <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="" class="w-100 h-100 object-cover">
                        <?php endif; ?>
                        <?php if ($background_type == "video"): ?>
                            <video autoplay loop muted class="w-100 h-100 object-cover">
                                <source src="<?php echo $video['url']; ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                        <?php if ($background_type == "youtube"): ?>
                            <iframe class="w-100 h-100 object-cover"
                                src="<?php echo convert_youtube_to_embed($youtube); ?>?playlist=<?php echo get_youtube_video_id($youtube) ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                allow="autoplay; fullscreen">
                            </iframe>
                        <?php endif; ?>
                        <?php if ($background_type == "vimeo"): ?>
                            <iframe class="w-100 h-100 object-cover"
                                src="<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1" allow="autoplay"
                                allowfullscreen>
                            </iframe>
                        <?php endif; ?>
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity36"></div>
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                            <div>
                                <?php if (!empty($heading)): ?>
                                    <div
                                        class="garamond font89 leading95 res-font35 res-leading38 res-space-0_72 space-1_78 text-white text-center tmb-20 dmb-15">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="d-flex flex-lg-row flex-column align-items-center">
                                    <?php if (!empty($links)):
                                        foreach ($links as $links_item):
                                            $link = $links_item['link'];
                                    ?>
                                            <?php if (!empty($link['url'])):
                                                $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>"
                                                    class="text-decoration-none btnA white-black-border-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition mx-2 tmb-10">
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
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
            $show_timing = get_sub_field("show_timing");
        ?>
            <!-- location-section -->
            <section id="locationSection" class="location-section overflow-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 pe-lg-2 tmb-25">
                            <?php if (!empty($map_image)): ?>
                                <div class="location-img radius10 overflow-hidden">
                                    <img src="<?php echo $map_image; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="col-lg-10 pe-lg-3 ms-auto">
                                <?php if (!empty($heading)): ?>
                                    <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($description)): ?>
                                    <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-20 dmb-15">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_timing == "yes"): ?>
                                    <ul class="list-none ps-0 mb-0">
                                        <?php if (!empty($schedule)):
                                            foreach ($schedule as $schedule_item):
                                                $schedule_item_day = $schedule_item['day'];
                                                $schedule_item_time = $schedule_item['time'];
                                        ?>
                                                <li class="sans-normal font18 leading24 res-font16 text-191919 dmb-10">
                                                    <?php echo $schedule_item_day; ?>
                                                    <?php echo $schedule_item_time; ?>
                                                </li>
                                        <?php endforeach;
                                        endif; ?>
                                    </ul>
                                <?php endif; ?>
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
            <!-- left-content-section -->
            <section class="left-content-section position-relative">
                <div class="container">
                    <div class="col-lg-8 pe-lg-2 z-3">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 tmb-15 dmb-25">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <div class="sans-normal font18 leading24 res-font16 text-191919">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($button['url'])):
                            $target_2 = ($button['target'] == '_blank') ? "_blank" : ""; ?>
                            <a href="<?php echo $button['url']; ?>" target="<?php echo $target_2; ?>"
                                class="text-decoration-none btnA dmt-25 bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition tmt-25">
                                <?php echo $button['title']; ?>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="pattern-img position-absolute top-0 z-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pattern-2.svg" alt="" class="h-100">
                </div>
            </section>

        <?php elseif (get_row_layout() == "get_in_touch"):
            $heading = get_sub_field("heading");
        ?>
            <!-- get-in-touch-section -->
            <section id="getInTouchSection" class="get-in-touch-section position-relative overflow-hidden">
                <div class="container">
                    <div class="col-lg-8 mx-auto">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 text-center tmb-40 dmb-20">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
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
            <!-- left-right-hero-section -->
            <section class="left-right-hero-section overflow-hidden">
                <div class="container">
                    <div class="row flex-lg-row flex-column flex-column-reverse align-items-center">
                        <div class="col-lg-6">
                            <?php if (!empty($prefix)): ?>
                                <div
                                    class="label bg-858AB5-label sans-medium font14 leading20 space-0_42 text-1B2995 radius8 d-inline-flex align-items-center justify-content-center px-3 tmb-20">
                                    <?php echo $prefix; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($heading)): ?>
                                <div
                                    class="garamond font72 leading95 res-font30 res-leading38 res-space-0_6 space-1_44 text-1B2995 dmb-15">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-8">
                                <?php if (!empty($description)): ?>
                                    <div class="sans-normal font18 leading24 res-font16 text-191919 tmb-35 dmb-30 pe-3 pe-lg-5">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if (!empty($buttons)):
                                    foreach ($buttons as $button):
                                        $button_single = $button['link'];
                                ?>
                                        <?php if (!empty($button_single['url'])):
                                            $target_2 = ($button_single['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $button_single['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3 tmb-10">
                                                <?php echo $button_single['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-2 tmb-25">
                            <?php if (!empty($right_image)): ?>
                                <div class="left-right-hero-img radius10 overflow-hidden">
                                    <img src="<?php echo $right_image['sizes']['medium']; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "two_card_section"):
            $two_card_group = get_sub_field("two_card_group");
        ?>
            <!-- two-card-section -->
            <section class="two-card-section position-relative bg-white z-3 overflow-hidden">
                <div class="container">
                    <div class="row row8">
                        <?php if (!empty($two_card_group)):
                            foreach ($two_card_group as $one_card_group):
                                $one_card_group_image = $one_card_group["image"];
                                $one_card_group_link = $one_card_group["link"];
                        ?>
                                <div class="col-lg-6">
                                    <div class="two-cards w-100 tmb-15">
                                        <a href="<?php echo $one_card_group_link['url']; ?>"
                                            class="two-card text-decoration-none w-100 h-100 d-inline-flex">
                                            <div class="card-hover w-100 h-100 radius15 overflow-hidden position-relative">
                                                <img src="<?php echo $one_card_group_image['sizes']['fullscreen']; ?>" alt=""
                                                    class="w-100 h-100 object-cover img">
                                                <div class="two-card-layer position-absolute bottom-0 start-0 w-100 z-2">
                                                </div>
                                                <div
                                                    class="two-card-content position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-between z-3 dmb-30">
                                                    <div
                                                        class="garamond font38 leading55 res-font28 res-leading36 text-white text-capitalize">
                                                        <?php echo $one_card_group_link['title']; ?>
                                                    </div>
                                                    <div class="arrow-icon d-inline-flex">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/polygon-arrow.svg"
                                                            alt="" class="w-100 h-100 object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "banner_section"):
            $banner_image = get_sub_field("banner_image");
            $heading = get_sub_field("heading");
            $description = get_sub_field("description");
            $buttons = get_sub_field("buttons");
        ?>
            <!-- banner-section -->
            <section class="banner-section overflow-hidden">
                <div class="container">
                    <div class="banner-img radius15 overflow-hidden position-relative">
                        <?php if (!empty($banner_image)): ?>
                            <img src="<?php echo $banner_image['sizes']['medium']; ?>" alt="" class="w-100 h-100 object-cover">
                        <?php endif; ?>
                        <div
                            class="banner-data position-absolute top-0 start-0 h-100 w-100 px-3 px-lg-5 d-flex align-items-center tmb-15">
                            <div class="col-lg-5 pe-lg-4">
                                <div class="ps-lg-5 pe-lg-4 banner-content bg-white radius10 tpt-30 tpb-30 dpt-40 dpb-40">
                                    <?php if (!empty($heading)): ?>
                                        <div class="garamond font42 leading55 res-font30 res-leading38 text-1B2995 tmb-15 mb-2">
                                            <?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($description)): ?>
                                        <div class="sans-normal font16 leading24 text-191919 tmb-25 dmb-20">
                                            <?php echo $description; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($buttons)):
                                        foreach ($buttons as $button):
                                            $button_single = $button['link'];
                                    ?>
                                            <?php if (!empty($button_single['url'])):
                                                $target_2 = ($button_single['target'] == '_blank') ? "_blank" : ""; ?>
                                                <a href="<?php echo $button_single['url']; ?>" target="<?php echo $target_2; ?>"
                                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-lg-3 tmb-10">
                                                    <?php echo $button_single['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "brand_logo_slider"):
            $heading = get_Sub_field("heading");
            $logo_slider_group = get_Sub_field("logo_slider_group");
        ?>
            <!-- brand-logo-section -->
            <section class="brand-logo-section position-relative overflow-hidden">
                <?php if (!empty($heading)): ?>
                    <div class="font30 leading36 text-191919 text-center tmb-35 dmb-55">
                        <?php echo $heading; ?>
                    </div>
                <?php endif; ?>
                <div class="col-6 px-1 col-md-12 px-md-3 mx-auto">
                    <div class="brand-logo-slider">
                        <?php if (!empty($logo_slider_group)):
                            foreach ($logo_slider_group as $brand_logo):
                                $logo = $brand_logo['logo']; ?>
                                <div class="brand-logo">
                                    <div class="logo h-100 radius10 d-flex align-items-center justify-content-center">
                                        <img src="<?php echo $logo['url']; ?>" alt="">
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "history_slider_section"):
            $heading = get_Sub_field("heading");
            $history_card_group = get_Sub_field("history_card_group");
        ?>
            <!-- history-slider-section -->
            <section class="history-slider-section position-relative overflow-hidden">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between dmb-65 tmb-50">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="slick-arrows d-flex align-items-center">
                            <div class="prev-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg" alt="">
                            </div>
                            <div class="next-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-10 pe-5 pe-lg-0 pe-xl-3">
                        <div class="history-slider">
                            <?php if (!empty($history_card_group)):
                                foreach ($history_card_group as $history_card):
                                    $image = $history_card['image'];
                                    $date = $history_card['date'];
                                    $heading = $history_card['heading'];
                                    $description = $history_card['description']; ?>
                                    <div class="history-cards position-relative dpt-55">
                                        <div class="history-card">
                                            <div class="history-img radius10 overflow-hidden tmb-20 dmb-30">
                                                <img src="<?php echo $image['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                            </div>
                                            <div class="pe-4">
                                                <div class="sans-medium font16 leading24 space-0_48 text-1B2995 dmb-10"><?php echo $date; ?>
                                                </div>
                                                <div class="garamond font26 leading36 text-1B2995 dmb-15">
                                                    <?php echo $heading; ?>
                                                </div>
                                                <div class="sans-normal font14 leading20 text-191919"><?php echo $description; ?></div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "news_slider"):
            $heading = get_Sub_field("heading");
            $button = get_Sub_field("button");
            $news_post = get_Sub_field("news_post");
        ?>
            <!-- upcoming-slider-section -->
            <section class="upcoming-slider-section position-relative bg-white z-3 overflow-hidden">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between tmb-35 dmb-45">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-lg-flex d-none">
                            <?php if (!empty($button)): ?>
                                <a href="<?php echo $button['url']; ?>"
                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-11 col-lg-12 upcoming-slider">
                        <?php if ($news_post):
                            foreach ($news_post as $post):
                                setup_postdata($post);
                                $post_id = get_the_ID();
                                $post_title = get_the_title($post_id);
                                $post_excerpt = get_the_excerpt($post_id);
                                $post_permalink = get_permalink($post_id);
                                $post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
                                $categories = get_the_category($post_id);

                                if (have_rows('news_post', $post_id)) {
                                    while (have_rows('news_post', $post_id)) {
                                        the_row();
                                        $post_time = get_sub_field("post_time");
                                    }
                                }
                        ?>
                                <div class="upcoming-cards">
                                    <a href="<?php echo esc_url($post_permalink); ?>" class="upcoming-card text-decoration-none">
                                        <div class="upcoming-img radius10 position-relative overflow-hidden tmb-25 dmb-30">
                                            <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($title); ?>"
                                                class="w-100 h-100 object-cover">
                                        </div>
                                        <div class="pe-5">
                                            <div class="garamond font22 leading26 text-1B2995 text-capitalize tmb-10 dmb-15">
                                                <?php echo esc_html($post_title); ?>
                                            </div>
                                            <div class="sans-normal font14 leading20 text-191919 tmb-25 dmb-15">
                                                <?php echo esc_html($post_excerpt); ?>
                                            </div>
                                            <div class="arrow-icon d-inline-flex">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/polygon-arrow.svg"
                                                    alt="" class="w-100 h-100 object-cover">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php endforeach;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                    <div class="d-flex d-lg-none tmt-50">
                        <?php if (!empty($button)): ?>
                            <a href="<?php echo $button['url']; ?>"
                                class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                <?php echo $button['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "full_image_slider_section"):
            $full_image_slider_group = get_Sub_field("full_image_slider_group");
        ?>
            <!-- full-image-slider-section -->
            <section class="full-image-slider-section position-relative overflow-hidden">
                <div class="container px-p-0">
                    <div class="full-image-slider-data position-relative">
                        <div class="full-image-slider">
                            <?php if (!empty($full_image_slider_group)):
                                foreach ($full_image_slider_group as $image_slide):
                                    $background_type = $image_slide['background_type'];
                                    $image = $image_slide['image'];
                                    $video = $image_slide['video'];
                                    $youtube = $image_slide['youtube'];
                                    $vimeo = $image_slide['vimeo'];
                            ?>
                                    <div class="full-img h-100 radius15 overflow-hidden">
                                        <?php if (!empty($background_type) && $background_type == 'Image' && $image): ?>
                                            <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="" class="w-100 h-100 object-cover">
                                        <?php elseif (!empty($background_type) && $background_type == 'Video' && $video): ?>
                                            <!-- video -->
                                            <video autoplay loop muted class="w-100 h-100 object-cover">
                                                <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                            </video>
                                        <?php elseif (!empty($background_type) && $background_type == 'Youtube' && $youtube): ?>
                                            <!-- youtube -->
                                            <iframe class="w-100 h-100 object-cover"
                                                src="<?php echo convert_youtube_to_embed($youtube); ?>?playlist=<?php echo get_youtube_video_id($youtube) ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                allow="autoplay; fullscreen">
                                            </iframe>
                                        <?php elseif (!empty($background_type) && $background_type == 'Vimeo' && $vimeo): ?>
                                            <!-- vimeo -->
                                            <iframe class="w-100 h-100 object-cover"
                                                src="<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                allow="autoplay" allowfullscreen>
                                            </iframe>
                                        <?php endif; ?>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <div class="position-absolute bottom-0 end-0 z-3 px-3 dmb-20">
                            <div class="slick-arrows d-flex align-items-center">
                                <div
                                    class="prev-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg" alt="">
                                </div>
                                <div
                                    class="next-arrow d-flex align-items-center justify-content-center radius8 ms-2 cursor-pointer">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icon/white-polygon.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == "project_section"):
            $heading = get_Sub_field("heading");
        ?>
            <section class="project-section overflow-hidden">
                <div class="container px-p-0">
                    <div class="tmb-0 dmb-50">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font89 leading95 space-1_78 res-font40 res-leading55 res-space-0_72 text-white dmb-25 px-p-p">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="project-filter-section filter--title d-flex ps-p-p">
                            <div class="project-filter-btns position-relative d-flex handlebar--trigger">
                                <button
                                    class="category-btn project-filter-btn font14 leading26 space-0_42 text-1B2995 text-nowrap border-0 px-4 d-inline-flex align-items-center justify-content-center radius8 me-2 active"
                                    data-category="all">
                                    View all
                                </button>
                                <?php
                                $terms = get_terms([
                                    'taxonomy' => 'project_category',
                                    'hide_empty' => false,
                                ]);
                                $i = 0;
                                foreach ($terms as $term):
                                    if ($i < 3): ?>
                                        <button
                                            class="category-btn project-filter-btn font14 leading26 space-0_42 text-1B2995 text-nowrap border-0 px-4 d-inline-flex align-items-center justify-content-center radius8 me-2"
                                            data-category="<?php echo esc_attr($term->slug); ?>">
                                            <?php echo esc_html($term->name); ?>
                                        </button>
                                <?php endif;
                                    $i++;
                                endforeach; ?>

                                <?php if (count($terms) > 3): ?>
                                    <div class="filter-btns me-2 position-relative">
                                        <button
                                            class="filter-btn font14 leading26 space-0_42 text-1B2995 text-nowrap border-0 px-4 d-inline-flex align-items-center justify-content-center radius8 bg-858AB5">
                                            More Filters <span class="plus-icon transition ms-1"> + </span>
                                        </button>
                                        <div class="more-filter position-absolute z-3 dmt-10 d-none">
                                            <div class="more-filter-btn bg-white p-3 radius8 overflow-hidden category-btn">
                                                <?php
                                                $i = 0;
                                                foreach ($terms as $term):
                                                    if ($i >= 3): ?>
                                                        <label
                                                            class="form-checkbox sans-normal font14 leading24 space-0_42 text-1B2995 d-inline-flex align-items-center text-nowrap position-relative cursor-pointer dmb-10">
                                                            <input type="checkbox" name="category-filter"
                                                                class="position-absolute cursor-pointer category-checkbox"
                                                                value="<?php echo esc_attr($term->slug); ?>" />
                                                            <span class="checkmark position-absolute top-50 start-0"></span>
                                                            <?php echo esc_html($term->name); ?>
                                                        </label>
                                                <?php endif;
                                                    $i++;
                                                endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div id="projectContainer" class="project-container tmt-50 dmt-55">
                            <div id="projectCardsWrapper" class="dmb-35 px-p-p tmb-45"></div>
                        </div>
                        <div class="d-flex justify-content-center tmt-25 dmt-100">
                            <button
                                class="load-more btnA white-border-btn sans-medium font16 space-0_48 leading26 rounded-pill text-decoration-none justify-content-center align-items-center transition"
                                data-items="13">Load
                                more +</button>
                        </div>
                    </div>
                </div>
            </section>

            <script id="project-card-template" type="text/x-handlebars-template">
                {{#each posts}}
                    <div class="project-cards dmb-35 tmb-40 cursor-pointer" data-bs-toggle="modal" data-bs-target="#projectModal" data-id="{{id}}">
                        <div class="text-decoration-none project-card d-flex flex-column">
                            <div class="project-img position-relative radius10 overflow-hidden dmb-15 tmb-20">
                                <img src="{{thumbnail}}" alt="{{title}}" class="w-100">
                                <div class="position-absolute bottom-0 start-0 px-3 dmb-15">
                                    <div
                                        class="project-tag sans-medium font12 leading20 space-0_36 text-white radius5">
                                        {{#each categories}}
                                            {{name}}{{#unless @last}}, {{/unless}}
                                        {{/each}}
                                    </div>
                                </div>
                            </div>
                            <div class="sans-medium font14 leading24 space-0_42 text-white">
                                {{{title}}}
                            </div>
                        </div>
                    </div>
                {{/each}}
                <div class="modal project-modal fade" id="projectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button"
                                class="modal-btn d-inline-flex border-0 bg-transparent p-0 position-absolute z-3 top-0 end-0 dmt-15 pe-3"
                                data-bs-dismiss="modal" aria-label="Close">
                                <img src="<?php echo get_template_directory_uri() ?>/templates/icon/modal-close.svg" alt="modal-close">
                            </button>
                            <div id="carouselExampleInterval" class="carousel slide res-h-100" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    {{#each posts}}
                                        <div class="carousel-item" id={{id}}>
                                            <div class="h-100 d-flex flex-lg-row flex-column justify-content-lg-between">
                                                <div class="carousel-img col-12 col-lg-6 col-xl-8 h-100 radius10 res-radius0 overflow-hidden tmb-30">
                                                    <img src="{{thumbnail}}" class="d-block w-100 h-100 object-cover"
                                                        alt="{{title}}">
                                                </div>
                                                <div class="col-xl-4 ps-xl-5 ps-lg-5 px-p-p res-h-100">
                                                    <div class="ps-xl-2 ps-lg-0">
                                                        <div
                                                            class="project-tag sans-medium font12 leading20 space-0_36 text-white radius5 d-inline-flex tmb-10 dmb-20">
                                                            {{#each categories}}
                                                                {{name}}{{#unless @last}}, {{/unless}}
                                                            {{/each}}
                                                        </div>
                                                        <div class="garamond font36 leading55 res-font30 res-leading36 text-1B2995 tmb-15 dmb-30">
                                                            {{{title}}}
                                                        </div>
                                                        <div class="sans-normal font16 leading24 text-191919">
                                                            {{{description}}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{/each}}
                                </div>
                                <div class="position-absolute bottom-0 w-100 tpb-80">
                                    <div class="col-xl-4 col-lg-6 ps-4 ms-auto ps-xl-4 px-p-p">
                                        <div class="ps-lg-4">
                                            <div class="carousel-arrows d-flex align-items-center">
                                                <button
                                                    class="prev-arrow border-0 radius8 d-flex align-items-center justify-content-center me-2"
                                                    type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                                    <img src="<?php echo get_template_directory_uri() ?>/templates/icon/Polygon.svg" alt="Polygon">
                                                </button>
                                                <button
                                                    class="next-arrow border-0 radius8 d-flex align-items-center justify-content-center me-2"
                                                    type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                                    <img src="<?php echo get_template_directory_uri() ?>/templates/icon/Polygon.svg" alt="Polygon">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </script>

        <?php elseif (get_row_layout() == 'event_section'):
            $heading = get_sub_field('event_heading');
            $terms = get_terms('tribe_events_cat');
            $args = array(
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 12,
                'post_type' => 'tribe_events',
            );

            $the_query = new WP_Query($args);
        ?>
            <section class="event-section overflow-hidden">
                <div class="container px-p-0">
                    <div class="dmb-50">
                        <?php if (!empty($heading)): ?>
                            <div class="garamond font89 leading95 space-1_78 res-font40 res-space-0_8 res-leading50 text-1B2995 px-p-p dmb-25">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="project- filter-section filter-section filter--title text-nowrap d-flex ps-p-p">
                            <button
                                class="font14 leading26 space-0_42 event-btn text-1B2995 border-0 px-4 d-inline-flex align-items-center justify-content-center radius8 me-2 active"
                                data-category="all">
                                View all
                            </button>
                            <?php if ($terms && !is_wp_error($terms)): ?>
                                <?php foreach ($terms as $term): ?>
                                    <button
                                        class="font14 leading26 space-0_42 event-btn text-1B2995 border-0 px-4 d-inline-flex align-items-center justify-content-center radius8 me-2"
                                        data-category="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                    </button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row row8 px-p-p" id="EventCardContainer">

                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btnA border-1B2995-btn sans-medium font16 space-0_48 leading26 rounded-pill text-decoration-none transition load-more-event "
                            data-items="12">Load more +</button>
                    </div>
                </div>
            </section>

            <script id="event-card-template" type="text/x-handlebars-template">
                <div class="col-xl-4 col-lg-6 col-sm-6 col-12 upcoming-cards dmb-95 tmb-55">
                        <a href="{{link}}" class="upcoming-card text-decoration-none">
                            <div class="upcoming-img radius10 position-relative overflow-hidden dmb-30 tmb-25">
                                <img src="{{thumbnail}}" alt="{{{title}}}" class="w-100 h-100 object-cover">
                                <div class="date-label position-absolute top-0 end-0">


                                    <div class="date radius8 overflow-hidden">
                                        <div class="d-flex align-items-center">
                                            <div class="garamond font38 leading55 res-font35 res-leading38 text-white">
                                            {{date}}
                                            </div>
                                            <div class="ms-2">
                                                <div class="sans-normal font14 leading20 text-white">
                                               {{month}}                                                       </div>
                                                <div class="sans-normal font14 leading20 text-white">
                                                    {{year}}                                                      </div>
                                            </div>
                                        </div>
                                    </div>


                                    
                                </div>
                            </div>
                            <div class="pe-5 me-lg-0 me-5">
                                    <div class="garamond font22 leading26 text-1B2995 text-capitalize dmb-15">
                                        {{{title}}}
                                    </div>
                                    <div class="sans-normal font14 leading20 text-191919 dmb-15">
                                       {{description}}
                                    </div>
                                    <div class="arrow-icon d-inline-flex">
                                        <img src="<?php echo get_template_directory_uri() ?>/templates/icon/polygon-arrow.svg" alt="polygon-arrow" class="w-100 h-100 object-cover">
                                    </div>
                            </div>
                        </a>
                    </div>
            </script>


        <?php elseif (get_row_layout() == 'privacy_page'):
            $privacy_page_group = get_sub_field('privacy_page_group');

        ?>
            <section class="privacy-policy bg-1B2995 dpt-225 dpb-210 tpt-175 tpb-100">
                <div class="container">
                    <div class="row justify-co ntent-between">
                        <div class="col-xl-2 col-lg-3 tmb-65">
                            <div class="position-sticky left-inner-content p-initial">
                                <ul class="list-none ps-0 mb-0 d-flex flex-lg-column" id="privacy-links">
                                    <?php foreach ($privacy_page_group as $key => $privacy_page_single):
                                        $privacy_page_single_heading = $privacy_page_single['heading'];
                                    ?>
                                        <li class="dmb-20 tmb-0 me-lg-0 me-3">
                                            <a class="garamond font20 leading20 radius8 py-1 px-2 text-white opacity-50 d-inline-flex text-decoration-none transition"
                                                href="#privacy-<?php echo $key; ?>">
                                                <?php echo $privacy_page_single_heading ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <?php foreach ($privacy_page_group as $key => $privacy_page_single):
                                $privacy_page_single_heading = $privacy_page_single['heading'];
                                $privacy_page_single_description = $privacy_page_single['description'];

                            ?>
                                <div class="single-content dpt-95 tpt-70" id="privacy-<?php echo $key; ?>">
                                    <div class="garamond font42 leading55 res-font35 res-leading38 text-white text-capitalize dmb-20 tmb-15">
                                        <?php echo $privacy_page_single_heading; ?>
                                    </div>
                                    <div class="sans-normal font16 leading24 text-white dmb-25">
                                        <?php echo $privacy_page_single_description; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="pattern-img position-fixed">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pattern-1.svg" alt="" class="h-100">
                </div>
            </section>

        <?php elseif (get_row_layout() == "contact_us_section"):
            $prefix = get_sub_field('prefix');
            $number = get_sub_field('number');
            $email = get_sub_field('email');
            $location = get_sub_field('location');
            $social_icon_group = get_sub_field('social_icon_group');
        ?>
            <section class="contact-us-section bg-1B2995 position-relative z-3 overflow-hidden dpb-105 tpb-90">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-12">
                            <?php if (!empty($prefix)): ?>
                                <div class="label-bg sans-medium font14 space-0_42 leading24 radius8 d-inline-block py-1 px-3 text-white dmb-5 tmb-15">
                                    <?php echo $prefix; ?>
                                </div>
                            <?php endif; ?>
                            <div class="dmb-25 tmb-10">
                                <div class="tmb-10">
                                    <?php if (!empty($number)): ?>
                                        <a class="garamond font42 leading55 res-font30 res-leading38 text-white text-decoration-none" href="tel:<?php echo $number; ?>">
                                            <?php echo $number; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="tmb-10">
                                    <?php if (!empty($email)): ?>
                                        <a class="garamond font42 leading55 res-font30 res-leading38 text-white text-decoration-none" href="mailto:<?php echo $email; ?>">
                                            <?php echo $email; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($location)): ?>
                                <div class="dpb-105 tpb-40">
                                    <a href="<?php echo $location['url']; ?>" target="_blank" class="sans-normal font16 leading24 text-white text-decoration-none">
                                        <?php echo $location['title']; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($social_icon_group)): ?>
                                <div class="social-img-content d-flex dmb-55 tmb-60">
                                    <?php foreach ($social_icon_group as $social_data):
                                    ?>
                                        <a href="<?php echo $social_data['link'] ?>" target="_blank" class="social-bg radius8 d-flex justify-content-center align-items-center me-2">
                                            <div class="social-img d-flex justify-content-center align-items-center">
                                                <img class="" src="<?php echo $social_data['icon'] ?>" alt="icon">
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="ps-lg-3 col-lg-7 col-12">
                            <div class="contact-form">
                                <?php echo do_shortcode('[contact-form-7 id="fdbced9" title="Contact Form"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'location_banner_section'):
            $image = get_Sub_field('image');
            $heading = get_Sub_field('heading');
            $description = get_Sub_field('description');
            $button = get_Sub_field('button');
        ?>
            <section class="banner-location-section bg-1B2995 overflow-hidden">
                <div class="container">
                    <div class="location-img radius15 overflow-hidden position-relative">
                        <?php if (!empty($image)): ?>
                            <img class="w-100 h-100 object-cover" src="<?php echo $image['sizes']['medium'] ?>" alt="<?php echo $image['title']; ?>">
                        <?php endif; ?>
                        <div class="position-absolute top-0 start-0 h-100 px-lg-5 px-3 d-flex align-items-lg-center align-items-end tpb-15">
                            <div class="px-lg-5 px-4 banner-content bg-white radius10 dpt-40 dpb-40">
                                <?php if (!empty($heading)): ?>
                                    <div class="garamond font42 leading55 res-font30 res-leading38 text-1B2995 mb-2">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($description)): ?>
                                    <div class="sans-normal font16 leading24 text-191919 dmb-20">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($button)): ?>
                                    <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] == '_blank' ? '_blank' : '' ?>" class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition me-3">
                                        <?php echo $button['title'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'help_card_section'):
            $heading = get_sub_field('heading');
            $help_card_group = get_sub_field('help_card_group');
        ?>
            <section class="help-card-section position-relative z-3 bg-white dpt-75 tpt-60 overflow-hidden">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="d-flex justify-content-center align-items-center garamond font57 leading55 res-font30 res-leading38 text-1B2995 dmb-45 tmb-30">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($help_card_group)): ?>
                        <div class="row row8">
                            <?php foreach ($help_card_group as $help_card_data):
                                $image = $help_card_data['image'];
                                $heading = $help_card_data['heading'];
                                $link = $help_card_data['link'];
                            ?>
                                <div class="col-xl-4 col-lg-4 col-sm-6 col-12 help-card position-relative tmb-15">
                                    <div class="radius15 h-100 overflow-hidden">
                                        <img class="w-100 h-100 object-cover" src="<?php echo $image['sizes']['medium'] ?>" alt="<?php echo $image['title'] ?>">
                                        <div class="position-absolute start-0 bottom-0 w-100">
                                            <div class="d-flex justify-content-between ms-4 me-4 mb-4">
                                                <?php if (!empty($heading)): ?>
                                                    <div class="garamond font38 leading36 res-font28 res-leading38 text-white text-capitalize">
                                                        <?php echo $heading; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="arrow-icon d-inline-flex">
                                                    <img src="<?php echo get_template_directory_uri() ?>/templates/icon/polygon-arrow.svg" alt="polygon-arrow" class="w-100 h-100 object-cover">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php elseif (get_row_layout() == "spacing"):
            $background_color = get_sub_field("background_color");
            $desktop = get_sub_field("desktop");
            $tablet = get_sub_field("tablet");
            $mobile = get_sub_field("mobile");
            $curved = get_sub_field("curved");
            $desktop_mb = $desktop["margin_bottom"];
            $desktop_mb_main = !empty($desktop["margin_bottom"]) ? " dpb-" : "";
            $tablet_mb = $tablet["margin_bottom"];
            $tablet_mb_main = !empty($tablet["margin_bottom"]) ? " tpb-" : "";
            $mobile_mb = $mobile["margin_bottom"];
            $mobile_mb_main = !empty($mobile["margin_bottom"]) ? " mpb-" : "";
        ?>

            <div
                class="spacing<?php
                                echo $desktop_mb_main;
                                echo $desktop_mb;
                                echo $tablet_mb_main;
                                echo $tablet_mb;
                                echo $mobile_mb_main;
                                echo $mobile_mb;
                                ?> <?php echo $background_color == 'Blue' ? 'bg-1B2995' : 'bg-white' ?> <?php echo $curved == 'Yes' ? 'top-curverd' : '' ?>">
            </div>
        <?php endif; ?>
<?php
    endwhile;
endif; ?>
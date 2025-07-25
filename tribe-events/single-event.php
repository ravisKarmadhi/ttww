<?php
$event_id = get_the_ID();
$cost = tribe_get_cost($event_id);
$address = tribe_get_address($event_id);

$start_date = tribe_get_start_date($event_id, false, 'Y-m-d H:i:s');
$current_date = current_time('Y-m-d H:i:s');

$day_with_suffix = tribe_get_start_date($event_id, false, 'jS');
$month = tribe_get_start_date($event_id, false, 'F');
$month_upper = strtoupper($month);
$is_upcoming = strtotime($start_date) > strtotime($current_date);

$top_event_content = get_field("top_event_content");
$event_data = get_field("event_data");


 $categories = get_the_terms($event_id, 'tribe_events_cat');
 
?>

<div class="spacing dpb-200 tpb-190"></div>

<!-- single-event-section -->
<section class="single-event-section">
    <div class="container">
        <div class="row justify-content-xl-start justify-content-lg-between jusrti">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-12 tmb-50">
                <div class="single-event-links position-sticky top-0 d-flex flex-column justify-content-between">
                    <a href="/events" class="sans-medium font16 leading26 text-191919 text-capitalize">
                        Back To All
                    </a>
                    <div>
                        <div class="d-lg-block d-none sans-medium font16 leading26 text-191919 text-capitalize">
                            <?php echo do_shortcode('[ssba]'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-9 col-sm-12 col-12">
                <div class="pe-lg-5">
                    <?php if(!empty($categories)): foreach($categories as $category): ?>
                    <div class="label bg-858AB5-label sans-medium font14 leading20 space-0_42 res-leading26 text-1B2995 radius8 d-inline-flex align-items-center justify-content-center px-3 dmb-25 tmb-10">
                        <?php echo $category->name ?>
                    </div>
                    <?php endforeach; endif; ?>
                    <div class="garamond font52 leading67 text-1B2995 res-font35 res-leading55 text-capitalize dmb-10">
                        <?php echo get_the_title(); ?>
                    </div>
                    <div class="sans-normal font22 leading26 res-font18 res-leading26 text-191919 dmb-20 pe-2">
                        <?php echo get_the_content(); ?>
                    </div>
                    <div class="sans-normal font16 leading24 text-191919 dmb-45 tmb-35">
                        <?php echo $top_event_content; ?>
                    </div>
                </div>
                <?php if (!empty(get_the_post_thumbnail_url())): ?>
                    <div class="single-img radius10 overflow-hidden dmb-45">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100 object-cover">
                    </div>
                <?php endif; ?>
                <div class="single-list list-none ps-0 dmb-40">
                    <?php echo $event_data; ?>
                </div>
          

                <a href="#tribe-tickets"
                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                    Book your slot
                </a>
 
            </div>
        </div>
    </div>
</section>

<div class="dpt-240 tpt-90"></div>

            <section class="upcoming-slider-section position-relative overflow-hidden bg-white z-3">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between tmb-35 dmb-45">
                        <div class="col-lg-6 pe-lg-5">
                         
                                <div class="garamond font57 leading67 res-font30 res-leading38 text-1B2995 dmb-15">
                                  What’s coming up?
                                </div>
                        
                    
                        </div>
                        <div class="d-lg-flex d-none">
                          
                                <a href="/events"
                                    class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                                   View All
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

            <div class="dpt-110"></div>

<?php get_template_part('templates/page-builder'); ?>


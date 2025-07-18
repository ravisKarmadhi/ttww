
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

?>

 <div class="spacing dpb-200"></div>

        <!-- single-event-section -->
        <section class="single-event-section">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div
                            class="single-event-links position-sticky top-0 d-flex flex-column justify-content-between">
                            <a href="/events" class="sans-medium font16 leading26 text-191919 text-capitalize">
                                Back To All
                            </a>
                            <div>
                                <div class="sans-medium font16 leading26 text-191919 text-capitalize">
                                    <?php echo do_shortcode('[ssba]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="pe-5">
                            <div
                                class="label bg-858AB5-label sans-medium font14 leading20 space-0_42 text-1B2995 radius8 d-inline-flex align-items-center justify-content-center px-3 dmb-25">
                                Filter One
                            </div>
                            <div class="garamond font52 leading67 text-1B2995 text-capitalize dmb-10">
                                <?php echo get_the_title(); ?>
                            </div>
                            <div class="sans-normal font22 leading26 text-191919 dmb-20 pe-2">
                               <?php echo get_the_content(); ?>
                            </div>
                            <div class="sans-normal font16 leading24 text-191919 dmb-45">
                               
                            </div>
                        </div>
                        <?php if(!empty(get_the_post_thumbnail_url())): ?>
                            <div class="single-img radius10 overflow-hidden dmb-45">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100 object-cover">
                            </div>
                        <?php endif; ?>
                        <div class="single-list list-none ps-0 dmb-40">
                           
                        </div>
                        <a href=""
                            class="text-decoration-none btnA bg-1B2995-btn sans-medium font16 leading26 space-0_48 d-inline-flex align-items-center justify-content-center rounded-pill transition">
                            Book you slot
                        </a>
                    </div>
                </div>
            </div>
        </section>

<?php get_template_part('templates/page-builder'); ?>

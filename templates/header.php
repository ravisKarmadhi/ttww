<?php
$header_logo = get_field('header_logo', 'option');
$top_header_link_group = get_field('top_header_link_group', 'option');
$menu_link_group = get_field('menu_link_group', 'option');
$header_button = get_field('header_button', 'option');

$schedule = get_field('schedule', 'option');

?>

<!-- <header class="header position-fixed top-0 transition w-100">
    <div class="header-top bg-white py-2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4 d-flex">
                    <div class="clock-img d-flex justify-content-center align-items-center me-2">
                        <img class="" src="<?php echo get_template_directory_uri(); ?>/templates/icon/blue-clock.svg"
                            alt="">
                    </div>
                    <?php if (!empty($schedule)): ?>
                        <?php foreach ($schedule as $schedule_open):
                            $schedule_open_day = $schedule_open['day'];
                            $schedule_open_time = $schedule_open['time'];
                            $schedule_open_last_entry = $schedule_open['last_entry'];
                            $currnt_day = date("l");
                            if ($schedule_open_time != 'Closed') {
                                $schedule_open_status = 'Open';
                                $schedule_entry = 'd-block';

                            } else {
                                $schedule_open_status = '';
                                $schedule_entry = 'd-none';

                            }
                            if ($currnt_day == $schedule_open_day) {
                                $cotent_visinle = 'd-flex';
                            } else {
                                $cotent_visinle = 'd-none';
                            }
                            ?>

                            <div class=" <?php echo $cotent_visinle; ?>">
                                <div class="bg-1B2995-label sans font12 leading20 px-2 text-1B2995 radius5 me-2">

                                    <?php echo $schedule_open_status; ?>         <?php echo $schedule_open_time; ?>
                                </div>
                                <div class="sans-italic font12 leading20 text-1B2995 <?php echo $schedule_entry; ?>">
                                    (Last entry at <?php echo $schedule_open_last_entry; ?>*)
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="col-5">
                    <ul class="list-none d-flex justify-content-end ps-0 mb-0">
                        <?php if (!empty($top_header_link_group)): ?>
                            <?php foreach ($top_header_link_group as $single_top_links):
                                $single_top_link = $single_top_links['link'];
                                ?>
                                <?php if (!empty($single_top_link['url'])):
                                    $target_2 = ($single_top_link['target'] == '_blank') ? "_blank" : ""; ?>
                                    <li class="me-4">
                                        <a class="sans font12 leading20 text-1B2995 text-decoration-none"
                                            target="<?php echo $target_2; ?>"
                                            href="<?php echo $single_top_link['url']; ?>"><?php echo $single_top_link['title']; ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main bg-1B2995">
        <div class="position-relative">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="white-logo d-flex align-items-center">
                        <?php if (!empty($header_logo)): ?>
                            <a href="<?php echo get_home_url(); ?>">
                                <img class="w-100" src="<?php echo $header_logo; ?>" alt="white-logo">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-10 d-flex justify-content-end align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <nav class="navigation d-flex justify-content-between align-items-center">
                                <ul class="ps-0 mb-0 list-none d-flex">
                                    <?php foreach ($menu_link_group as $menu_link_group_single):
                                        $menu_link_group_menu_selection = $menu_link_group_single['menu_selection'];
                                        $menu_link_group_link = $menu_link_group_single['link'];
                                        $menu_link_group_mega_menu = $menu_link_group_single['mega_menu'];

                                        ?>

                                        <?php if ($menu_link_group_menu_selection == 'menu'): ?>
                                            <div class="position-relative cursor-pointer dpt-30 dpb-30 pe-4">
                                                <li class="mega-link">
                                                    <a class="menu-link sans-medium px-3 py-2 font16 radius5 space-0_16 leading20 text-white text-capitalize text-decoration-none transition"
                                                        href="<?php echo $menu_link_group_link['url']; ?>"><?php echo $menu_link_group_link['title']; ?>
                                                    </a>
                                                    <div
                                                        class="mega-menu opacity-0 position-absolute radius10 px-4 dpt-20 dpb-10 bg-white start-0 transition">
                                                        <ul class="list-none ps-0 mb-0 w-100">
                                                            <?php foreach ($menu_link_group_mega_menu as $menu_link_group_mega):
                                                                $mega_menu_link = $menu_link_group_mega['mega_menu_link'];
                                                                ?>
                                                                <li class="dmb-20">
                                                                    <a class="garamond font20 leading24 text-1B2995 d-inline-flex align-items-center text-capitalize text-decoration-none transition"
                                                                        href="    <?php echo $mega_menu_link['url']; ?>">
                                                                        <?php echo $mega_menu_link['title']; ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($menu_link_group_menu_selection == 'link'): ?>
                                            <div class="position-relative cursor-pointer dpt-30 dpb-30 pe-4">
                                                <li class="mega-link">
                                                    <a class="menu-link sans-medium px-3 py-2 font16 radius5 space-0_16 leading20 text-white text-capitalize text-decoration-none transition"
                                                        href="<?php echo $menu_link_group_link['url']; ?>"><?php echo $menu_link_group_link['title']; ?>
                                                    </a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>


                                </ul>
                            </nav>
                        </div>

                        <div class="ms-5 d-flex justify-content-end align-items-center">
                            <a class="btnA white-border-btn sans-medium font16 space-0_48 leading26 rounded-pill text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                href="<<?php echo $header_button['url']; ?>">
                                <?php echo $header_button['title']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> -->
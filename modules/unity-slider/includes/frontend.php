<?php if ($items = $module->get_slider_items($settings)) : ?>
    <?php
        $test = $settings->slider_responsive_responsive;
        $test_2 = $settings->slider_responsive_medium;
        $test_3 = $settings->slider_responsive;
        var_dump($test);
        var_dump($test_2);
        var_dump($test_3);
    ?>
    <div class="unity-slider" data-slide-count-lg="" data-slide-count-md="" data-slide-count-sm="">
        <?php foreach ($items as $item) : ?>
            <div class="unity-slider__slide">
                <?php if (!empty($item->slider_item_image)) : ?>
                    <figure class="unity-slider__slide-image-wrap">
                        <?php echo wp_get_attachment_image($item->slider_item_image); ?>
                    </figure>
                <?php endif; ?>
                <?php if (!empty($item->slider_item_title)) : ?>
                    <div class="unity-slider__slide-text-wrap">
                        <span><?php echo $item->slider_item_title; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

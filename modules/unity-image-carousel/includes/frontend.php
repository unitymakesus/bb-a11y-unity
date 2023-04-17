<?php if ($images = $settings->image_carousel_images) : ?>
    <div class="unity-image-carousel">
        <?php foreach ($images as $image) : ?>
            <div class="unity-image-carousel__slide">
                <figure class="unity-image-carousel__slide-image-wrap">
                    <?php echo wp_get_attachment_image($image, $setting->image_carousel_image_size); ?>
                </figure>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

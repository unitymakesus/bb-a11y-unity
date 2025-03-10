<?php

$namespace = uniqid();
$i = 1;

?>

<?php if ($settings->lightbox_images) : ?>
    <div class="unity-lightbox-gallery">
        <?php foreach ($settings->lightbox_images as $image) : ?>
            <div class="unity-lightbox-gallery-item">
                <a
                    class="unity-lightbox-gallery-item__link"
                    href="<?php echo wp_get_attachment_image_src($image, 'large')[0]; ?>"
                    data-group="lightbox-gallery-<?php echo esc_attr($namespace); ?>" data-modaal-desc="<?php echo esc_attr(get_post_meta($image, '_wp_attachment_image_alt', true)); ?>"
                >
                    <?php echo wp_get_attachment_image($image, 'medium', '', ['class' => 'unity-lightbox-gallery-item__image']); ?>
                </a>

                <?php
                /**
                 * The caption will be inserted into lightbox caption via JS.
                 */
                ?>
                <?php if ($caption = wp_get_attachment_caption($image)) : ?>
                    <div class="unity-lightbox-gallery-item__caption" data-index="<?php echo ($i - 1); ?>" style="display:none;">
                        <div class="unity-lightbox-gallery-item__caption-wrapper">
                            <p><?php echo $caption; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php $i++; endforeach; ?>
    </div>
<?php endif; ?>

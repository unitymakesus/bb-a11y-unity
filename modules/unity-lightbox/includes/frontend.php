<?php if (!empty($settings->lightbox_button_text)) : ?>
    <div class="unity-lightbox">
        <div class="unity-lightbox__button-wrapper">
            <a role="button" href="#lightbox-<?php echo $id; ?>" class="unity-lightbox__button">
                <?php echo $settings->lightbox_button_text; ?>
                <?php if (!empty($settings->lightbox_button_icon)) : ?>
                    <i class="fl-button-icon fl-button-icon-before <?php echo $settings->button_icon; ?>" aria-hidden="true"></i>
                <?php endif; ?>
            </a>
        </div>
        <?php if (!empty($settings->lightbox_content)) : ?>
            <div id="lightbox-<?php echo $id; ?>" style="display:none;">
                <?php echo $settings->lightbox_content; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

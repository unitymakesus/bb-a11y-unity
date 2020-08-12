<?php if ($settings->cta_link) : ?>
    <div class="text-<?php echo $settings->align; ?>">
        <a href="<?php echo esc_url($settings->cta_link); ?>" class="fl-button btn btn--a11y-jump"><?php echo $settings->cta_text; ?></a>
    </div>
<?php endif; ?>

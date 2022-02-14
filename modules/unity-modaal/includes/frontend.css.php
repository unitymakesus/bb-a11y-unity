<?php

FLBuilderCSS::responsive_rule([
    'settings'     => $settings,
    'setting_name' => 'button_align',
    'selector'     => '.unity-modaal__button-wrapper',
    'prop'         => 'text-align',
]);

?>

<?php if (!empty($settings->button_background_color)) : ?>
    .unity-modaal__button {
        background: <?php echo FLBuilderColor::hex_or_rgb($settings->button_background_color); ?>;
    }
<?php endif; ?>

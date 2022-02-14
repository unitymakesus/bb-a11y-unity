<?php

FLBuilderCSS::responsive_rule([
    'settings'     => $settings,
    'setting_name' => 'align',
    'selector'     => '.unity-numbers',
    'prop'         => 'text-align',
]);

?>

.unity-numbers__count {
    font-size: <?php echo $settings->font_size . $settings-> font_size_unit; ?>;
}

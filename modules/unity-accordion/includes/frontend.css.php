<?php if (!empty($settings->accent_color)) : ?>
    <?php $rgb = $module->processHexToRgb($settings->accent_color); ?>
    .fl-node-<?php echo $id; ?> .unity-accordion {
        --red: <?php echo $rgb->red(); ?>;
        --green: <?php echo $rgb->green(); ?>;
        --blue: <?php echo $rgb->blue(); ?>;
        --accessible-color: calc(((((var(--red) * 299) + (var(--green) * 587) + (var(--blue) * 114)) / 1000) - 128) * -1000);
    }

    .fl-node-<?php echo $id; ?> .unity-accordion__trigger {
        border-color: rgb(var(--red), var(--green), var(--blue));
    }

    .fl-node-<?php echo $id; ?> .unity-accordion__trigger[aria-expanded="true"] {
        background-color: rgb(var(--red), var(--green), var(--blue)) !important;
        color: rgb(var(--accessible-color), var(--accessible-color), var(--accessible-color)) !important;
    }
<?php endif; ?>

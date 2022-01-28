<?php if (!empty($settings->panels)) : ?>
    <div class="unity-accordion" data-allow-toggle>
        <?php $i = 0; foreach ($settings->panels as $panel) : ?>
            <?php if (!empty($panel->title)) : ?>
                <?php $attrs = $module->get_trigger_attributes($i); ?>
                <h3>
                    <button class="unity-accordion__trigger" id="<?php echo esc_attr($attrs['id']); ?>" aria-expanded="<?php echo esc_attr($attrs['expanded']); ?>" aria-controls="<?php echo esc_attr($attrs['controls']); ?>">
                        <?php echo $panel->title; ?>
                    </button>
                </h3>
            <?php endif; ?>
            <?php if (!empty($panel->content)) : ?>
                <?php $attrs = $module->get_panel_attributes($i); ?>
                <div role="region" class="unity-accordion__panel" id="<?php echo esc_attr($attrs['id']); ?>" aria-labelledby="<?php echo esc_attr($attrs['labelledby']); ?>" <?php echo $attrs['hidden']; ?>>
                    <div><?php echo $panel->content; ?></div>
                </div>
            <?php endif; ?>
        <?php $i++; endforeach; ?>
    </div>
<?php endif; ?>

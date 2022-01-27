<?php if (!empty($settings->tabs)) : ?>
    <div class="unity-tabs unity-tabs--<?php echo esc_attr($settings->aria_orientation); ?>">
        <div role="tablist" aria-label="<?php echo esc_attr($settings->aria_label); ?>" aria-orientation="<?php echo esc_attr($settings->aria_orientation); ?>">
            <?php $tablist_id = uniqid(); ?>
            <?php $i = 0; foreach ($settings->tabs as $tab) : ?>
                <?php
                    $selected = $i === 0 ? 'true' : 'false';
                    $id = "{$tablist_id}-tab-{$i}";
                    $controls = "{$tablist_id}-panel-{$i}";
                    $tabindex = $i > 0 ? 'tabindex=-1' : '';
                ?>
                <button class="unity-tabs__tab" role="tab" id="<?php echo esc_attr($id); ?>" aria-selected="<?php echo esc_attr($selected); ?>" aria-controls="<?php echo esc_attr($controls); ?>" <?php echo esc_attr($tabindex); ?>>
                    <?php echo $tab->title; ?>
                </button>
            <?php $i++; endforeach; ?>
        </div>
        <?php $i = 0; foreach ($settings->tabs as $tabpanel) : ?>
            <?php
                $id = "{$tablist_id}-panel-{$i}";
                $labelledby = "{$tablist_id}-tab-{$i}";
                $hidden = $i > 0 ? 'hidden' : '';
            ?>
            <div class="unity-tabs__tabpanel" role="tabpanel" id="<?php echo esc_attr($id); ?>" aria-labelledby="<?php echo esc_attr($labelledby); ?>" tabindex="0" <?php echo $hidden; ?>>
                <?php echo $tabpanel->content; ?>
            </div>
        <?php $i++; endforeach; ?>
    </div>
<?php endif; ?>

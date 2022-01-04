<?php if (!empty($settings->numbers)) : ?>
    <div class="unity-numbers">
        <ul>
            <?php foreach ($settings->numbers as $number) : ?>
                <li>
                    <span class="unity-numbers__count" aria-label="<?php echo $number->aria_label; ?>"><?php echo $number->number; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

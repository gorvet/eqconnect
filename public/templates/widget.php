<?php

defined( 'ABSPATH' ) || exit;
?>
<div class="qcsupport_button">
    <input id="qcCheckbox" type="checkbox" class="qc-checkbox" />
    <label class="qc" for="qcCheckbox">
        <i class="gicon-soporte"></i>
    </label>

    <div class="qc-wheel">
        <?php foreach ( $actions as $index => $action ) : ?>
            <a class="qc-action qc-action-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>" href="<?php echo $action['url']; // Escaped with esc_url() before rendering. ?>" target="_blank" rel="noopener">
                <i class="gicon-<?php echo esc_attr( $action['icon'] ); ?>"></i>
            </a>
        <?php endforeach; ?>
    </div>
</div>

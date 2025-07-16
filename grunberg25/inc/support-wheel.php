<?php
function support_wheel()
{
    ob_start();

?>
    <div id="support-wheel-wrapper">
        <div id="wheel-container">
            <div id="rotating-container">
                <img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/Support-Wheel.svg" id="wheel-image" alt="Support Wheel" />
                <div id="wheel-overlay">
                    <?php for ($i = 0; $i < 11; $i++): ?>
                        <div class="segment" data-index="<?php echo $i; ?>" style="transform: rotate(<?php echo ($i * 32.727); ?>deg) translateY(-50%);"></div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div id="wheel-text">
            <p id="wheel-description" class="white">Full study support to Apprenticeship programme for new trainees or those part way through their studies</p>
        </div>
    </div>
    <script src="<?php bloginfo('template_directory'); ?>/js/support-wheel.js"></script>
<?php

    return ob_get_clean();
}
?>
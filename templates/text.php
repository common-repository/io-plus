<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


$list_labels = array(
    'fever' => __('Fever', 'io-plus'),
    'family_positive' => __('F. Positive', 'io-plus'),
    'visitor' => __('Visitor', 'io-plus'),
    'normal' => __('Normal', 'io-plus'),
    'MinutesAgo' => __('Minutes Ago', 'io-plus'),
    'Hourago' => __('Hour Ago', 'io-plus'),
    'HoursAgo' => __('Hours Ago', 'io-plus'),
    'Today' => __('Today', 'io-plus'),
    'Yesterday' => __('Yesterday', 'io-plus'),
    'DaysAgo' => __('Days Ago', 'io-plus'),
    '1MonthAgo' => __('1 Month Ago', 'io-plus'),
    'MonthsAgo' => __('Months Ago', 'io-plus'),
    '1YearAgo' => __('1 Year Ago', 'io-plus'),
    'YearsAgo' => __('Years Ago', 'io-plus'),
);

?>


<div class="io-plus-text" style="display: none;">
    <?php
    foreach ($list_labels as $class => $label) {
        ?>
        <div class="<?php echo esc_html($class); ?>">
            <?php echo esc_html($label); ?>
        </div>
        <?php
    }
    ?>
</div>

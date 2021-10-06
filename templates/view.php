<?php
foreach($forms as $form) {
    $message = htmlspecialchars($form['submission_message']);

    //convert the priority and status.
    $priority = [PRIORITY_DEFAULT => 'Default', PRIORITY_SAME_DAY => 'Same Day', PRIORITY_MORNING_REPLY => 'Morning Reply'][$form['submission_priority']];
    $status = [
        STATUS_DEFAULT => 'Default',
        STATUS_SPAM => 'Spam',
        STATUS_POSSBILE_SPAM => 'Possible Spam',
        STATUS_POSSIBLE_TEXT_SPAM => 'Possible text spam'
    ][$form['submission_status']];

    echo <<<FORM
    <div class="row">
        <div class="row-left">
            <span>ID: {$form['submission_id']}</span>
            <span>IP: {$form['submission_ip']}</span>
            <span>Priority: {$priority}</span>
            <span>Status: {$status}</span>
            <span>Time: {$form['submission_timestamp']}</span>
        </div>
        <div class="row-right">
            <span>{$form['submission_name']}</span>
            <span>{$form['submission_email']}</span>
            <div>{$message}</div>
            <span>{$form['submission_browser']}</span>
        </div>
        <div style="clear:both"></div>
    </div>
    FORM;
}
?>

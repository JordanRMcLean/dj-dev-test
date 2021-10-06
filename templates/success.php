<div id="success">
    <h3>Your form has been submitted!</h3>
    <p>We aim to get back to you
    <?php
        $p = $submission['priority'];
        switch($p) {
            case PRIORITY_SAME_DAY:
                echo 'the same day';
                break;

            case PRIORITY_MORNING_REPLY:
                echo 'in the morning';
                break;

            default:
                echo 'when our offices are open';
        }
    ?>. A copy of your submission is below: </p>
    <div id="submission-copy">
    <?php
        foreach($contact_form as $key => $elem) {
            echo '<div><h4>' . $elem['label'] . '</h4>' . htmlspecialchars($elem['value']) . '</div>';
        }
    ?>
    </div>
</div>

<form method="POST" id="contact-form">
    <div id="form-error"><?= $form_error_msg ?></div>
    <div id="form-left">
        <?php
        foreach($contact_form as $key => $elem) {
            echo "<span class=\"form-element\"><label for=\"$key\">{$elem['label']}</label>";
            if($elem['type'] === 'textbox') {
                echo <<<FORM
                <textarea placeholder="{$elem['placeholder']}" length="50" name="$key" id="{$elem['id']}">{$elem['value']}</textarea>
                FORM;
            }
            else {
                echo <<<FORM
                <input type="{$elem['type']}" name="$key" length="50" placeholder="{$elem['placeholder']}" id="{$elem['id']}" value="{$elem['value']}" />
                FORM;
            }
            echo '</span>';
        }
        ?>
    </div>
    <div id="form-right">
        <!-- recaptcha -->
        <div class="g-recaptcha" data-sitekey="<?= RC_SITE_KEY ?>"></div>
        <input type="submit" name="submit" value="Send" />
    </div>
</form>

<?php

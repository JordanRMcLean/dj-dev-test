<form method="POST" id="contact-form">
    <div id="form-error"><?= $form_error_msg ?></div>
    <div id="form-left">
        <?php
        foreach($contact_form as $key => $elem) {
            echo "<span class=\"form-element\"><label for=\"$key\">{$elem['label']}</label>";
            if($elem['type'] === 'textbox') {
                echo <<<FORM
                <textarea onblur="validate_form(event, '$key')" maxlength="300" placeholder="{$elem['placeholder']}" length="50" name="$key" id="input-$key">{$elem['value']}</textarea>
                FORM;
            }
            else {
                echo <<<FORM
                <input onblur="validate_form(event, '$key')" type="{$elem['type']}" name="$key" length="50" placeholder="{$elem['placeholder']}" id="input-$key" value="{$elem['value']}" />
                FORM;
            }
            echo '<span class="error" id="error-'. $key . '"></span></span>';
        }
        ?>
    </div>
    <div id="form-right">
        <!-- recaptcha -->
        <div class="g-recaptcha" data-sitekey="<?= RC_SITE_KEY ?>"></div>
        <input type="submit" name="submit" value="Send" onclick="validate_form(event, 'all')" />
    </div>
</form>

<?php

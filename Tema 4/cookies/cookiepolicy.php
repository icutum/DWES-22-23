<?php if (empty($_COOKIE["policy"])) : ?>
    <form action="" method="post" class="cookie-form">
        <div class="cookie-form__message">
            <p>Pues mira crack o aceptas o aceptas&copy;</p>
        </div>
        <div class="cookie-form__buttons">
            <input type="submit" name="accept" value="Aceptar" class="cookie-form__button">
            <a href="#" class="cookie-form__button">Denegar</a>
        </div>
    </form>
<?php endif; ?>
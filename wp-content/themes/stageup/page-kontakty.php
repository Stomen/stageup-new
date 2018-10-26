<?php get_header(); ?>
<main>
    <div class="title-block">
        <div class="center">
            <span>Контакты</span>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
        </div>
    </div>
    <div class="contacts-block">
        <div class="center">
            <div class="contact-items">
                <div class="address-item">
                    <div class="info">
                        <span>Наш адрес:</span>
                        <a target="_blank" href="https://www.google.com.ua/maps/place/%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%8F+%D0%94%D0%B0%D1%80%D0%B2%D1%96%D0%BD%D0%B0,+4,+24,+%D0%A5%D0%B0%D1%80%D0%BA%D1%96%D0%B2,+%D0%A5%D0%B0%D1%80%D0%BA%D1%96%D0%B2%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+61000/@49.9984015,36.2394602,17z/data=!3m1!4b1!4m5!3m4!1s0x4127a0e8ee627cbb:0xb14b0e32fc5a94a6!8m2!3d49.9984015!4d36.2416489">г. Харьков, ул. Дарвина 4, офис 24</a>
                        <a href="tel:+380577556336">тел. +38 057 755 63 36</a>
                        <a href="tel:+380504466336">тел. +38 050 446 63 36</a>
                            <a target="_blank" href="mailto:info@stageup.com.ua">E-mail: info@stageup.com.ua</a>
                        <span>Время работы:</span>
                        <span>Пн-Пт: с 9.00 до 18.00</span>
                        <span>Сб: по предварительной договоренности</span>
                        <span>Мы в соцсетях: <a href="https://vk.com/stageup_ua" target="_blank">Вконтакте</a> / <a href="https://www.facebook.com/StageupUA/" target="_blank">Facebook</a></span>
                    </div>
                    <div id="map"></div>
                    <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button" data-show-faces="true" data-action="like" data-size="small" data-share="true"></div>
                    <div class="clear"></div>
                    </div>
                <div class="contact-form">
                    <span>Пожалуйста, воспользуйтесь формой ниже, чтобы написать нам:</span>
                    <form action="">
                        <input id="name"  type="text" placeholder="Имя">
                        <input id="email"  type="email" placeholder="Email">
                        <input id="phone"  type="tel" placeholder="Телефон">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
                        <input id="submit" type="submit" value="Отправить" onclick="return false">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="social-network-block">
        <div class="center">
            <span>МЫ В СОЦСЕТЯХ:</span>
            <div class="social-block">
                <!--<div class="vk-block">
                    <div id="vk_groups"></div>
                </div>-->
                <div class="facebook-block">
                    <div class="fb-page" data-href="https://www.facebook.com/StageupUA/" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/StageupUA/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/StageupUA/">Stage Up</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>

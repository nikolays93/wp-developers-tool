<?php
namespace DTools;

function get_dtools_form($section){
  $args = array();

  $args['dp-general'] = array(
    array(
      'id'        => 'orign-image-resize',
      'label'     => 'Сжимать оригиналы изображений',
      'type'      => 'select',
      'options'      => array(
        ''        => 'Не сжимать',
        'default' => 'Сжимать стандартно (1600х1024)',
        'large'   => 'Сжимать до "Крупного" размера',
        ),
      ),
    array(
      'id'        => 'remove-images',
      'label'     => 'Удалять прикрепленные изображения в след за записью',
      'type'      => 'select',
      'options'      => array(
        ''        => 'Не удалять',
        'all'     => 'Удалять все',
        'post'    => 'Только для записей',
        'page'    => 'Только для страниц',
        'product' => 'Только для товаров',
        ),
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'second-title',
      'label'     => 'Включить дополнительные заголовки',
      'desc'      => 'Изменяет заголовок на детальной странице записи, если указан второй заголовок. Укажите "false" если совсем не хотите выводить заголовок детальной страницы.',
      ),
    array(
      'type'      => 'textarea',
      'id'        => 'maintenance-mode',
      'label'     => 'Включить техническое обслуживание',
      'placeholder'   => "Сайт находится на техническом обслуживании.\nПожалуйста, зайдите позже.",
      'desc'      => 'Техническое обслуживание времено закроет доступ к сайту (кроме пользователей с привелегией "edit_themes") с указанным сообщением.',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'remove-emojis',
      'label'     => 'Отключить wp_emoji',
      'desc'      => '',
      ),
    );
  $args['dt-scripts'] = array(
    array(
      'id'        => 'sticky',
      'label'     => 'Использовать липкий контейнер',
      'type'      => 'select',
      'options'      => array(
        ''=>'Не использовать',
        'forever'=>'Использовать всегда',
        'phone_only'=>'Только для телефона',
        ),
      'desc'      => 'При прокрутке вниз, контейнер прилипает к верхней части экрана',
      ),
    array(
      'type'      => 'text',
      'id'        => 'sticky_selector',
      'label'     => 'Селектор липкого контейнера',
      'placeholder' =>  '.navbar-default',
      'desc'      => 'Введите jQuery сселектор (.ExampleClass или #ExampleID)',
      'default' =>  '.navbar-static-top',
      ),
    array(
      'type'      => 'number',
      'id'        => 'smooth_scroll',
      'label'     => 'Плаваня прокрутка',
      'desc'      => 'Плавно пролистает за указанное количество пикселей до начала объекта, если ссылка начинается с # (Укажите высоту отступа до объекта)[href=#obj]',
      'placeholder'   => '40',
      ),
    array(
      'type'      => 'number',
      'id'        => 'scroll_after_load',
      'label'     => 'Прокрутка после загрузки страницы',
      'desc'      => 'Плавно пролистает за указанное количество пикселей до начала объекта, если адрес заканчивается на ID объекта [http://#obj]',
      'placeholder'   => '40',
      ),
    array(
      'type'      => 'text',
      'id'        => 'back_top',
      'label'     => 'Содержимое кнопки "Наверх"',
      'desc'      => 'Задайте кнопке #back-top собственный стиль',
      'placeholder'   => '<i class="fa fa-angle-up" aria-hidden="true"></i>',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'font_awesome',
      'label'     => 'FontAwesome шрифт',
        //'desc'      => 'Подключить шрифтовые иконки <a href="http://fontawesome.io/get-started/">FontAwesome</a>',
      ),
    array(
        'type'      => 'checkbox', // тип
        'id'        => 'animate',
        'label'     => 'Подключить анимацию.css',
        'desc'      => 'Подключает всем известный файл animate.css',
        ),
    array(
      'type'      => 'text',
      'id'        => 'countTo',
      'label'     => 'Счетчик countTo',
      'desc'      => 'Селектор счетчика, обьекту задать:<i> data-from="(int)" data-to="(int)"</i> дополнительно: data-speed="(int)" data-refresh-interval="(int)"',
      'placeholder'   => '.timer',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'appearJs',
      'label'     => 'Подключить appear',
      'desc'      => '',
      ),
    );

  $fancybox_animates = array(
    'none'    => 'Без эффекта',
    "elastic" => 'Эластичность',
    "fade"    => 'Угасание',
    );
  $modal_types = array(
    ''          => 'Не использовать',
    'fancybox2' => 'Fancybox 2',
    'fancybox3' => 'Fancybox 3',
    // 'magnific'   => 'Magnific Popup',
    // 'photoswipe' => 'PhotoSwipe',
        // 'lightgallery' => https://sachinchoolur.github.io/lightgallery.js/
    );

  $args['dismodal'] = array(
    'type'    => 'select',
    'id'      => 'modal_type',
    'label'   => 'Тип модального окна',
    'options' => $modal_types,
    'value'   => '',
    );
  $args['fancybox2'] = array(
    array(
      'type'    => 'select',
      'id'      => 'modal_type',
      'label'   => 'Тип модального окна',
      'options' => $modal_types,
      'value'   => 'fancybox2',
      ),
    array(
      'type'        => 'text',
      'id'          => 'modal_selector',
      'label'       => 'jQuery Селектор',
      'desc'        => 'Модальное окно (Галерея, всплывающее окно)',
      'placeholder' => '.fancybox, .zoom',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'fancybox_props][thumb',
      'label'     => 'Показывать превью',
      'desc'      => 'Показывать превью, если определена галерея атрибутом rel',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'fancybox_mousewheel',
      'label'     => 'Прокрутка мышью',
      'desc'      => 'Прокручивать изображения в fancybox окне колесом мыши',
      ),
    array(
      'type'      => 'select',
      'id'        => 'fancybox_props][openEffect',
      'label'     => 'Анимация при открытии',
      'options'   => $fancybox_animates,
      'defaults'  => 'elastic',
      ),
    array(
      'type'      => 'select',
      'id'        => 'fancybox_props][closeEffect',
      'label'     => 'Анимация при закрытии',
      'options'   => $fancybox_animates,
      'defaults'  => 'elastic',
      ),
    array(
      'type'      => 'select',
      'id'        => 'fancybox_props][nextEffect',
      'label'     => 'Эфект при перелистывании вперед',
      'options'   => $fancybox_animates,
      'defaults'  => 'fade',
      ),
    array(
      'type'      => 'select',
      'id'        => 'fancybox_props][prevEffect',
      'label'     => 'Эфект при перелистывании назад',
      'options'   => $fancybox_animates,
      'defaults'  => 'fade',
      ),
  );

  $args['fancybox3'] = array(
    array(
      'type'    => 'select',
      'id'      => 'modal_type',
      'label'   => 'Тип модального окна',
      'options' => $modal_types,
      'value'   => 'fancybox3',
      ),
    array(
      'type'      => 'text',
      'id'        => 'modal_selector',
      'label'     => 'jQuery Селектор',
      'desc'      => 'Модальное окно (Галерея, всплывающее окно)',
      'placeholder'   => '.fancybox, .zoom',
      ),
    array(
      'type'    => 'select',
      'id'      => 'fancybox_props][openCloseEffect',
      'label'   => 'Эффект открытия',
      'options' => array(
        'false'     => 'Без эффекта',
        'zoom'        => 'Увеличение от объекта',
        'fade'        => 'Угасание',
        'zoom-in-out' => 'Увеличение из вне',
        ),
      'default' => 'zoom',
      ),
    array(
      'type'    => 'select',
      'id'      => 'fancybox_props][nextPrevEffect',
      'label'   => 'Эффект перелистывания',
      'options' => array(
        'false'       => 'Без эффекта',
        'fade'        => 'Угасание',
        'slide'       => 'Увеличение от объекта',
        'circular'    => 'Угасание',
        'tube'        => 'Туба',
        'zoom-in-out' => 'Увеличение из вне',
        'rotate'      => 'Переворот',
        ),
      'default' => 'fade',
      ),
     array(
      'type'    => 'html',
      'id'      => 'for_group',
      'value'   => 'Для группировки объектов используйте <em>data-fancybox</em>'
      ),
     );

  $args['magnific'] = array(
    array(
      'type' => 'select',
      'id'   => 'modal_type',
      'label'=> 'Тип модального окна',
      'options' => $modal_types,
      'value' => 'magnific',
      ),
    array(
      'type'      => 'text',
      'id'        => 'magnific',
      'label'     => 'jQuery Селектор',
      'desc'      => 'Модальное окно (Галерея, всплывающее окно)',
      'placeholder'   => '.magnific, .zoom',
      ),
    );

  $args['photoswipe'] = array(
    array(
      'type' => 'select',
      'id'   => 'modal_type',
      'label'=> 'Тип модального окна',
      'options' => $modal_types,
      'value' => 'photoswipe',
      ),
    array(
      'type'      => 'text',
      'id'        => 'photoswipe',
      'label'     => 'jQuery Селектор',
      'desc'      => 'Модальное окно (Галерея, всплывающее окно)',
      'placeholder'   => '.photoswipe, .zoom',
      ),
    );

  $args['dt-woo-settings'] = array(
    array(
      'type'      => 'checkbox',
      'id'        => 'woo_cat_content_bottom',
      'label'     => 'Показывать описание категории снизу страницы',
      'desc'      => 'Описание категории будет показываться после вывода товаров.',
      ),
    array(
      'type'      => 'select',
      'id'        => 'bestsellers',
      'label'     => 'Популярный товар',
      'options'      => array(
        ''         =>'Не использовать',
        'personal' =>'Использовать вручную',
        'views'    =>'Сортировать по просмотрам',
        'sales'    =>'Сортировать по продажам'
        ),
      'desc'      => ' 1. Убедитесь что [query] запросы включены. <br> 2. Используйте <strong> [query type="top-sales"] </strong>',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'wholesales',
      'label'     => 'Оптовые продажи',
      'desc'      => 'Разрешить продажу от.. шт.',
      ),
    array(
      'type'      => 'text',
      'id'        => 'product-measure-unit',
      'label'     => 'Добавить товару ед. измерения',
      'desc'      => 'Укажите стандартную величину',
      'default'   => 'шт.',
      ),
    array(
      'type'      => 'text',
      'id'        => 'per-pack',
      'label'     => 'Стоимость за упаковку',
      'desc'      => 'Укажите метку перед значением',
      'default'   => 'Стоимость за упаковку:',
      ),
    array(
      'type'      => 'checkbox',
      'id'        => 'plus-minus-buttons',
      'label'     => 'Добавить +/-',
      'desc'      => 'Добавить кнопки + и - для увеличения/уменьшения количество покупки',
      ),
    );

  return isset($args[$section]) ? $args[$section] : $args;
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.seo-section')) {
        new ShowMore('.seo-section_top .seo-section__content', {
            config: {
                type: 'text',
                limit: 256,
                element: 'div',
                more: 'Показать полностью',
                less: 'Свернуть',
                btnClass: 'seo-section__btn',
            }
        });

        new ShowMore('.seo-section_bottom .seo-section__content', {
            config: {
                type: 'text',
                limit: 1024,
                element: 'div',
                more: 'Показать полностью',
                less: 'Свернуть',
                btnClass: 'seo-section__btn',
            }
        });
    }
});
function imageComparison(selector){
    let comparison = $(selector)
        .addClass('image-comparison')
        .prepend('<div class="image-comparison_before"></div>')
        .append('<button class="image-comparison_slider"></button>');
    let images = comparison
        .find('img')
        .addClass('image-comparison_image')
        .css('max-width',comparison.width());
    let before = comparison
        .find('.image-comparison_image')
        .append(images.eq(0));
    comparison
        .find('.image-comparison__slider')
        .on('dragstart', () => false) // отмена станд. drug&drop
        .on('mousedown', function(e) {
            let slider = $(this);
            let doc = $(document).on('mousemove', (e) => {
                let offset = e.pageX - comparison.position().left;
                let width = comparison.width();

                // установим границы, чтобы ползунок не выходил
                if (offset < 0) offset = 0;
                if (offset > width) offset = width;

                slider.css('left', offset + 'px');
                before.css('width', offset + 'px');
            });

            doc.on('mouseup', () => doc.off('mousemove'));
        });

}
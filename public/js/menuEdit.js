function editMenu() {
    //Removing elements from menu
    this.removeElement = function () {
        $('.removeMenuElement').on('click', function () {

            let parent_ = $(this).parent('div').parent('li');

            //hidden input
            $(this).siblings('input').first().val('false');
            //List element set to hidden
            parent_.css('display', 'none');
            //but also if current menu element has subelements then these need to be deactivated as well
            parent_.find('li input').first().val('false');
        })
    };

    //Adding elements to menu
    var lastID = 1;
    this.addElement = function () {
        $('.addElemenMenu').on('click', function () {
            var link = $(this).prev();
            var anchor = $(link).prev();

            //adding a number to the next element based on the currently highest number found in menu
            var num = 0;
            var menuBuilder = $('.menuActiveElementsAdmin>ol');

            //add list element into menu and also input so it will be passed via form to the controler
            menuBuilder.append('<li class="">' +
                '<div class="ui-sortable-handle">' +
                '<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' +
                '<span class="menuConfigElement">' + anchor.html() + '-' + link.attr('href') + '</span>'
                + '<input type="hidden" value="' + anchor.html() + '" name="newElem' + lastID + '[]" />'
                + '<input type="hidden" value="' + link.attr('href') + '" name="newElem' + lastID + '[]"/>' +
                '<input type="hidden" value="1" name="newElem' + lastID + '[]" id="thisLevel"/>' +
                '<input type="hidden" value="parentlvl" name="newElem' + lastID + '[]" id="parentLvl"/>' +
                '</div></li>');
            lastID++;
        });
    };
}



//----------------------------
var menu = new editMenu();
menu.removeElement();
menu.addElement();

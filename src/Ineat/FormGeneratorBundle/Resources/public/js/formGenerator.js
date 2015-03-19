function FormGenerator (holder, btn) {
    var collectionHolder = holder;
    var addBtn = btn;

    this.init = function() {

        collectionHolder.data('index', collectionHolder.find(':input').length);
        bindEvents();
    }

    function addNewForm() {

        var prototype = collectionHolder.data('prototype');
        var index = collectionHolder.data('index');
        var newForm = prototype.replace(/__name__/g, index);
        addBtn.before(newForm);

        var widgetsContainer = $(newForm).find('#ineat_formgeneratorbundle_formcontainer_forms_' + index + '_widgets');
        var widgetsAddBtn = $(newForm).find('#ineat_formgeneratorbundle_formcontainer_forms_' + index + '_widgets_addbtn');

        if (widgetsContainer !== undefined && widgetsAddBtn !== undefined) {
            widgetsFormGenerator = new FormGenerator($('#' + widgetsContainer.attr('id')), $('#' + widgetsAddBtn.attr('id')));
            widgetsFormGenerator.init();
        }

        collectionHolder.data('index', index + 1);

    }

    function bindEvents() {
        addBtn.bind( "click", function(e) {
            e.preventDefault();
            addNewForm();
        });

    }

};

$(document).ready(function() {
    var collectionHolder = $('#ineat_formgeneratorbundle_formcontainer_forms');
    var btn = $('#ineat_formgeneratorbundle_formcontainer_forms_addbtn');
    var ParentFormGenerator = new FormGenerator(collectionHolder, btn);
    ParentFormGenerator.init();
});
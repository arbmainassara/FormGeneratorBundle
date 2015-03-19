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
            var typeselector = $(newForm).find('#ineat_formgeneratorbundle_formcontainer_forms_' + index + '_widgettypes');
            widgetsFormGenerator = new FormWidgetGenerator(
                $('#' + widgetsContainer.attr('id')),
                $('#' + widgetsAddBtn.attr('id')),
                $('#' + typeselector.attr('id'))
            );
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


function FormWidgetGenerator (holder, btn, selector) {
    var collectionHolder = holder;
    var addBtn = btn;
    var typeselector = selector;

    this.init = function() {
        collectionHolder.data('index', collectionHolder.find(':input').length);
        bindEvents();
    }

    function addNewForm(formtype) {
        console.log(formtype);
        var prototype = $('.' + formtype).data('prototype');
        var index = collectionHolder.data('index');
        var newForm = prototype.replace(/__name__/g, index);
        addBtn.before(newForm);

        collectionHolder.data('index', index + 1);
    }

    function bindEvents() {
        addBtn.bind( "click", function(e) {
            e.preventDefault();
            if (typeselector.val() !== 'empty_value') {
                addNewForm(typeselector.val());
            } else {
                alert("Vous devez choisir un type de question.");
            }
        });

    }

};


$(document).ready(function() {
    var collectionHolder = $('#ineat_formgeneratorbundle_formcontainer_forms');
    var btn = $('#ineat_formgeneratorbundle_formcontainer_forms_addbtn');
    var ParentFormGenerator = new FormGenerator(collectionHolder, btn);
    ParentFormGenerator.init();
});
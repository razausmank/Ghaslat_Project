// generic dual list box
// Class definition
var dualListBoxClass = function() {
    // Private functions
    var Funct = function () {
// Dual Listbox1
var $this = $('#' + $('.dual-listbox').attr('id'));

var leftTitle =  $('.dual_listbox_unique').data('lefttitle');
var rightTitle =  $('.dual_listbox_unique').data('righttitle');
// get options
var options = [];
// $this.children('option').each(function () {
// var value = $(this).val();
// var label = $(this).text();
// options.push({
// text: label,
// value: value
// });
// });

// init dual listbox
var dualListBox = new DualListbox($this.get(0), {
addEvent: function (value) {
console.log(value);
},
removeEvent: function (value) {
console.log(value);
},
availableTitle: leftTitle,
selectedTitle: rightTitle,
addButtonText: 'Add',
removeButtonText: 'Remove',
addAllButtonText: 'Add All',
removeAllButtonText: 'Remove All',
options: options,
});
};

    return {
        // public functions
        init: function() {
            Funct();
        },
    };
}();

$(function() {
    dualListBoxClass.init();

});

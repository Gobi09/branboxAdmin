/*
* Author : Gobi
* Subject : Dynamic Drag and Drop with jQuery and PHP
*/

$(function() {
    $('#sortable').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		//alert(list_sortable);
		// change order in the database using Ajax
            $.ajax({
                url: 'http://localhost/branboxAdmin/branboxController/repositionMenuOrder',
                type: 'POST',
                data: {position:list_sortable},
                success: function(data) {
                   //alert(data);
                }
		
            });
        }
    }); // fin sortable
});
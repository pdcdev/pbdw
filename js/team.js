jQuery(document).ready(function($) {

    function column_spill ( parent, spillover ) {
        var total = parent.length;
        var start_index = Math.ceil( parent.length / 2);
        while ( start_index < total ) {
            $( parent[start_index] ).appendTo( spillover );
            start_index++;
        }
    }
    column_spill($(".staff_architects ul"),$(".staff_architects_spillover > div") );
});
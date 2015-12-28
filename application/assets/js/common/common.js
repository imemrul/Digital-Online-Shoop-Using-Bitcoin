/* 
 * Include common Js code here
 */

//This section initialize the all elements

$('.numeric').on('input', function (event) { 
    var val = $(this).val();
    if(isNaN(val)){
        val = val.replace(/[^0-9\.]/g,'');
        if(val.split('.').length>2)
            val =val.replace(/\.+$/,"");
    }
    $(this).val(val);
});
//End of This section initialize the all elements

 $('span#report').on('hover',function(){
            $('span#report').popover({
                trigger: "hover",
                html : true, 
                placement:'top'    
            }); 
        });

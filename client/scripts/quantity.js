$(document).ready(function(){
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");

$qty_up.click(function(e){
    let $input =$(`.qty_input[data-id='${$(this).data("id")}']`);
    if($input.val()>=1 && $input.val()<=9){
        $input.val(function(i,oldval){
            return ++oldval;
        });
    }
});

$qty_down.click(function(e){
    let $input =$(`.qty_input[data-id='${$(this).data("id")}']`);
    // let $input = $(`.qty .qty_input[data-id='${$(this).data("id")}']`);
    if($input.val()>1 && $input.val()<=10){
        $input.val(function(i,oldval){
            return --oldval;
        });
    }
});

});


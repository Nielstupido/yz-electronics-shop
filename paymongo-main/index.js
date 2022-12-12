 

 $("input[data-type='currency']").on({
     keyup: function(){
        formatCurrency($(this))
     },
     blur: function(){
        formatCurrency($(this), "blur")
     }
 })

 function formatNumber(n){
    // 1000000 to 1,2334,0000
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")

 }

 function formatCurrency(input, blur) {

    var input_val = input.val();

    if(input_val === "") {return ;}

    var original_len = input_val.length;

    var caret_pos = input.prop("selectionStart");


    if(input_val.indexOf(".") >= 0){

        var decimal_pos = input_val.indexOf(".");

        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        left_side = formatNumber(left_side);

        right_side = formatNumber(right_side);

        if (blur === "blur"){
            right_side += "00";
        }

        right_side = right_side.substring(0, 2);

        input_val = "₱" + left_side + "." + right_side;

    }else{

        input_val = formatNumber(input_val);
        input_val = "₱" + input_val;


        if(blur === "blur"){
            input_val += ".00";
        }
    }

    input.val(input_val);

    var update_len = input_val.length;
    caret_pos = update_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);

 }

  
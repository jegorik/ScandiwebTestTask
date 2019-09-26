/*
This function send request of chosen product to CRUDScript.php
and if product exist in database it starts to load product at web page
*/
function selectFromDB(products)
{
    $.ajax(
        {
            type: "POST",
            url: "php/CRUDScript.php",
            dataType: 'json',
            data: {products},
            success: function (data) {
                if (data[0].sku) {
                    var result = data;
                    $('.main').remove();
                    result.forEach(makeGrid);
                } else {
                    alert(data);
                }
            }
        }
    );
}

/*
This function request information about checked ChekBoxes at web page
and then sends names of checked products to CRUDScript.php
 */
function removeFromDB()
{
    var products = [];

    $('.main input:checkbox:checked').each(
        function () {
            products.push($(this).attr('name'));
        }
    );

    $.ajax(
        {
            type: "POST",
            url: "php/CRUDScript.php",
            dataType: 'json',
            data: {products: products},
            success: function (data) {
                    alert(data);
                    location.reload();
            }
        }
    );
}

/*
This function makes grid for selected products at web page
 */
function makeGrid(item)
{
        var mainForm = $("<div>", {class: "main"}).appendTo("body");
        var productCard = $("<div>", {class: "productCard"}).appendTo(mainForm);
        var content = $("<div>", {class: "content"}).appendTo(productCard);
        var sku = $("<div>", {text: item[0], class: "productData"}).appendTo(content);
        var checkBox = $("<input>", {type: "checkbox", class: "form-check-input", name: item.sku}).appendTo(content);
        var name = $("<div>", {text: item[1], class: "productData"}).appendTo(content);
        var price = $("<div>", {text: item[2] + " $", class: "productData"}).appendTo(content);
        var product = $("<div>", {text: item[3], class: "productData"}).appendTo(content);
        var attribute = $("<div>", {text: item[4], class: "productData"}).appendTo(content);
}

/*
When Apply button is pressed this function checks value of selector
and starts actions depending of information value.
 */
function doAction()
{
    var switcherValue = $('#switcher').val();
    if (switcherValue === 'mass_delete') {
        removeFromDB();
    } else {
        selectFromDB(switcherValue);
    }
}


/*
    This function show/hide inputs when user change "Type switcher"
    value. Also it marks input fields with "required" flag.
*/

function showBlock(val) {
    var product = '#' + val;
    var check = product + "-field";
    $('.hidden-input').attr("required", false);
    $('.hidden-block').css({"display": "none"});
    $(product).css({"display": "block"});
    if (val === 'furniture') {
        for (let i = 1; i < 4; i++) {
            $(check + i ).attr("required", true);
        }
    } else {
        $(check).attr("required", true);
    }
}

/*
    Parse information from web form excepting inputs with a null value (inputs with flag "display : none")
    and send it to php class for future actions. Also this function is listening for echo calls from php class
    and send it to callback function.
*/

function send(form, path) {
    var products = $(form).filter(function (index, element) {
        return $(element).val() !== "";
    }).serialize();

    $.ajax({
        type: "POST",
        url: path,
        dataType: 'json',
        data: {products},
        success: function callback(data) {
            if (data.success) {
                alert(data.success);
                location.reload();
            } else {
                let errorArray = Object.values(data).join('\n');
                alert(errorArray);
            }
        }
    });

}

/*
    In case of form "submit" action do save function
*/
$('#product-form').on('submit', e => {
    e.preventDefault();
    send('#product-form :input', 'php/CRUDScript.php');
});

$(function () {

    $("img[usemap]").mapify({
        hoverClass: "mapify-hover",
        popOver: {
            content: function (zone) {
                return "<strong>"
                    + zone.attr("data-title") +
                    "</strong>"
                    + zone.attr("data-Info1")
                    + "<br/>"
                    + zone.attr("data-Info2")
                    + "<br/>"
                    + zone.attr("data-Info3");
            },
            delay: 0.7,
            margin: "15px",
            height: "130px",
            width: "260px"
        },
    });
});

//This functions sets the color of the area and get it always highlighted
//This function is called from the server side sending the color and the area that is going to be highlighted 
    function colorear(color, area) {
        var _area = document.getElementById(area.id);
        var index = findWithAttr($("#Map area"), "id", _area.id);
      
        $(window).resize(
            function () {
                setTimeout(
                    function () {
                        $("#Map area").eq(index).trigger("mouseenter.mapify").trigger("focus.mapify").trigger("touchend.mapify");
                        $(".mapify-svg polygon").eq(index).css("fill", color);
                    }, 250);
            }).resize();
    }

    //These functions are for focus and unfocus the area 
    function unfocusonarea(index) {
        $("#Map area").eq(index).trigger("mouseout.mapify");
    }

    function focusonarea(index, area) {
        var _area = document.getElementById(area.id);
        var color = _area.attributes.getNamedItem("data-hover-class").value;
        $("#Map area").eq(index).trigger("mouseenter.mapify").trigger("focus.mapify").trigger("touchend.mapify");
        $(".mapify-svg polygon").eq(index).css(color);
    }

    //Events
    function RowMouseOver(sender, eventArgs) {
        var codigocorral = eventArgs._dataKeyValues.CodigoCorral;
        var _area = document.getElementById('c' + codigocorral);
        var index = findWithAttr($("#Map area"), "id", 'c' + codigocorral);
        _area.onmouseover = focusonarea(index, _area);
    }

    function RowMouseOut(sender, eventArgs) {
        var codigocorral = eventArgs._dataKeyValues.CodigoCorral;
        var _area = document.getElementById('c' + codigocorral);
        var index = findWithAttr($("#Map area"), "id", 'c' + codigocorral);
        _area.onmouseout = unfocusonarea(index);
    }

    //This function is able to find any element by its attribute and value of the attrinbute.
    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1){
            if (array[i][attr] === value){
                return i;
            }
        }
        return -1;
    }

    function Area_Click(area) {
        // debugger;
        var hf = document.getElementById("hfid");
        var id = area.attr("id");
        hf.value = id;
        var btnAreaClick = document.getElementById("btnArea");
        if (id.length > 0) {
            btnAreaClick.click();
        }
    }

    $(document).ready(function (e) {
        $("#Map area").click(function () {
            Area_Click($(this));
            return false;
        });
    });

//Algo raro pasa aqui, el evento crea conflicto con el date picker...

    function gridCorralesClick(sender, args) {
        var hfid = document.getElementById("hfid");
        hfid.value = args._dataKeyValues.CodigoCorral;
        var btnAreaClick = document.getElementById("btnArea");
        if (hfid.value.length > 0) {
            btnAreaClick.click();
        }
    }


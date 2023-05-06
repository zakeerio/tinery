function deleteConfirm(e) {
    swal({
            title: "Are you sure you want to delete this ?",
            icon: "warning",
            buttons: {
                catch: {
                    text: "Yes",
                    value: "yes",
                },
                cancel: "NO",
            },
        })
        .then((value) => {
            switch (value) {
                case "yes":
                    var form = $(e.currentTarget).data("formid");
                    $("#" + form).submit();
                    break;
                default:
                    swal({
                        icon: "success",
                        title: "Phew! Your data is safe!"
                    });
            }
        });
}

function updateThemeSettings(route, elm, csrf) {
    elm = elm.currentTarget;
    var value = "";
    var key = $(elm).prop("name");
    var targetId = $(elm).data("target_id");
    var className = elm.dataset.class;
    var oldClassName = elm.dataset.old_class;
    if ($(elm).prop("tagName") == "INPUT") {
        if ($(elm).is(":checked")) { value = $(elm).val(); }
        $("#" + targetId).removeClass(className);
        $("#" + targetId).addClass(value);
    } else {
        value = $(elm).val();
        $("#" + targetId).removeClass(className);
        $("#" + targetId).addClass(value);
        elm.dataset.old_class = className;
        elm.dataset.class = value;
    }

    $.ajax({
        url: route,
        type: 'POST',
        data: {
            "_token": csrf,
            key: key,
            value: value,
        },
    });
}
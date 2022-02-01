function activate(route, status, id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        type: "POST",
        url: route,
        data: {
            status: status,
            id: id
        },
        success: function success(data) {
            $(document).Toasts("create", {
                class: "bg-" + data["class"],
                title: "Известување",
                autohide: true,
                delay: 1300,
                body: data["body"]
            });
        }
    });
}

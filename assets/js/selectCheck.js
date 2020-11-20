window.addEventListener('load', function (event) {

    const festival_btns = document.getElementsByClassName('btn-festival');
    for (var i = 0; i != festival_btns.length; i++) {
        let festival_btn = festival_btns.item(i);
        festival_btn.addEventListener("click", function (event) {
            const checked_radio_btns = document.querySelectorAll('input[name=festival_id]:checked');
            if (checked_radio_btns.length === 0) {
                event.preventDefault();
                event.stopImmediatePropagation();
                alert("Please select a festival first");
            }
        });
    };

    const festival_delete_btn = document.getElementsByClassName('btn-festival-delete')[0];
    festival_delete_btn.addEventListener("click", function (event) {
        if (!confirm("Are you sure you want to delete this festival?")) {
            event.preventDefault();
        }
    });

});
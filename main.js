$('.carousel').carousel({
    interval: 2000
})

var script_url = "https://script.google.com/macros/s/AKfycbxB_ObM9CLj6kzPIFgCIhEY2FgTDw6CWmC7hI-rdtOpGTi8h2DT/exec";
function insert_value() {
    var id1 = $("#id").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var address = $("#address").val();
    var repair = $("#repair").val();
    var issue = $("#issue").val();
    var model = $("#model").val();
    var spare = $("#spare").val();
    var url = script_url + "?callback=ctrlq&name=" + name + "&id=" + id1 + "&email=" + email + "&address=" + address + "&issue=" + issue + "&repair=" + repair + "&model=" + model + "&spare=" + spare + "&action=insert";
    var request = jQuery.ajax({
        crossDomain: true,
        url: url,
        method: "GET",
        dataType: "jsonp"
    });
    $("#resetForm").reset();
}
function ctrlq(e) {
    alert('Your Repair has been booked\nwe will get back to you ASAP.')
}
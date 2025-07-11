// JavaScript to control the modal
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("quickQuestionModal");
    var btn = document.getElementById("openContactModal");
    var span = document.getElementsByClassName("close-button")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get("status");
    const messageEl = document.getElementById("notification-message");
    const textEl = document.getElementById("notification-text");

    let message = "";
    let type = "";

    switch (status) {
        case "review_success":
            message = "Your review was sent successfully!";
            type = "success";
            break;
        case "review_error":
            message = "Error sending review. Please try again.";
            type = "error";
            break;
        case "no_review":
            message = "Please enter a review before submitting.";
            type = "warning";
            break;
    }

    if (message) {
        textEl.textContent = message;
        messageEl.classList.add(type, "show");
        setTimeout(() => {
            messageEl.classList.remove("show");
            setTimeout(() => {
                messageEl.classList.remove(type);
            }, 500);
        }, 5000);
    }
});
  
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contact-form");
    const messageBox = document.getElementById("form-message");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch("contact.php", {
            method: "POST",
            body: formData
        })

        .then(response => response.json())
        .then(data => {
            messageBox.textContent = data.message;
            messageBox.style.color = data.status === "success" ? "green" : "red";
            if (data.status === "success") {
                form.reset();
            }
        })

        .catch(error => {
            messageBox.textContent = "Fehler beim Senden der Nachricht.";
            messageBox.style.color = "red";
        });

    });
    
});

// Wait for the DOM to fully load before adding event listeners
document.addEventListener("DOMContentLoaded", () => {
    // Select the form element
    const form = document.querySelector("form");

    // Add an event listener for the form's submit event
    form.addEventListener("submit", (event) => {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the values of the form inputs
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const subject = document.getElementById("subject").value.trim();
        const message = document.getElementById("message").value.trim();

        // Check if all fields are filled
        if (name === "" || email === "" || subject === "" || message === "") {
            alert("Please fill in all the fields.");
            return;
        }

        // Simple email validation (basic check)
        if (!/\S+@\S+\.\S+/.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        // If everything is filled, show a success message
        alert(`Thank you, ${name}! Your message has been sent.`);
    });
});

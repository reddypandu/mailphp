function submitForm() {
  // Get form data
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  // You can perform client-side validation here if needed

  // Create a FormData object to send data to the server
  const formData = new FormData();
  formData.append("name", name);
  formData.append("email", email);
  formData.append("message", message);

  // Use Fetch API to send the form data to a server-side script (e.g., PHP)
  fetch("process_form.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Display success message
      alert(data.message);
    })
    .catch((error) => {
      // Display error message
      alert("Error sending email. Please try again later.");
    });
}

const email1 = document.querySelector("#email1");
const email2 = document.querySelector("#email2");

// Validation of email structure
email1.addEventListener("change", function () {
  // remove, if they're any validation classes set
  email1.classList.remove("is-valid");
  email1.classList.remove("is-invalid");
  // set regular expression for a valid email
  const emailRegexp = new RegExp(
    "^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$"
  );
  // verify if email is not according to regexp
  if (!emailRegexp.test(email1.value)) {
    // displays invalid alert
    email1.classList.add("is-invalid");
  } else {
    // otherwise, display a valid green check
    email1.classList.add("is-valid");
  }
});

// Match of email and its confirmation
email2.addEventListener("change", function () {
  email2.classList.remove("is-invalid");

  if (email1.value == email2.value) {
    email2.classList.add("is-valid");
  } else {
    email2.classList.add("is-invalid");
  }
});

// Form submition
const form = document.querySelector("form");
const msgConfirmation = document.querySelector("#modalBox");
const modalTitle = document.querySelector(".modal-title");

form.addEventListener("submit", function (e) {
  try {
    // prevents page from refreshing
    e.preventDefault();
    // create an object to stock form data
    const formData = new FormData(e.target);

    fetch("mailSender.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        if (data.status === "success") {
          console.log(data.status + ": Your message was registered.");
          modalTitle.textContent = `Thank you ${data.name}!`;
          msgConfirmation.style.display = "block";
          document.querySelector(".btn-close").onclick = function () {
            msgConfirmation.style.display = "none";
          };
        }
      });
  } catch (error) {
    console.error(error);
  }
});

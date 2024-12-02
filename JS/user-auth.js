

const seePassword = (inputId, iconElement) => {
  const inputField = document.getElementById(inputId);

  if (!inputField) return;

  if (inputField.type === "password") {
    inputField.type = "text";
    iconElement.classList.remove("fa-eye");
    iconElement.classList.add("fa-eye-slash");
  } else {
    inputField.type = "password";
    iconElement.classList.remove("fa-eye-slash");
    iconElement.classList.add("fa-eye");
  }
};

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// Check if the elements exist before adding event listeners
if (signUpButton) {
  signUpButton.addEventListener('click', () => container.classList.add('right-panel-active'));
}

if (signInButton) {
  signInButton.addEventListener('click', () => container.classList.remove('right-panel-active'));
}


document.addEventListener('DOMContentLoaded', () => {
  const activeForm = '<?= $activeForm ?>';
  const container = document.getElementById('container');
  if (activeForm === 'signup') {
    container.classList.add('right-panel-active');
  } else {
    container.classList.remove('right-panel-active');
  }
});
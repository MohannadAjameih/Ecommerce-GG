<script>
//Cvv code
var cvvInput = document.getElementById('cvv');
var toggleCvvButton = document.getElementById('toggleCvv');
var cvvEyeIcon = document.getElementById('cvvEyeIcon');
var isCvvVisible = false;

toggleCvvButton.addEventListener('mousedown', function () {
    if (!isCvvVisible) {
        cvvInput.type = 'text';
        cvvEyeIcon.classList.remove('fa-eye');
        cvvEyeIcon.classList.add('fa-eye-slash');
        isCvvVisible = true;
    }
});

toggleCvvButton.addEventListener('mouseup', function () {
    if (isCvvVisible) {
        cvvInput.type = 'password';
        cvvEyeIcon.classList.remove('fa-eye-slash');
        cvvEyeIcon.classList.add('fa-eye');
        isCvvVisible = false;
    }
});
cvvInput.addEventListener('input', function () {
    cvvInput.value = cvvInput.value.replace(/[^0-9]/g, '');
});
//End Cvv code

</script>

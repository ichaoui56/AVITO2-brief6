
        // Select all elements with the class 'pswd' and add an event listener for the 'input' event
        document.querySelectorAll('.pswd').forEach(function (element) {
            element.addEventListener('input', checkPassword);
        });

        // Function to toggle password visibility
        function togglePasswordVisibility() {
            // console.log("hi")
            // Select the password input and the eye icons
            const passwordInput = document.querySelector('.pswd');
            const OpenEye = document.getElementById('OpenEye');
            const CloseEye = document.getElementById('CloseEye');

            // Toggle the password input type between 'password' and 'text'
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                OpenEye.style.display = 'none';
                CloseEye.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                OpenEye.style.display = 'block';
                CloseEye.style.display = 'none';
            }
        }

        // Function to check the password input and toggle eye icons
        function checkPassword() {
            // Select all elements with the class 'pswd'
            const PasswordSpaces = document.querySelectorAll('.pswd');

            // Select eye icons
            const OpenEye = document.getElementById('OpenEye');
            const CloseEye = document.getElementById('CloseEye');

            // Flag to check if any password input is not empty
            let passwordNotEmpty = false;

            // Iterate over each password input
            PasswordSpaces.forEach(function (passwordSpace) {
                // Check if the current password input has a non-zero length
                if (passwordSpace.value.length > 0) {
                    passwordNotEmpty = true;
                }
            });

            // Toggle display of eye icons based on password input
            // if (passwordNotEmpty) {
            //     OpenEye.style.display = 'none';
            //     CloseEye.style.display = 'block';
            // } else {
            //     OpenEye.style.display = 'block';
            //     CloseEye.style.display = 'none';
            // }
        }

        // Add an event listener to the eye icons for toggling password visibility
        // document.getElementById('OpenEye').addEventListener('click', togglePasswordVisibility);
        // document.getElementById('CloseEye').addEventListener('click', togglePasswordVisibility);

        // Add event listener for the toggle button
        document.getElementById('toggleBtn').addEventListener('change', togglePasswordVisibility);

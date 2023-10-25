<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">
    <div class="w-2/3 mx-auto bg-white p-6 mt-12 rounded-lg shadow-md">
        <h2 class="text-2xl text-center mb-4">Sign Up</h2>
        <form id="signup-form" onsubmit="return validateForm()">
            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-bold mb-1">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-bold mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="confirm-password" class="block font-bold mb-1">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="password-match-error" class="text-red-600 hidden">Passwords do not match.</p>
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">Sign Up</button>
        </form>
    </div>
    <script>
        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const passwordMatchError = document.getElementById("password-match-error");

            if (password !== confirmPassword) {
                passwordMatchError.classList.remove("hidden");
                return false; // Prevent form submission
            } else {
                passwordMatchError.classList.add("hidden");
                // Post the form data to an API
                postUserData();
                return false; // Prevent form submission (change to 'true' if you want to proceed)
            }
        }

        function postUserData() {
            const form = document.getElementById("signup-form");
            const formData = new FormData(form);

            fetch('http://localhost:8000/api/register', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (response.status === 201) {
                    // Redirect to another page on success
                    window.location.href = 'home';
                } else {
                    // Handle errors, e.g., show an error message
                    console.error('Error posting data to API');
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
        }
    </script>
</body>

</html>

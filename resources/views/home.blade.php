<!DOCTYPE html>
<html>

<head>
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">
    <div class="w-2/3 mx-auto bg-white p-6 mt-12 rounded-lg shadow-md">
        <h2 class="text-2xl text-center mb-4">Make Post</h2>
        <form id="signup-form" onsubmit="return validateForm()">
            <div class="mb-4">
                <label for="name" class="block font-bold mb-1">Title</label>
                <input type="text" id="title" name="title" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="data" class="block font-bold mb-1">Data</label>
                <input type="text" id="data" name="data" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="categoryId" class="block font-bold mb-1">Assign Category</label>
                <input type="text" id="categoryId" name="categoryId" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class=" justify-between">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">Make Post</button>
                <a href="{{ url('allposts') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">
                
                All Post
                </a>
            </div>
        </form>
    </div>
    <script>
        function validateForm() {

            const form = document.getElementById("signup-form");
            const formData = new FormData(form);

            fetch('http://localhost:8000/api/addPost', {
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

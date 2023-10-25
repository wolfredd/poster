<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Data Table</title>
</head>

<body>
    <table style="border-collapse: collapse; width: 80%; margin: 20px auto; border: 1px solid #ccc;">
        <thead>
            <tr style="background-color: #f0f0f0;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Data</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Category</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

    <hr/>

    <div class="w-2/3 mx-auto bg-white p-6 mt-12 rounded-lg shadow-md">
        <h2 class="text-2xl text-center mb-4">Make Comment</h2>
        <form id="comment-form" onsubmit="return makeComment()">
            <div class="mb-4">
                <label for="username" class="block font-bold mb-1">Username</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="commentData" class="block font-bold mb-1">Comment Data</label>
                <input type="text" id="commentData" name="commentData" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="postId" class="block font-bold mb-1">Post Id</label>
                <input type="text" id="postId" name="postId" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class=" justify-between">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">Make Comment</button>
                
            </div>
        </form>
    </div>

    <hr/>

    <div class="w-2/3 mx-auto bg-white p-6 mt-12 rounded-lg shadow-md">
        <h2 class="text-2xl text-center mb-4">Edit Post</h2>
        <form id="edit-form" onsubmit="return editPost()">
            <div class="mb-4">
                <label for="title" class="block font-bold mb-1">Title</label>
                <input type="text" id="title" name="title" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="data" class="block font-bold mb-1">Data</label>
                <input type="text" id="data" name="data" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="postId" class="block font-bold mb-1">Post Id</label>
                <input type="text" id="postId" name="postId" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class=" justify-between">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">Edit Post</button>
                
            </div>
        </form>
    </div>



    <script>
    // Replace this URL with your API endpoint
    const apiUrl = 'http://localhost:8000/api/allPosts';

    // Fetch data from the API
    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            const tableBody = document.querySelector('tbody');

            data.forEach((item) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.id}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.title}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.data}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.categoryId}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;"> <button onclick="deletePost('${item.id}')">Delete</button> </td>
                    <td style="padding: 10px; border: 1px solid #ccc;"> <button onclick="editPost('${item.id}')">Delete</button> </td>
                `;

                tableBody.appendChild(row);
            });
        })
        .catch((error) => {
            console.error('Error fetching data: ', error);
        });

        function deletePost(id) {
            fetch(`http://localhost:8000/api/delete/${id}`, {
                method: 'DELETE',
            })
        }

        function editPost() {
            const postID = document.getElementById("postId");
            const form = document.getElementById("edit-form");
            const formData = new FormData(form);

            fetch(`http://localhost:8000/api/update/${postID}`, {
                method: 'PUT',
                body: formData,
            })
        }

        function makeComment() {

const form = document.getElementById("comment-form");
const formData = new FormData(form);

fetch('http://localhost:8000/api/addComment', {
    method: 'POST',
    body: formData,
})
    

}

</script>


</body>

</html>

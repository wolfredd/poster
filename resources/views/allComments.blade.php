<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>All Comments</title>
</head>

<body>
    <table style="border-collapse: collapse; width: 80%; margin: 20px auto; border: 1px solid #ccc;">
        <thead>
            <tr style="background-color: #f0f0f0;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">UserName</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Comment Data</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Post Id</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>


    <script>
    // Replace this URL with your API endpoint
    const apiUrl = 'http://localhost:8000/api/allComments';

    // Fetch data from the API
    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            const tableBody = document.querySelector('tbody');

            data.forEach((item) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.id}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.username}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.commentData}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">${item.postId}</td>
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

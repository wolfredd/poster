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
        <h2 class="text-2xl text-center mb-4">Search for Category</h2>
        <form id="category-form" onsubmit="return searchCategory()">
            <div class="mb-4">
                <label for="category" class="block font-bold mb-1">Category</label>
                <input type="text" id="category" name="category" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class=" justify-between">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover-bg-blue-600 focus:outline-none focus:ring">Search Category</button>
                
            </div>
        </form>
    </div>




    <script>

function searchCategory() {
    const category = document.getElementById("category");

const form = document.getElementById("category-form");
const formData = new FormData(form);

const apiUrl = `http://localhost:8000/api/search/${category}`;

fetch(`http://localhost:8000/api/search/${category}`, {
    method: 'GET',
    body: formData,
    
})

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
    

}




        
</script>


</body>

</html>

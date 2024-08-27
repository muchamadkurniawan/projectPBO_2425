<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
    <link href="./Views/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New Role -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Insert New Role
                    </button>
                </div>

                <!-- Roles Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Role ID</th>
                            <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Role Description</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role Status</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-700">
                        <!-- Example Data Row -->
                        <tr>
                            <td class="py-3 px-4">
                                <div class = "grid grid-cols-1 gap-2">
                                    1
                                </div>
                            </td>
                            <td class="w-1/4 py-3 px-4">Admin</td>
                            <td class="w-1/3 py-3 px-4">Administrator Role</td>
                            <td class="w-1/6 py-3 px-4">Active</td>
                            <td class="w-1/6 py-3 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                    Update
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- More rows can be added dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

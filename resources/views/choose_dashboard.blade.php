<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...your-integrity-hash-here..." crossorigin="anonymous" />

    <style>
        /* Define a custom class for the background image */
        .bg-login {
            background-image: url('/images/bgLogin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Optional: Fixed background */
            /* opacity: 0.85; Set the opacity to 25% */
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .dashboard-card {
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            margin: 10px;
            background-color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .dashboard-card h1 {
            margin-top: 0;
            font-size: 18px;
        }

        .dashboard-card i {
            font-size: 40px;
            color: #333;
        }

        .dashboard-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 16px 0;
        }

        .dashboard-card p {
            margin-bottom: 0;
            color: black;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
        }

        button {
            background-color: #1f2937;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0f1824;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-login ">
    <div class=" bg-gray-100 rounded-md">
        <!-- Page Content -->
        <main class="bg-white rounded-md">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 flex items-center justify-center">
                <h1 class="text-2xl font-semibold text-gray-800">User Type Account</h1>
            </div>

            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-xl font-semibold text-gray-600">Select account to continue</h2>
                    <p class="text-gray-500">You can switch account anytime from the setting screen</p>
                </div>
            </div>
        </main>
    </div>

    <div class="dashboard-cards max-w-7xl mx-auto py-6 sm:px-6 lg:px-8"">
        @foreach ($userTypes as $userType)
        <form method="get" action="{{ route('dashboard_choose', ['userType' => $userType]) }}">
            <div class="dashboard-card ">
                <h1 class="text-xl font-semibold text-gray-800 text-center">{{ ucfirst($name) }}</h1>
                <i class="fa fa-user text-2xl text-gray-500" aria-hidden="true"></i>
                <p class="text-center text-gray-500 mt-2">{{ ucfirst($userType) }}</p>
                @csrf
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md mt-4 hover:bg-indigo-700 transition duration-300 ease-in-out">Go to Dashboard</button>
            </div>
        </form>
        @endforeach
    </div>
</body>

</html>

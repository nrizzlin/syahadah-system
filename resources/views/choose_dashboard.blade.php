<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...your-integrity-hash-here..." crossorigin="anonymous" />

    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        main {
            text-align: center;
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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main>
            <h1>User Type Account</h1>
            <br><br><br>
            <h2>Select account to continue</h2>
            <p>You can switch account anytime from the setting screen</p>
            <div class="dashboard-cards">
                @foreach ($userTypes as $userType)
                <form method="get" action="{{ route('dashboard_choose', ['userType' => $userType]) }}">
                    <div class="dashboard-card">
                        <h1>{{ ucfirst($name) }}</h1>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>{{ ucfirst($userType) }}</p>
                        @csrf
                        <br>
                        <button type="submit">Go to Dashboard</button>
                    </div>
                </form>
                @endforeach
            </div>
        </main>
    </div>
</body>

</html>
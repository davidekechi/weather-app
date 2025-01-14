<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1f2937;
        }

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 8px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .support-btn {
            background-color: #1f2937;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .weather-data {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .daily-data {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="flex items-center gap-2">
            <span class="font-bold text-lg">🌤️ Weather</span>
            <input type="text" class="form-control w-64" placeholder="Search city...">
        </div>
        <div class="flex items-center gap-4">
            <button class="btn btn-light">⚙️</button>
            <button class="btn btn-light">🌙</button>
            <button class="support-btn">Support Project</button>
        </div>
    </header>

    <main class="container my-4">
        <section>
            <h2 class="section-title">Today Overview</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card p-3 text-center">
                        <h1 class="text-3xl">28.6°C</h1>
                        <p class="text-gray-500">Clear Sky</p>
                        <p class="text-sm">Istanbul</p>
                        <p class="text-sm">28 August Monday</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Wind Speed</p>
                                <h4>28 km/h</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Humidity</p>
                                <h4>48%</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Pressure</p>
                                <h4>1008 hPa</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Visibility</p>
                                <h4>10 km</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Sunrise</p>
                                <h4>06:26</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 text-center">
                                <p>Sunset</p>
                                <h4>19:44</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="section-title">Next 5 Days</h2>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <button class="btn btn-primary">All Days</button>
                    <div class="d-flex gap-3">
                        <button class="btn btn-outline-secondary">28 Aug Mon</button>
                        <button class="btn btn-outline-secondary">29 Aug Tue</button>
                        <button class="btn btn-outline-secondary">30 Aug Wed</button>
                    </div>
                </div>
                <div class="weather-data p-3">
                    <div class="card daily-data">
                        <div>
                            <p class="mb-0">28 Aug Mon</p>
                            <p class="text-gray-500">18:00</p>
                        </div>
                        <h5>28.6°C</h5>
                    </div>
                    <div class="card daily-data">
                        <div>
                            <p class="mb-0">28 Aug Mon</p>
                            <p class="text-gray-500">21:00</p>
                        </div>
                        <h5>27.3°C</h5>
                    </div>
                    <div class="card daily-data">
                        <div>
                            <p class="mb-0">29 Aug Tue</p>
                            <p class="text-gray-500">00:00</p>
                        </div>
                        <h5>25.5°C</h5>
                    </div>
                    <div class="card daily-data">
                        <div>
                            <p class="mb-0">29 Aug Tue</p>
                            <p class="text-gray-500">03:00</p>
                        </div>
                        <h5>23.3°C</h5>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

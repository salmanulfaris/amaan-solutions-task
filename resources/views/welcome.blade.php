<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderAPI - Advanced Order Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<header class="bg-white shadow-md">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div class="text-xl font-semibold text-gray-700">
                <a href="#" class="text-blue-600 hover:text-blue-800">Amaan Solutions Task</a>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="#features" class="text-gray-600 hover:text-blue-600">Features</a>
                <a href="#how-it-works" class="text-gray-600 hover:text-blue-600">How It Works</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-500 hover:text-gray-600">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>

<main>
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Advanced Order Management API</h1>
            <p class="text-xl mb-8">Secure, Real-time, and Scalable Solution for Your Business</p>
            <a href="#" class="bg-white text-blue-600 py-2 px-6 rounded-full text-lg font-semibold hover:bg-gray-100 transition duration-300">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-12">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">Secure Authentication</h3>
                    <p class="text-gray-600">Robust Sanctum authentication for secure API access and user management.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">Real-time Exchange Rates</h3>
                    <p class="text-gray-600">Integration with external APIs for up-to-date currency exchange rates.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">Global Logging</h3>
                    <p class="text-gray-600">Comprehensive logging system for tracking all important actions and events.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="bg-gray-100 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">1. Authentication</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Register and log in using Sanctum authentication</li>
                        <li>Secure token-based API access</li>
                        <li>Easy integration with your frontend application</li>
                    </ul>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">2. Order Management</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Create, update, and delete orders via API</li>
                        <li>Each order includes id, user_id, product_name, amount, and status</li>
                        <li>Secure access control - only creators can modify their orders</li>
                    </ul>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">3. Real-time Exchange Rates</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Fetch current exchange rates from external API</li>
                        <li>Automatic currency conversion for international orders</li>
                        <li>Always up-to-date pricing information</li>
                    </ul>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">4. Comprehensive Logging</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Log every order action in a custom action_logs table</li>
                        <li>Track user ID, action type, and timestamp for each event</li>
                        <li>Easy auditing and monitoring of system activities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Bonus Features Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-12">Bonus Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">API Response Caching</h3>
                    <p class="text-gray-600">Improved performance with intelligent caching of API responses.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">Event-Driven Logging</h3>
                    <p class="text-gray-600">Efficient logging system using event listeners for better performance and modularity.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-semibold mb-2">Comprehensive Testing</h3>
                    <p class="text-gray-600">Thorough unit tests for the order module ensuring reliability and stability.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- API Documentation Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-12">API Documentation</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Available Endpoints</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                    <li>GET /api/order - Retrieve all orders</li>
                    <li>POST /api/order - Create a new order</li>
                    <li>GET /api/order/{id} - Retrieve a specific order</li>
                    <li>PUT /api/order/{id} - Update an existing order</li>
                    <li>DELETE /api/order/{id} - Delete an order</li>
                    <li>GET /api/exchange-rate/{currencyCode} - Get exchange rates</li>
                </ul>
                <p class="text-gray-700 mb-4">Our API uses Sanctum for authentication and provides comprehensive error handling.</p>
                <a href="https://github.com/salmanulfaris/amaan-solutions-task/blob/main/api-documentation.md/#order-api-documentation" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">View Full API Documentation</a>
            </div>
        </div>
    </section>

</main>

</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Demo Checklist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f9f9f9;
            padding: 20px;
        }

        h1,
        h2 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #565e64;
        }

        /* Flex layout for two columns */
        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .column {
            flex: 1;
            min-width: 400px;
            /* responsive */
            background: #fefefe;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Right Column: Task B -->
        <div class="column" style="font-size:14px; line-height:1.5;">
            <h1 style="font-size:18px;">Task B — User Discounts Tester Guide</h1>
            <div>

                <a class="btn" href="{{ route('demo-discounts', ['user' => 2]) }}">Test Task B</a>
            </div>
            <h2 style="font-size:16px;">1. Setup</h2>
            <ul>
                <li><strong>Configure DB:</strong> <code>.env</code> with MySQL</li>
                <li><strong>Run migrations & seeders:</strong> <code>php artisan db:seed</code></li>
            </ul>

            <h2 style="font-size:16px;">2. Package Features</h2>
            <ul>
                <li>Assign/Revoke discounts per user</li>
                <li>Deterministic stacking, usage caps enforced</li>
                <li>Expired/inactive discounts ignored</li>
                <li>Events: <code>DiscountAssigned</code>, <code>DiscountRevoked</code>, <code>DiscountApplied</code></li>
                <li>Audit logs in <code>discount_audits</code></li>
            </ul>

            <h2 style="font-size:16px;">3. Demo URL</h2>
            <p>Open: <strong>http://127.0.0.1:8000/demo-discounts/{user_id}</strong> (replace <code>{user_id}</code>)</p>
            <ul>
                <li>Original amount (100)</li>
                <li>Total discount applied</li>
                <li>Final amount</li>
                <li>List of discounts (active/expired/inactive)</li>
            </ul>

            <h2 style="font-size:16px;">4. Seeders</h2>
            <ul>
                <li><strong>UserSeeder</strong> → demo users</li>
                <li><strong>DiscountSeeder</strong> → sample discounts</li>
            </ul>
            <p>Run all seeders: <code>php artisan db:seed</code></p>

            <h2 style="font-size:16px;">5. PHPUnit Tests</h2>
            <p>Configured for MySQL in <code>phpunit.xml</code>:</p>
            <pre>
            &lt;env name="DB_CONNECTION" value="mysql"/&gt;
            &lt;env name="DB_DATABASE" value="hipstersg_test"/&gt;
            &lt;env name="DB_USERNAME" value="root"/&gt;
            &lt;env name="DB_PASSWORD" value="Root@123456"/&gt;
            </pre>
            <p>Run tests: <code>php artisan test</code></p>
            <p><strong>Key Test:</strong> <code>DiscountServiceTest</code> → checks usage cap.</p>
        </div>


    </div>

</body>

</html>
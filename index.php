<?php
// Array of inspirational quotes
$quotes = [
    [
        'text' => 'The only way to do great work is to love what you do.',
        'author' => 'Steve Jobs'
    ],
    [
        'text' => 'Success is not final, failure is not fatal: it is the courage to continue that counts.',
        'author' => 'Winston Churchill'
    ],
    [
        'text' => 'The future belongs to those who believe in the beauty of their dreams.',
        'author' => 'Eleanor Roosevelt'
    ],
    [
        'text' => 'Don\'t watch the clock; do what it does. Keep going.',
        'author' => 'Sam Levenson'
    ],
    [
        'text' => 'The only limit to our realization of tomorrow is our doubts of today.',
        'author' => 'Franklin D. Roosevelt'
    ],
    [
        'text' => 'It does not matter how slowly you go as long as you do not stop.',
        'author' => 'Confucius'
    ],
    [
        'text' => 'Believe you can and you\'re halfway there.',
        'author' => 'Theodore Roosevelt'
    ],
    [
        'text' => 'The way to get started is to quit talking and begin doing.',
        'author' => 'Walt Disney'
    ],
    [
        'text' => 'Your time is limited, don\'t waste it living someone else\'s life.',
        'author' => 'Steve Jobs'
    ],
    [
        'text' => 'The greatest glory in living lies not in never falling, but in rising every time we fall.',
        'author' => 'Nelson Mandela'
    ],
    [
        'text' => 'In the middle of difficulty lies opportunity.',
        'author' => 'Albert Einstein'
    ],
    [
        'text' => 'The mind is everything. What you think you become.',
        'author' => 'Buddha'
    ],
    [
        'text' => 'Life is what happens when you\'re busy making other plans.',
        'author' => 'John Lennon'
    ],
    [
        'text' => 'The only person you are destined to become is the person you decide to be.',
        'author' => 'Ralph Waldo Emerson'
    ],
    [
        'text' => 'Everything you\'ve ever wanted is on the other side of fear.',
        'author' => 'George Addair'
    ]
];

// Get a random quote
$randomQuote = $quotes[array_rand($quotes)];

// Handle form submission for new quote
if (isset($_POST['new_quote'])) {
    // Redirect to refresh the page and get a new random quote
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #E9E3DF;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #000000;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        /* Quote Card */
        .quote-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out;
        }

        .quote-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        /* Quote Icon */
        .quote-icon {
            position: absolute;
            top: -15px;
            left: 30px;
            background: linear-gradient(135deg, #FF7A30, #465C88);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 10px 20px rgba(255, 122, 48, 0.3);
        }

        /* Quote Content */
        .quote-content {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .quote-text {
            font-size: 24px;
            font-weight: 400;
            color: #000000;
            margin-bottom: 20px;
            line-height: 1.5;
            position: relative;
            padding-left: 20px;
        }

        .quote-text::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #FF7A30, #465C88);
            border-radius: 2px;
        }

        .quote-author {
            font-size: 18px;
            font-weight: 600;
            color: #FF7A30;
            font-style: italic;
            margin-top: 15px;
        }

        /* Quote Actions */
        .quote-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .new-quote-btn,
        .share-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .new-quote-btn {
            background: linear-gradient(135deg, #FF7A30, #465C88);
            color: white;
            box-shadow: 0 8px 20px rgba(255, 122, 48, 0.3);
        }

        .new-quote-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(255, 122, 48, 0.4);
        }

        .share-btn {
            background: rgba(255, 255, 255, 0.9);
            color: #FF7A30;
            border: 2px solid #FF7A30;
        }

        .share-btn:hover {
            background: #FF7A30;
            color: white;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            color: rgba(0, 0, 0, 0.6);
            font-size: 14px;
        }

        .footer i {
            color: #FF7A30;
            margin: 0 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .quote-card {
                padding: 30px 20px;
                margin: 10px;
            }

            .quote-text {
                font-size: 20px;
            }

            .quote-author {
                font-size: 16px;
            }

            .quote-actions {
                flex-direction: column;
                align-items: center;
            }

            .new-quote-btn,
            .share-btn {
                width: 100%;
                max-width: 200px;
                justify-content: center;
            }

            .quote-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
                top: -10px;
                left: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .quote-card {
                padding: 25px 15px;
            }

            .quote-text {
                font-size: 18px;
            }

            .quote-author {
                font-size: 15px;
            }
        }

        /* Loading Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Button Click Animation */
        .new-quote-btn:active,
        .share-btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Focus states for accessibility */
        .new-quote-btn:focus,
        .share-btn:focus {
            outline: 2px solid #FF7A30;
            outline-offset: 2px;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(70, 92, 136, 0.4);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(70, 92, 136, 0.6);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="quote-card">
            <div class="quote-icon">
                <i class="fas fa-quote-left"></i>
            </div>

            <div class="quote-content">
                <p class="quote-text"><?php echo htmlspecialchars($randomQuote['text']); ?></p>
                <p class="quote-author">— <?php echo htmlspecialchars($randomQuote['author']); ?></p>
            </div>

            <div class="quote-actions">
                <form method="POST" style="display: inline;">
                    <button type="submit" name="new_quote" class="new-quote-btn">
                        <i class="fas fa-sync-alt"></i>
                        New Quote
                    </button>
                </form>

                <button class="share-btn" onclick="navigator.clipboard.writeText('<?php echo addslashes($randomQuote['text'] . ' — ' . $randomQuote['author']); ?>').then(() => alert('Quote copied to clipboard!'))">
                    <i class="fas fa-share"></i>
                    Share
                </button>
            </div>
        </div>

        <div class="footer">
            <p>Made with <i class="fas fa-heart"></i> for inspiration</p>
        </div>
    </div>
</body>

</html>